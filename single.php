<?php include 'header.php'; 
include 'config.php';
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  <?php
                        $id=$_GET['postid'];
                        $sql="select * from post left join category on post.category=category.category_id left join user on post.author=user.user_id  where post_id=$id";
                        $result=mysqli_query($link,$sql);
                        while($row=mysqli_fetch_assoc($result)){?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href="category.php?catid=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href="author.php?authid=<?php echo $row['user_id']?>"><?php  echo $row['username']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php  echo $row['post_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php  echo $row['post_img']?>" alt=""/>
                            <p class="description">
                            <?php  echo $row['description']?>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
