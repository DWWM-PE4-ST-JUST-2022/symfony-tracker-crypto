<?php

/*
 * This file is part of the symfony-tracker-crypto package.
 *
 * (c) Benjamin Georgeault
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Enum;

/**
 * Class TransactionStatusEnum
 *
 * @author Benjamin Georgeault
 */
abstract class TransactionStatusEnum
{
    const OK = 'ok';
    const FAIL = 'fail';

    public static function isValid(string $status): bool
    {
        return in_array($status, [
            TransactionStatusEnum::FAIL,
            TransactionStatusEnum::OK,
        ]);
    }
}
