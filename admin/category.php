<?php include "header.php";
include "config.php"; 

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
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
                      $sql="select *from category order by category_id limit $offset,$limit";
                      $result=mysqli_query($link,$sql);
                      while($row=mysqli_fetch_assoc($result))
                      {
                      $id=$row['category_id'];
                      $name=$row['category_name'];
                      $totalpost=$row['post'];
                      ?>
                        <tr>
                            <td class='id'><?php echo $id;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $totalpost;?></td>
                            <td class='edit'><a href='update-category.php?updateid="<?php echo $id;?>"'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?updateid="<?php echo $id;?>"'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                  $sql="select * from category";
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
                        echo '<li class="'.$active.'"><a href="category.php? page='.$i.'">'.$i.'</a></li>';
                    }
                      
                  echo'</ul>';
                  ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
