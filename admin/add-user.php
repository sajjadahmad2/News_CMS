<?php include "header.php";
 
include "config.php";
if($_SESSION['role'] == '0'){
    header("location:http://localhost/newssite/News_CMS/admin/post.php");
}
if(isset($_POST['save'])){

    $first=$_POST['fname'];
    $last=$_POST['lname'];
    $user=$_POST['user'];
    $password=md5($_POST['password']);
    $role=$_POST['role'];
    $sql="select * from user where username='$user'";
    $result=mysqli_query($link,$sql);

    if(mysqli_num_rows($result)>0){
        echo" <p style='font-size:16px;color:red;text-align:center;'> User already exist</p>";
    }else{

        $sql="insert into user (first_name,last_name,username,password,role) values('$first','$last','$user','$password','$role')";
        mysqli_query($link,$sql);
        header("location:http://localhost/newssite/admin/users.php");



    }
}


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
