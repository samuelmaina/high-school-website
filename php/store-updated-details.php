<?php
session_start();
if ( !isset( $_SESSION['is_logged_in'] ) ) {
  header( 'Location:../views/login.php' );
    exit();
}
require( './connect-to-database.php' );
$name = trim( $_POST['name'] ) ;
$admin_no = trim( $_POST['admin_no'] );
$house = trim( $_POST['house'] );
$date_of_birth = trim( $_POST['date_of_birth'] ) ;
$current_town_of_residence = trim( $_POST['current_town_of_residence'] );
$occupation = trim( $_POST['occupation'] ) ;
$place_of_work = trim( $_POST['place_of_work'] );
$year_of_completion = trim( $_POST['year_of_completion'] );

$image_url_to_delete = trim( $_POST['image_url'] );

 if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }


echo "$image_url";

$user_id = $_SESSION['user_id'];

$update_details = "UPDATE aluminiDetails 
SET name ='$name',admin_no ='$admin_no',house ='$house',date_of_birth ='$date_of_birth',
     current_town_of_residence ='$current_town_of_residence',occupation ='$occupation',
     place_of_work ='$place_of_work',image_url='$image_url',year_of_completion='$year_of_completion'
WHERE user_id='$user_id'";

$result = mysqli_query( $dbc, $update_details );
    if ( $result ) {
        header( 'Location:../views/alumini-details.php' );
    } else {
        echo 'unable to query the database at this time due to '.mysqli_error( $dbc );
        return null;
    }

?>