<!DOCTYPE html>
<html>
<body>
<?php
require('uploadimg.php');
$messege=uploadimg(24);
echo $messege;
?>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>