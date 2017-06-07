<!DOCTYPE html>
<html lang="en">
<head>
    <title>Deep Art Effects PHP Example</title>
    <meta name="description" content="Transform photos into famous fine art painting using artificial intelligence.">
    <meta name="author" content="Deep Art Effects GmbH">
</head>
<body>

<h1>Deep Art Effects PHP Example</h1>

<h2>Select image for style transfer</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">

    <p>
        <label>Image:
            <input type="file" name="fileToUpload">
        </label>
    </p>

    <p>
        <label>Style:
            <select name="style">
                <?php include 'list_styles.php' ?>
            </select>
        </label>
    </p>

    <p>
        <label>Quality
            <select name="quality">
                <option value="512">Low Quality</option>
                <option value="1080">Medium Quality</option>
                <option value="1980">High Quality</option>
            </select>
        </label>
    </p>

    <p>
        <input type="submit" value="Submit" name="submit">
    </p>

</form>

</body>
</html>