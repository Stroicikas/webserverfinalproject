<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method = "post" enctype = "multipart/form-data">
        <input type = "file" name = "fileToUpload">
        <input type="submit" name = "submit" value = "submit">

    </form>
    <?php
    $target_dir = "upload/";
    $targer_file = $target_dir . $_FILES["fileToUpload"] ["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targer_file,PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"] ["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "File is too big.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imagineFileType != "jpeg" && $imagineFileType != "gif") {
        echo "Unaviable file type, only [JPG JPEG PNG and GIF] files are allowed";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Your file was not uploaded";
    }
    else {
        if (move_uploaded_file($_FILES["fileToUpload"] ["tmp_name"], $targer_file)) {
            echo "File" . htmlspecialchars(basename($_FILES["fileToUpload"] ["name"])). "has been uploaded";
        }
        else {
            echo "Error, could not upload file";
        }
    }
    ?>
</body>
</html>