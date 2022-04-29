<?php
include_once 'config.php';
    $max_size = 100000;
 
    $location = "uploads/";
    $datum = mktime(date('H')+0, date('i'), date('s'), date('m'), date('d'), date('y'));
    $name = $_FILES['imageFile']['name'];
    $size = $_FILES['imageFile']['size'];
    $type = $_FILES['imageFile']['type'];
    $tmp_name = $_FILES['imageFile']['tmp_name'];
    $target_file = $target_dir . date('Y.m.d_H:i:s_', $datum) . basename($_FILES["imageFile"]["name"]);
 
    if(isset($name) && !empty($name)){
 
    $extension = substr($name, strpos($name, '.') + 1);
 
    if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $extension == $size<=$max_size){
        if(move_uploaded_file($tmp_name, $target_file)){
            echo "Successfully uploaded";
            $query = "INSERT INTO facereg (name, size, type, location) VALUES ('$name', '$size', '$type', '$target_file')";
            $result = mysqli_query($conn ,$query);
        }else{
            echo "Failed to upload";
        }
    }else{
        echo "Not supported";
    }
 
    }
?>