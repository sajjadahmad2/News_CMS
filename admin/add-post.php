<?php include "header.php";
include "config.php";
if( isset($_FILES['upload'])){
    $filename=$_FILES['upload']['name'];
    $filesize=$_FILES['upload']['size'];
    $filetempname=$_FILES['upload']['tmp_name'];
    move_uploaded_file($filetempname,"upload/".$filename);
}

 if (isset($_POST['submit'])){

    $title=$_POST['posttitle'];
    $desc=$_POST['postdesc'];
    $cat=$_POST['category'];
    $date=date("d M,Y");
    $author=$_SESSION['userid'];
    $sql="insert into post(title,description,category,post_date,author,post_img) values('$title','$desc','$cat','$date','$author','$filename')";
    mysqli_query($link,$sql);

    $sql="update category set post = post + 1 where category_id=$cat";
    mysqli_query($link,$sql);
    header("location:http://localhost/newssite/News_CMS/admin"); 
 }



?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="posttitle" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                            <?php
                            include "config.php";
                            $sql="select * from category";
                            $result=mysqli_query($link,$sql);
                            while($row=mysqli_fetch_assoc($result)){?>
                                <option value="<?php echo $row['category_id'] ?>"> <?php echo $row['category_name'] ?></option>


                            
                            
                            <?php
                            }

                            ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="upload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
