<html> <head> <title>enregistrer dans la base de données</title>
</head> <body>
<?php
require_once('dbco.php');
if (isset($_FILES["fileToUpload"])){
	echo "hello";
	$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  if ($_FILES["fileToUpload"]["size"] > 20000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if($imageFileType == "zip" || $imageFileType == "rar" || $imageFileType == "exe" || $imageFileType == "PIF" ) {
  echo "Sorry, only ZIP, RAR, EXE & PIF  files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
}
$nom=$_POST['fname'];
$commentaire=$_POST['myBrowser'];
$fichier=$_FILES['fileToUpload']["name"];
$commentaire=$_POST['txtEditor'];
$sql1 = "INSERT INTO post (`Id_Post`, `Id_User`, `Categorie`, `Titre`, `Description`, `Fichier`, `tmp_post`) VALUES (NULL, '11', 'zsd', 'zqdqsd', 'qdzq', 'zqdqd.ds', current_timestamp())";
//$sql=$dbco->prepare($sql1);
if (mysqli_query($dbco, $sql1)) {
 echo "New record created successfully";
} else {
 echo "Error: " . $sql1 . "<br>" . mysqli_error($dbco);
}
//mysqli_query($dbco, $sql1);
//$dbco->commit();
?>
  
 <?php echo $fichier?>;


</body> </html>