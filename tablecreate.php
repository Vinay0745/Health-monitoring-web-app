<?php
$conn = mysqli_connect("localhost", "root", "", "medicare");
$sql="create table medical(aadhar varchar(16) primary key, name varchar(30),password varchar(255),emploc varchar(255))";
$result=mysqli_query($conn, $sql);
if ($result) {  
  echo "Table Employee created successfully";
} 
else
 {    
echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
