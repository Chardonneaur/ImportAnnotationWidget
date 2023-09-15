<?php

namespace Piwik\Plugins\ImportAnnotationWidget\Widgets;

use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

class GetImportAnnotation extends Widget
{
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('Annotations_Annotations');
        $config->setName('ImportAnnotationWidget_ImportAnnotation');
        $config->setOrder(99);
    }


    public function render()
    {
        return $this->renderTemplate('widget');
    }
}
