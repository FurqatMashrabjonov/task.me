<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TableOwnerStatus extends Enum
{
    const NOT_ACCEPTED  = 0;
    const ACCEPTED      = 1;
    const BLOCKED       = 2;
}
