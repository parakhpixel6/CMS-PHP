
<?php include "./functions.php"?>

<?php
   if(isset($_POST['create_post'])){
      $post_title = $_POST['title'];
      $post_author = $_POST['post_author'];
      $post_category_id = $_POST['post_category_id'];
      $post_status = $_POST['post_status'];
      $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name'];
      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];
      $post_date = date('d-m-y');
      //$post_comment_count = 4;
      //echo ($post_image);
      move_uploaded_file($post_image_temp, "../images/".$post_image);

      $query = "insert into posts (post_title, post_author, post_category_id, post_date, post_image, post_content, post_tags, post_status) VALUES ('$post_title', '$post_author',$post_category_id, now(), '$post_image', '$post_content', '$post_tags',$post_comment_count, '$post_status');";
      
      //echo $query;

      $create_post_query = mysqli_query($connection,$query);
        if(!$create_post_query){
          die("Error hai".mysqli_error($connection));
        }

      comfirmQuery($create_post_query);
   }
?>

<form class="form-group" action="" method="post" enctype="multipart/form-data"> 
   <h3>Add Ur New Post</h3>
   <hr>
   <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" class="form-control" name="title">
   </div>

  


   <div class="form-group">
   <label for="category">Post Category:</label>
      <select name="post_category_id" id="">
         <?php
            $query = "SELECT * FROM categories";
            $select_categories_edit = mysqli_query($connection, $query);
            //comfirmQuery($select_categories_edit);
            while($row = mysqli_fetch_assoc($select_categories_edit)){
               $cat_id = $row['cat_id'];
               $cat_title = $row['cat_title'];

               echo "<option class='dropdown-item' value='{$cat_id}'>{$cat_title}</option>";
            }
         ?>
      </select>
   </div>
 


   <div class="form-group">
      <label for="title">Post Author</label>
      <input type="text" class="form-control" name="post_author">
   </div>
 
 

   <div class="form-group">
      <label for="category">Post Status</label>
      <input type="text" class="form-control" name="post_status" id="">
   </div>
 
   <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file"  name="image">
   </div>

   <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
   </div>
 
   <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
      </textarea>
   </div>

   <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
   </div>
</form>



<?php include "includes/admin_footer.php"; ?>