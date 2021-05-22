
<?php
session_start();
if ( !isset( $_SESSION['is_logged_in'] ) ) {
     header( 'Location:../views/login.php' );
    exit();
}

require( './create-alumni-details.php' );


$name = trim( $_POST['name'] ) ;
$admin_no = trim( $_POST['admin_no'] );
$house = trim( $_POST['house'] );
$date_of_birth = trim( $_POST['date_of_birth'] ) ;
$current_town_of_residence = trim( $_POST['current_town_of_residence'] );
$occupation = trim( $_POST['occupation'] ) ;
$place_of_work = trim( $_POST['place_of_work'] );
$year_of_completion = trim( $_POST['year_of_completion'] );



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



// if(isset($_FILES['alumni_image'])){
// $target_dir="../uploads/";
// $image_url='';
// $target_file=$target_dir.basename($_FILES["alumni_image"]["name"]);
// $uploadOk=1;
// $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//     $check= getimagesize($_FILES["alumni_image"]["tmp_name"]);
//     if($check !== false){
//         echo " file is an image -".$check["mime"].".";
//         $uploadOk=1;
//     }else{
//         echo "file is not an image ";
//         $uploadOk = 0;
//     }
//     if(file_exists($target_file)){
//         echo " file already exists ";
//         $uploadOk=0;
//     }
//     if($_FILES["alumni_image"]["size"]>5000000){
//         echo " file too large for upload";
//         $uploadOk=0;
//     }
//     if($imageFileType!= "jpg"&&$imageFileType!= "png"
//     &&$imageFileType!= "jpeg"&&$imageFileType!= "gif"){
//         echo " only images allowed";
//         $uploadOk=0;
//     }
//     if($uploadOk==0){
//         echo "you image could not be uploaded";
//         exit();
//     }else{
//         if(move_uploaded_file($_FILES["alumni_image"]["tmp_name"],$target_file)){
//             $image_url= $target_dir.$_FILES["alumni_image"]["name"];
//         }else{
//             echo "an error occurred when we tried to upload your photo";
//         }
//     }
// }
 $user_id=$_SESSION['user_id'];
    $insertDetails= "INSERT INTO aluminiDetails(
                name,admin_no,house,date_of_birth,
                current_town_of_residence,occupation,place_of_work,user_id,image_url,year_of_completion)
                VALUES('$name','$admin_no','$house','$date_of_birth',
                '$current_town_of_residence','$occupation','$place_of_work'
                ,'$user_id','$image_url','$year_of_completion')";
if ( $creation_successful) {
    if ( mysqli_query ( $dbc, $insertDetails ) ) {
        header( 'Location:../views/alumini-details.php' );
    } else {
        echo 'some errors occurred';
    }
}else{
    echo "Error occurred when trying to save your details".mysqli_error( $dbc );
}
?>




