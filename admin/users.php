<?php include "header.php"; include 'config.php';
if($_SESSION['role'] == '0'){
    header("location:http://localhost/newssite/News_CMS/admin/post.php");
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php  
                      $limit=3;
                      if(isset($_GET['page'])){

                        $page=$_GET['page'];
                      }else{
                        $page=1;
                      }
                      
                      $offset=($page-1)*$limit;
                      $sql="select *from user order by user_id limit $offset,$limit";
                      $result=mysqli_query($link,$sql);
                      while($row=mysqli_fetch_assoc($result))
                      {
                      $id=$row['user_id'];
                      $first=$row['first_name'];
                      $last=$row['last_name'];
                      $user=$row['username'];
                      $role=$row['role'];
                      if($role==0){$role="user";}else{$role="Admin";};
                          echo"<tr>
                              <td class='id'>" .$id."</td>
                              <td>".$first."".$last."</td>
                              <td>".$user."</td>
                              <td>".$role."</td>
                              <td class='edit'><a href='update-user.php? updateid=".$id."'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php? deleteid=".$id."'><i class='fa fa-trash-o'></i></a></td>
                          </tr>";}
                     
                      ?>
                    </tbody>
                  </table>
                  <?php
                  $sql="select * from user";
                  $result=mysqli_query($link,$sql);
                  $total=mysqli_num_rows($result);
                  $limit=3;
                  $totalpages=ceil($total/$limit);
                  echo"<ul class='pagination admin-pagination'>";
                     
                    for($i = 1;$i <= $totalpages;$i++)

                    {
                        if($i==$page){
                            $active="active";
                
                        }else{

                            $active="";
                        }
                        echo '<li class="'.$active.'"><a href="users.php? page='.$i.'">'.$i.'</a></li>';
                    }
                      
                  echo'</ul>';
                  ?>
              </div>
          </div>
      </div>
  </div>

