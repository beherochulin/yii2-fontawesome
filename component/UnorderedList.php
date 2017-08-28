<?php
namespace beesoft\yii\fontawesome\component;

use beesoft\yii\fontawesome\FA;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class UnorderedList
{
    protected $options = [];
    protected $items = [];

    public function __construct($options = [])
    {
        Html::addCssClass($options, FA::$cssPrefix . '-ul');

        $options['item'] = function ($item, $index) {
            return call_user_func($item, $index);
        };

        $this->options = $options;
    }
    public function __toString()
    {
        return Html::ul($this->items, $this->options);
    }

    public function item($label, $options = [])
    {
        $this->items[] = function ($index) use ($label, $options) {
            $tag = ArrayHelper::remove($options, 'tag', 'li');

            $icon = ArrayHelper::remove($options, 'icon');
            $icon = empty($icon)
                ? null
                : (is_string($icon) ? (string)(new Icon($icon))->li() : $icon);

            $content = trim($icon . $label);

            return Html::tag($tag, $content, $options);
        };

        return $this;
    }
}
