<?php include "header.php";
include "config.php";
$id=$_GET['updateid'];
//updation code
if(isset($_FILES['new-image'])){
if(($_FILES['new-image']['name'])){
    $filename=$_FILES['new-image']['name'];
    $filesize=$_FILES['new-image']['size'];
    $filetempname=$_FILES['new-image']['tmp_name'];
    move_uploaded_file($filetempname,"upload/".$filename);
    
}
else{
    $filename=$_POST['old-image'];
      
}
}
 if (isset($_POST['submit'])){
    $title=$_POST['posttitle'];
    $desc=$_POST['postdesc'];
    $cat=$_POST['category'];
    $date=date("d M,Y");
    $author=$_SESSION['userid'];
    $sql="update post set title='$title',description='$desc',category='$cat',post_img='$filename' where post_id=$id ;";
    mysqli_query($link,$sql);
    header("location:http://localhost/newssite/News_CMS/admin/post.php");
 }
 //fetching the data code from id
 $sql="select * from post left join category on post.category=category.category_id left join user on post.author=user.user_id where post_id=$id"; 
 $result=mysqli_query($link,$sql);
 while($row=mysqli_fetch_assoc($result)){
    $categoryid=$row['category'];
    ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Update  Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="posttitle" class="form-control" autocomplete="off" value="<?php echo $row['title'];?>" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required><?php echo $row['description'];?></textarea>
                      </div>
                        <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img  src="upload/<?php echo $row['post_img'];?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['post_img'];?>">
                        </div>
                        <?php
                        }

                        ?>                      
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                            <?php
                            include "config.php";
                            $sql="select * from category";
                            $result=mysqli_query($link,$sql);
                            while($row=mysqli_fetch_assoc($result)){?>
                            <?php
                             if($row['category_id'] == $categoryid){
                                $selected="selected";
                             }else{
                                $selected="";
                             }
                            ?>
                                <option <?php echo $selected ?> value="<?php echo $row['category_id'] ?>"> <?php echo $row['category_name'] ?></option>
                            <?php
                            }

                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
