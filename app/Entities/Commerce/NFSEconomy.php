<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Entities\Commerce;

use Illuminate\Log\Writer;
use Speedfreak\Contracts\Commerce\INFSEconomy;
use Speedfreak\Contracts\Exceptions\EngineException;
use Speedfreak\Entities\Persona;
use Speedfreak\Entities\Product;

class NFSEconomy implements INFSEconomy
{
    /**
     * Currency amounts to use in transactions.
     * First one is cash, second is boost.
     *
     * @var array
     */
    protected static $currency = [0, 0];

    /**
     * The logger instance.
     *
     * @var Writer
     */
    private $logger;

    /**
     * NFSEconomy constructor.
     * @param Writer $logger
     */
    public function __construct(Writer $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Determine if the given persona has enough of the given currency.
     * Accepts an integer (the amount) and a string the (currency type) as extra parameters.
     * By default, the amount is 0 and the type is in-game currency.
     *
     * @param Persona $persona
     * @param int $amount
     * @param int $type
     * @return bool
     * @throws EngineException
     */
    public function hasEnough(Persona $persona, int $amount = 0, int $type = self::CURRENCY_IGC) : bool
    {
        switch($type) {
            case self::CURRENCY_IGC:
                return $persona->cash >= $amount;
            case self::CURRENCY_BOOST:
                return $persona->boost >= $amount;
            default:
                throw new EngineException("Unknown currency type: " . $type);
        }
    }

    /**
     * Execute an economy transaction.
     * This can only be called by the server (it's not an exposed route), so there hopefully won't be an issue
     * with players exploiting the amount of currency they have.
     *
     * @param Persona $persona
     * @param int $amount
     * @param int $type
     * @param bool $remove
     * @return bool
     */
    public function transaction(Persona $persona, int $amount, int $type, bool $remove = true) : bool
    {
        switch($type) {
            case self::CURRENCY_IGC:
                $currencyToUse = 'cash';
                break;
            case self::CURRENCY_BOOST:
                $currencyToUse = 'boost';
                break;
            default:
                $currencyToUse = 'cash';
                break;
        }

        // check if they have enough, but only if they are removing IGC
        if ($remove && !($this->hasEnough($persona, $amount, $type))) {
            $this->logger->warning(sprintf(
                'Persona (id: %s) tried to remove %s %s, when they only have %s.',
                $persona->getKey(), $amount, $currencyToUse, (int) $persona->getAttribute($currencyToUse)
            ));

            return false;
        }

        $persona->{$remove ? 'decrement' : 'increment'}($currencyToUse, $amount);
        $persona->save();

        return true;
    }

    /**
     * Execute a callback to run as a transaction.
     *
     * @param callable $callback
     * @param array $args
     */
    public function transactionCallback(callable $callback, ...$args)
    {
        $callback(...$args);
    }

    /**
     * Add the cost of a product onto the current cost.
     *
     * @param string $catalogName
     * @param string $productId
     * @return void
     */
    public function addCommerce(string $catalogName = null, string $productId = null)
    {
        if ($catalogName == null || $productId == null) {
            $this->logger->warning(sprintf('Support for this product (ID: %s) has not been added yet.', $productId));
            return;
        }

        $product = Product::firstWhere([
            'categoryName' => $catalogName,
            'productId' => $productId
        ]);

        if (!$product) {
            $this->logger->warning(sprintf('No product with ID %s.', $productId));
            return;
        }

        $currency = $product->currency;
        $title = $product->productTitle ?: 'Unknown Item';
        self::$currency[$currency == 'CASH' ? self::CURRENCY_IGC : self::CURRENCY_BOOST] += $product->price;
    }
}