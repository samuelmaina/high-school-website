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

if(isset($_FILES['alumni_image'])){
    $target_dir = '../uploads/';
$image_url = '';
$target_file = $target_dir.basename( $_FILES['alumni_image']['name'] );
$uploadOk = 1;
$imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
$check = getimagesize( $_FILES['alumni_image']['tmp_name'] );
if ( $check !== false ) {
    echo ' file is an image -'.$check['mime'].'.';
    $uploadOk = 1;
} else {
    echo 'file is not an image ';
    $uploadOk = 0;
}
if ( file_exists( $target_file ) ) {
    echo ' file already exists ';
    $uploadOk = 0;
}
if ( $_FILES['alumni_image']['size']>5000000 ) {
    echo ' file too large for upload';
    $uploadOk = 0;
}
if ( $imageFileType != 'jpg' && $imageFileType != 'png'
&& $imageFileType != 'jpeg' && $imageFileType != 'gif' ) {
    echo ' only images allowed';
    $uploadOk = 0;
}
if ( $uploadOk == 0 ) {
   $image_url = $image_url_to_delete;
} else {
    if ( move_uploaded_file( $_FILES['alumni_image']['tmp_name'], $target_file ) ) {
        $image_url = $target_dir.$_FILES['alumni_image']['name'];
    } else {
        $image_url = $image_url_to_delete;
        echo 'an error occurred when we tried to upload your photo';
    }
}
//incase an image is selected delete the previous one else assign image url
//to the previous image url
if ( $check !== false ) {
    //make sure that the image are not the same.Incase they are the same we would
    // save the image url but delete image which make it inacessible when we use image url
    ;
    if ( strcmp( $image_url_to_delete, $image_url ) !== 0 ) {
        if ( !empty( $image_url_to_delete ) ) {
            unlink( $image_url_to_delete );
        }
    } else {
        $image_url = $image_url_to_delete;
    }

} else {
    echo 'there is no image that is selectec';
    echo "$image_url and $image_url_to_delete";
    $image_url = $image_url_to_delete;
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