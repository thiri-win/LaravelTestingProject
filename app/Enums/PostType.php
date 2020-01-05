<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Published()
 * @method static static FriendOnly()
 * @method static static OnlyMe()
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostType extends Enum
{
    const Published =   0;
    const FriendOnly =   1;
    const OnlyMe = 2;
}
