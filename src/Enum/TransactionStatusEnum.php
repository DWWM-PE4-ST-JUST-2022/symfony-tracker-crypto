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
enum TransactionStatusEnum: string
{
    case OK = 'ok';
    case FAIL = 'fail';
}
