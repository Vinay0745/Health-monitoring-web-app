<?php
$targetDir = "uploads/";

if (isset($_POST["submit"])) {
    $downloadDate = $_POST["download_date"];
    $targetFolder = $targetDir . $downloadDate . "/";
    
    if (is_dir($targetFolder)) {
        $filesToDownload = scandir($targetFolder);

        if (count($filesToDownload) > 2) { // Exclude . and ..
            header("Content-Type: application/zip");
            header("Content-Disposition: attachment; filename=" . $downloadDate . "_files.zip");
            
            $zip = new ZipArchive();
            $zip->open("php://output", ZipArchive::CREATE);

            foreach ($filesToDownload as $file) {
                if ($file !== "." && $file !== "..") {
                    $filePath = $targetFolder . $file;
                    $zip->addFile($filePath, $file);
                }
            }
            
            $zip->close();
        } else {
            echo "<script>alert('No files found for the selected date.')</script>";
        }
    } else {
        echo "<script>alert('Folder not found for the selected date.')</script>";
    }
}
?>
