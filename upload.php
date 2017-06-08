<?php

require_once('client.php');

$target_file = $_FILES["fileToUpload"]["tmp_name"];
$uploadOk = false;
$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);

$style_id = $_POST['style'];

if(isset($_POST["submit"])) {
    $check = getimagesize($target_file);
    if($check !== false) {
        $uploadOk = true;
    } else {
        echo "File is not an image.";
        $uploadOk = false;
    }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = false;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    try {
        $image = base64_encode(file_get_contents($target_file));
        $uploadRequest = new \Deeparteffects\Client\Model\UploadRequest();
        $uploadRequest->setStyleId($style_id);
        $uploadRequest->setImageBase64Encoded($image);
        $result = $api_instance->uploadPost($uploadRequest);
        $submissionId = $result->getSubmissionId();

        header('Location: get_result.php?submission_id='.$submissionId);

    } catch (Exception $e) {
        echo 'Exception when calling DefaultApi->resultGet: ', $e->getMessage(), PHP_EOL;
    }

}

?>