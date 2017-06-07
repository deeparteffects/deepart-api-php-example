<?php

require_once('client.php');

try {
    $styles = $api_instance->stylesGet();

    foreach ($styles as $style) {
        echo '<option value="' . $style->getId() . '">' . $style->getTitle() . '</option>';
    }

} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stylesGet: ', $e->getMessage(), PHP_EOL;
}

?>