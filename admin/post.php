<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        include 'config.php';
                          $limit=3;
                          if(isset($_GET['page'])){
                            $page=$_GET['page'];
                            }else{
                                $page=1;
                                }
                                             
                        $offset=($page-1)*$limit;
                        if($_SESSION['role'] == '1'){
                            $sql="select * from post left join category on post.category=category.category_id left join user on post.author=user.user_id order by category.category_id limit $offset,$limit";  
                        }else{
                        $sql="select * from post left join category on post.category=category.category_id left join user on post.author=user.user_id  where post.author={$_SESSION['userid']} order by category.category_id limit $offset,$limit";
                        }
                        $result=mysqli_query($link,$sql);
                        while($row=mysqli_fetch_assoc($result)){?>
                        
                          <tr>
                              <td class='id'><?php echo $row['post_id']?></td>
                              <td><?php echo $row['title']?></td>
                              <td><?php echo $row['category_name']?></td>
                              <td><?php echo $row['post_date']?></td>
                              <td><?php  echo $row['first_name']?></td>
                              <td class='edit'><a href='update_post.php? updateid="<?php  echo $row['post_id']?>"'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?deleteid="<?php  echo $row['post_id']?>"&catid="<?php  echo $row['category_id']?>"'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                  </table>
                  <?php
                  $sql="select * from post";
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
                        echo '<li class="'.$active.'"><a href="post.php? page='.$i.'">'.$i.'</a></li>';
                    }
                      
                  echo'</ul>';
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
