<!DOCTYPE html>
<html>
<head>
    <title>Deep Art Effects Result</title>
</head>
<body>

<?php

require_once('client.php');

$submissionId = $_GET['submission_id'];

try {
    $result = $api_instance->resultGet($submissionId);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->resultGet: ', $e->getMessage(), PHP_EOL;
}

?>

<h1>Your artwork</h1>

<?php if($result->getStatus()=="finished"): ?>

    <img src="<? echo $result->getUrl(); ?>" />

<?php else: ?>

    <input type='button' value='Check status' onClick='window.location.reload()'>

    <?php echo sprintf("Status: %s", $result->getStatus()); ?>

<?php endif ?>

<br />
<br />

<form action="index.php">
    <input type="submit" value="Go back" />
</form>

</body>
</html>