<?php
$targetDir = "uploads/";
$foundMatches = false;
$successMessage = "";

function deleteDir($dirPath) {
    if (!is_dir($dirPath)) {
        return false;
    }
    
    $dir = new RecursiveDirectoryIterator($dirPath, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);

    foreach ($files as $fileinfo) {
        if ($fileinfo->isDir()) {
            rmdir($fileinfo->getRealPath());
        } else {
            unlink($fileinfo->getRealPath());
        }
    }
    
    return rmdir($dirPath);
}

if (isset($_POST["submit"])) {
    $deleteDate = $_POST["delete_date"];
    
    $uploads = scandir($targetDir);
    
    foreach ($uploads as $item) {
        if ($item !== "." && $item !== "..") {
            $itemPath = $targetDir . $item;
            
            if (is_dir($itemPath) && $item === $deleteDate) {
                deleteDir($itemPath);
                $successMessage = "Folder '$item' and its contents have been deleted successfully.";
                echo "<script>alert('The File/Folder is deleted successfully !!')</script>";
                $foundMatches = true;
            } elseif (is_file($itemPath) && pathinfo($item, PATHINFO_FILENAME) === $deleteDate) {
                unlink($itemPath);
                $successMessage = "File '$item' has been deleted successfully.";
                echo "<script>alert('The File/Folder is deleted successfully !!')</script>";
                $foundMatches = true;
            }
        }
    }
    
    if (!$foundMatches) {
        echo "<script>alert('No records found for the searched date.');</script>";
    } elseif ($successMessage !== "") {
        echo "<script>alert('$successMessage');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Files/Folders</title>
</head>
<body>
    <form method="post">
        Date: <input type="date" name="delete_date" required>
        <input type="submit" name="submit" value="Delete">
    </form>
</body>
</html>
