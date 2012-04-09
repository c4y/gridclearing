<?php
include_once('simple_html_dom.php');
class GridClearing {
    public function outputFrontendTemplate($strContent, $strTemplate) {
        $time_a = microtime();
        $html = str_get_html($strContent);
        $nodes = $html->find('.omega');
        if (count($nodes) > 0) {
            foreach ($nodes as $node) {
                $node->outertext = $node->outertext . '<div class="clear"></div>';
            }

        }
        $strContent = $html->save();
        $time_b = microtime();
        $time = $time_b - $time_a;
        $strContent .= '<!-- ' . $time . ' Mikrosekunden -->';
        return $strContent;
    }
}

?>