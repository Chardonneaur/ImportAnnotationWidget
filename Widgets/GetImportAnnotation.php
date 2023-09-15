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
    private function isValidDate($date)
    {
        return preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
    }

    private function constructAnnotationUrl($date, $note)
    {
        return "method=Annotations.add&idSite=1&token_auth={$this->token}&date=" . urlencode($date) . "&note=" . urlencode($note);
    }

    private function constructBulkUrl($urls)
    {
        $encodedUrls = [];
        foreach ($urls as $url) {
            $encodedUrls[] = "urls[]=" . urlencode($url);
        }

        return "{$this->baseUrl}/index.php?module=API&method=API.getBulkRequest&format=json&" . implode('&', $encodedUrls);
    }
}
