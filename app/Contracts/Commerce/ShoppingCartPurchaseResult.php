<?php
/**
 * This code is part of the Speedfreak Core Server.
 * Some of the code is based on code written by Nilzao ( https://github.com/nilzao ) and Berkay2578 ( https://github.com/berkay2578 )! Go check out their stuff!
 * This is mainly a port of their server to PHP, with a twist.
 * Please feel free to fork this and make your own changes. Just make sure to keep this notice.
 * Copyright (c) 2016 CoderLeo / Speedfreak
 */

namespace Speedfreak\Contracts\Commerce;

interface ShoppingCartPurchaseResult
{
    const aFail_maxAllowed = 'Fail_MaxAllowedPurchasesForThisProduct';
    const aFail_insufficientPerformanceInventory = 'Fail_InsufficientPerformancePartInventory';
    const aFail_boostTransDisabled = 'Fail_BoostTransactionsAreDisabled';
    const aFail_lockedProduct = 'Fail_LockedProductNotAccessibleToThisUser';
    const aFail_personaLevelError = 'Fail_PersonaNotRightLevel';
    const aFail_itemNotAvailable = 'Fail_ItemNotAvailableStandalone';
    const aFail_invalidPerformanceUpgrade = 'Fail_InvalidPerformanceUpgrade';
    const aFail_maxStackOrRental = 'Fail_MaxStackOrRentalLimit';
    const aFail_insufficientCarSlots = 'Fail_InsufficientCarSlots';
    const aFail_insufficientFunds = 'Fail_InsufficientFunds';
    const aFail_invalidBasket = 'Fail_InvalidBasket';
    const aSuccess = 'Success';
}