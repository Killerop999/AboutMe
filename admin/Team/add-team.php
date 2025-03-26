<?php
session_start();

$img = $_POST['team_photo'];
$f_link = $_POST['facebook_link'];
$t_link = $_POST['twitter_link'];
$i_link = $_POST['instagram_link'];
$l_link = $_POST['linkedin_link'];
$name = $_POST['team_Name'];
$position = $_POST['team_position'];
$desc = $_POST['team_description'];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["team_photo"]["name"]);

if (move_uploaded_file($_FILES["team_photo"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["team_photo"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }



if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];

$conn = new mysqli('sql312.infinityfree.com', 'if0_37172028', 'Tejas2003', 'if0_37172028_my_data', 3306);

if ($conn->connect_error) {
    die("Connection failed");
}

$sql="INSERT INTO team_data(team_photo,facebook_link,twitter_link , instagram_link, linkedin_link, team_Name, team_position, team_description) VALUES ('$img','$f_link','$t_link', '$i_link', '$l_link', '$name', '$position', '$desc')";

if($conn->query($sql)){
    header("Location: ../admin.php");
}else{
    echo "Something went wrong";
}