<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "medicare");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["signin"])) {
    $aadhar = $_POST["aadharl"];
    $password = $_POST["passwordl"];
    
    $sql = "SELECT * FROM medical WHERE aadhar='$aadhar' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["aadhar"] = $user["aadhar"];
        $_SESSION["name"] = $user["name"];
        header("Location: index.php");
        exit();
    } else {
        echo "Wrong credentials";
    }
} elseif (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $aadhar = $_POST["aadhar"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO medical (name, aadhar, password) VALUES ('$name', '$aadhar', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Successfully registered!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
