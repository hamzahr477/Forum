<?php 
require_once('dbco.php');
if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
// if user clicks like or dislike button
    if(isset($_SESSION['id'])){
$Id_user=$_SESSION['id'];

}

if (isset($_POST['action'])) {
  if(isset($_SESSION['id'])){
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
    case 'like':
         $sql="INSERT INTO jaime (Id_user, Id_post, Type) 
             VALUES ($Id_user, $post_id, 'like') 
             ON DUPLICATE KEY UPDATE Type='like'";
         break;
    case 'dislike':
          $sql="INSERT INTO jaime (Id_user, Id_post, Type) 
               VALUES ($Id_user, $post_id, 'dislike') 
             ON DUPLICATE KEY UPDATE Type='dislike'";
         break;
    case 'unlike':
        $sql="DELETE FROM jaime WHERE Id_user=$Id_user AND Id_post=$post_id";
          break;
    case 'undislike':
          $sql="DELETE FROM jaime WHERE Id_user=$Id_user AND Id_post=$post_id";
          break;
    case 'react':
          $sql="INSERT INTO rating_info (User_id, Commentaire_id, rating_action) 
             VALUES ($Id_user, $post_id, 'heart') 
             ON DUPLICATE KEY UPDATE rating_action='heart'";
          break;
    case 'unreact':
          $sql="DELETE FROM rating_info WHERE User_id=$Id_user AND Commentaire_id=$post_id";
          break;
    default:
      break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($dbco, $sql);
  if($action=='react' || $action == 'unreact'){
    echo getRatingCmnt($post_id);
  }
  else echo getRating($post_id);
  exit(0); 
}else header("Location : http://Localhost/P1/login.php");

}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $dbco;
  $sql = "SELECT COUNT(*) FROM jaime 
        WHERE Id_post = $id AND Type='like'";
  $rs = mysqli_query($dbco, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $dbco;
  $sql = "SELECT COUNT(*) FROM jaime 
        WHERE Id_post = $id AND Type='dislike'";
  $rs = mysqli_query($dbco, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $dbco;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM jaime WHERE Id_post = $id AND Type='like'";
  $dislikes_query = "SELECT COUNT(*) FROM jaime 
            WHERE Id_post = $id AND Type='dislike'";
  $likes_rs = mysqli_query($dbco, $likes_query);
  $dislikes_rs = mysqli_query($dbco, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
    'likes' => $likes[0],
    'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}
// Get total number of likes and dislikes for a particular post
function getRatingCmnt($id)
{
  global $dbco;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE Commentaire_id = $id AND rating_action='heart'";
  $likes_rs = mysqli_query($dbco, $likes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $rating = [
    'likes' => $likes[0],
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $dbco;
  global $Id_user;
  $sql = "SELECT * FROM jaime WHERE Id_user=$Id_user 
        AND Id_post=$post_id AND Type='like'";
  $result = mysqli_query($dbco, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $dbco;
  global $Id_user;
  $sql = "SELECT * FROM jaime WHERE Id_user=$Id_user 
        AND Id_post=$post_id AND Type='dislike'";
  $result = mysqli_query($dbco, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}

function isHTML($string){
 if($string != strip_tags($string)){
  // is HTML
  return true;
 }else{
  // not HTML
  return false;
 }
}
function userHeart($id){
if(isset($_SESSION['id'])){
    global $dbco;

   $Uid=$_SESSION['id'];
$cmnt_sql="SELECT Count(*) from rating_info where User_id=$Uid and Commentaire_id=$id";
$res=mysqli_query($dbco,$cmnt_sql);
$res=mysqli_fetch_array($res);
 if($res['Count(*)']==0) echo "class='react-btn no-react fa fa-heart'";
 else echo "class='react-btn no-react1 fa fa-heart'";
  }else echo "class='react-btn no-react fa fa-heart'";
}
function nbrHeart($id){
    global $dbco;

$nbrcmnt_sql="SELECT Count(*) from rating_info where  Commentaire_id=$id";
$res_nbr=mysqli_query($dbco,$nbrcmnt_sql);
$res_nbr=mysqli_fetch_array($res_nbr);
echo $res_nbr['Count(*)']; 
}