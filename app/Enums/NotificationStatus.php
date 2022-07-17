<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NotificationStatus extends Enum
{
    const NOTVIEWED =   0;
    const VIEWED =      1;
}
