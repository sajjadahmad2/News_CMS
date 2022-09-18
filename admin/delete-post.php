<?php
include "header.php";
 include 'config.php';

    $id=$_GET['deleteid'];
    $catid=$_GET['catid'];
    $sql="select *from post where post_id=$id";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    unlink("upload/".$row['post_img']);
    $sql="delete from post where post_id=$id;";
    $sql.="update category set post= post-1 where category_id=$catid";
    $result=mysqli_multi_query($link,$sql);
    if($result){
        header("location:http://localhost/newssite/News_CMS/admin/post.php");
    }else{

        echo"object is not deleted";    }

?>