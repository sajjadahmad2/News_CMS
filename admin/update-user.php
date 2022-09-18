<?php include "header.php"; include "config.php";

$id=$_GET['updateid'];
 $sql= "select * from user where user_id=$id";

$result=mysqli_query($link,$sql);

if($result){
    $row=mysqli_fetch_assoc($result);
    $id=$row['user_id'];
    $firstname=$row['first_name'];
    $lastname=$row['last_name'];
    $username=$row['username'];
    $rolee=$row['role'];
}
if(isset($_POST['submit']))
{
    $first=$_POST['fname'];
    $last=$_POST['lname'];
    $user=$_POST['user'];
    $role=$_POST['role'];
    $sql= "  update user set first_name='$first',last_name='$last',username='$user',role='$role'  where user_id=$id";
    $result=mysqli_query($link,$sql);
    if($result)
    {
        header("location:http://localhost/newssite/News_CMS/admin/users.php");
    }
    else{
        echo" <p style='font-size:16px;color:red;text-align:center;'> Data is not Updated due to an error</p>";
    }

}





?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value=<?php echo $id; ?> placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value=<?php echo $firstname; ?> placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value=<?php echo $lastname; ?> placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" value=<?php echo $username; ?> placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $rolee; ?>">
                              <option value="0">normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
