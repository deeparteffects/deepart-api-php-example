# Deep Art Effects API Example For PHP
Here is an example on how you can use the Deep Art Effects API for PHP to display available styles, upload an image and get the result.

If you want to try out the example, change the values for the api_key, access_key and secret_key in client.php to your key values.

Try out the [Online Demo](https://www.deeparteffects.com/demo/)

![Screenshot-1](/screenshots/screenshot-1.png)
![Screenshot-2](/screenshots/screenshot-2.png)
![Screenshot-3](/screenshots/screenshot-3.png)

## Requirements

PHP 5.4.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), run the command

```
composer require deeparteffects/sdk-php
```

### Manual Installation

Download the sdk files from [Deep Art Effects SDK for PHP](https://developer.deeparteffects.com/page/sdk/) and include `autoload.php`:

```php
require_once('/path/to/sdk-php/autoload.php');
```

## Getting Started

First of all create an Deep Art Effects Client instance and insert your API-Key, your Access-Key and your Secret-Key.

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$api_key = '--Your API KEY--';
$access_key = '--Your ACCESS KEY--';
$secret_key = '--Your SECRET KEY--';

$api_instance = new \Deeparteffects\Client\Api\DefaultApi();
$api_instance->setApiKey($api_key);
$api_instance->setApiAccessKey($access_key);
$api_instance->setApiSecretKey($secret_key);

?>
```

## Get a list of available styles
Next you want get a list of available styles using the stylesGet method. You get the id and a URL to an image representing the style.

```php
<?php

try {
    $styles = $api_instance->stylesGet();
    foreach ($styles as $style) {
        $style_id = $style->getId();
    }
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stylesGet: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Upload an image
To upload an image set the styleId you want and hand over the image binary data converted to Base64. 
In PHP you can convert data to Base64 using the base64_encode() function. After uploading the image you get a submissionId to check for the result.

```php
<?php

try {
   $image = base64_encode(file_get_contents('/path/to/file'));
   $uploadRequest = new \Deeparteffects\Client\Model\UploadRequest();
   $uploadRequest->setStyleId($style_id);
   $uploadRequest->setImageBase64Encoded($image);
   $result = $api_instance->uploadPost($uploadRequest);
   $submissionId = $result->getSubmissionId();
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->uploadPost: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Check for the result
You can pass the submissionId to the resultGet function in order to receive a status for your submission. 
If your submission is in finished state, you can use the URL to download your artwork.

```php
<?php

try {
    $result = $api_instance->resultGet($submissionId);
    $status = $result->getStatus();
    if($result->getStatus()=="finished") {
        echo $result->getUrl();
    }
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->resultGet: ', $e->getMessage(), PHP_EOL;
}

?>
```