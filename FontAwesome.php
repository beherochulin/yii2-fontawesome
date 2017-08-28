<?php
namespace beesoft\yii\fontawesome;

use beesoft\yii\fontawesome\component;

class FontAwesome
{
    public static $cssPrefix = 'fa';

    public static function icon($name, $options = [])
    {
        return new component\Icon($name, $options);
    }
    public static function i($name, $options = [])
    {
        return static::icon($name, $options);
    }
    public static function stack($options = [])
    {
        return new component\Stack($options);
    }
    public static function s($options = [])
    {
        return static::stack($options);
    }
    public static function ul($options = [])
    {
        return new component\UnorderedList($options);
    }

    const SIZE_LARGE = 'lg';
    const SIZE_2X = '2x';
    const SIZE_3X = '3x';
    const SIZE_4X = '4x';
    const SIZE_5X = '5x';

    const ROTATE_90 = '90';
    const ROTATE_180 = '180';
    const ROTATE_270 = '270';

    const FLIP_HORIZONTAL = 'horizontal';
    const FLIP_VERTICAL = 'vertical';
}
