<?php
include "header.php";
 include 'config.php';

 if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];
    $sql="delete from user where user_id=$id";
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/newssite/admin/users.php");
    }else{

        echo"object is not deleted";    }
 }


?>