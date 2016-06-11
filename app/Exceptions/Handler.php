<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 *
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use JMS\Serializer\SerializerBuilder;
use Speedfreak\Constants;
use Speedfreak\Contracts\Exceptions\EngineException;
use SimpleXMLElement;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof EngineException) {
            $xml = new SimpleXMLElement(Constants::XML_TEMPLATE_STRING . '<EngineExceptionTrans></EngineExceptionTrans>');
            $xml->addChild('Description', '');
            $xml->addChild('ErrorCode', '2');
            $xml->addChild('InnerException', '');
            $xml->addChild('Message', $e->getMessage());
            $xml->addChild('StackTrace', '');

            return response(
                $xml->asXML(),
                500,
                ['Content-Type' => 'application/xml']
            );
        } elseif ($e instanceof ValidationException) {
            $xml = new SimpleXMLElement(Constants::XML_TEMPLATE_STRING . '<ValidationException></ValidationExceptionTrans>');
            $xml->addChild('Description', '');
            $xml->addChild('ErrorCode', '3');
            $xml->addChild('InnerException', '');
            $xml->addChild('Message', $e->getMessage());
            $xml->addChild('StackTrace', '');

            $errors = $xml->addChild('Errors');
            foreach($e->validator->messages()->toArray() as $key => $value) {
                $child = $errors->addChild('ErrorGroup');
                $child->addChild('Attribute', $key);
                foreach($value as $err) {
                    $c = $child->addChild('Error');
                    $c->addChild('Message', $err);
                }
            }

            return response(
                $xml->asXML(),
                422,
                ['Content-Type' => 'application/xml']
            );
        }

        return parent::render($request, $e);
    }
}
