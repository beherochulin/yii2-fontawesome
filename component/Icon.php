<?php
namespace beesoft\yii\fontawesome\component;

use beesoft\yii\fontawesome\FA;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Icon
{
    private $options = [];

    public function __construct($name, $options = [])
    {
        Html::addCssClass($options, FA::$cssPrefix);

        if (!empty($name)) {
            Html::addCssClass($options, FA::$cssPrefix . '-' . $name);
        }

        $this->options = $options;
    }
    public function __toString()
    {
        $options = $this->options;

        $tag = ArrayHelper::remove($options, 'tag', 'i');

        return Html::tag($tag, null, $options);
    }

    public function inverse()
    {
        return $this->addCssClass(FA::$cssPrefix . '-inverse');
    }
    public function spin()
    {
        return $this->addCssClass(FA::$cssPrefix . '-spin');
    }
    public function fixedWidth()
    {
        return $this->addCssClass(FA::$cssPrefix . '-fw');
    }
    public function li()
    {
        return $this->addCssClass(FA::$cssPrefix . '-li');
    }
    public function border()
    {
        return $this->addCssClass(FA::$cssPrefix . '-border');
    }
    public function pullLeft()
    {
        return $this->addCssClass(FA::$cssPrefix . '-pull-left');
    }
    public function pullRight()
    {
        return $this->addCssClass(FA::$cssPrefix . '-pull-right');
    }

    public function size($value)
    {
        return $this->addCssClass(
            FA::$cssPrefix . '-' . $value,
            in_array((string)$value, [FA::SIZE_LARGE, FA::SIZE_2X, FA::SIZE_3X, FA::SIZE_4X, FA::SIZE_5X], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FA::size()',
                'FA::SIZE_LARGE, FA::SIZE_2X, FA::SIZE_3X, FA::SIZE_4X, FA::SIZE_5X'
            )
        );
    }
    public function rotate($value)
    {
        return $this->addCssClass(
            FA::$cssPrefix . '-rotate-' . $value,
            in_array((string)$value, [FA::ROTATE_90, FA::ROTATE_180, FA::ROTATE_270], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FA::rotate()',
                'FA::ROTATE_90, FA::ROTATE_180, FA::ROTATE_270'
            )
        );
    }
    public function flip($value)
    {
        return $this->addCssClass(
            FA::$cssPrefix . '-flip-' . $value,
            in_array((string)$value, [FA::FLIP_HORIZONTAL, FA::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FA::flip()',
                'FA::FLIP_HORIZONTAL, FA::FLIP_VERTICAL'
            )
        );
    }

    public function addCssClass($class, $condition = true, $throw = false)
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;

                throw new \yii\base\InvalidConfigException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }

        return $this;
    }
}
