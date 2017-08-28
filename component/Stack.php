<?php
namespace beesoft\yii\fontawesome\component;

use beesoft\yii\fontawesome\FA;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Stack
{
    private $options = [];
    private $icon_front;
    private $icon_back;

    public function __construct($options = [])
    {
        Html::addCssClass($options, FA::$cssPrefix . '-stack');

        $this->options = $options;
    }
    public function __toString()
    {
        $options = $this->options;

        $tag = ArrayHelper::remove($options, 'tag', 'span');

        $template = ArrayHelper::remove($options, 'template', '{back}{front}');

        $icon_back = $this->icon_back instanceof Icon
            ? $this->icon_back->addCssClass(FA::$cssPrefix . '-stack-2x')
            : null;

        $icon_front = $this->icon_front instanceof Icon
            ? $this->icon_front->addCssClass(FA::$cssPrefix . '-stack-1x')
            : null;

        $content = str_replace(['{back}', '{front}'], [$icon_back, $icon_front], $template);

        return Html::tag($tag, $content, $options);
    }

    public function icon($icon, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon, $options);
        }

        $this->icon_front = $icon;

        return $this;
    }
    public function on($icon, $options = [])
    {
        if (is_string($icon)) {
            $icon = new Icon($icon, $options);
        }

        $this->icon_back = $icon;

        return $this;
    }
}
