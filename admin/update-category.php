<?php include "header.php"; 
include "config.php";

$id=$_GET['updateid'];
$sql="select * from category where category_id=$id";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
    $catname=$_POST['cat_name'];
    $sql="update category set category_name='$catname'where category_id=$id";
  
    $result=mysqli_query($link,$sql);
    if($result){
        header("location:http://localhost/newssite/News_CMS/admin/category.php");
    }



}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="1" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'] ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
