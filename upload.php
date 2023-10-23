<?php
$targetDir = "uploads/";

if (isset($_POST["submit"])) {
    $uploadDate = $_POST["upload_date"];
    $targetFolder = $targetDir . $uploadDate . "/";
    $targetFile = $targetFolder . basename($_FILES["fileToUpload"]["name"]);

    if (!is_dir($targetFolder)) {
        mkdir($targetFolder, 0777, true); // Create the date-based folder
    }

    if (file_exists($targetFile)) {
        $replaceOption = "<br><br><form action='upload.php' method='post' enctype='multipart/form-data'>
                            Replace existing file: <input type='file' name='fileToUpload' required>
                            <input type='hidden' name='upload_date' value='$uploadDate'>
                            <input type='submit' value='Replace File' name='replace'>
                        </form>";
        echo "File already exists for the selected date." . $replaceOption;
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "<script>alert('The File was Successfully uploaded !!.');</script>";
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}
?>
