<table class="table table-bordered table-hover ">
   <thead>
      <tr>
         <th>ID</th>
         <th>Author</th>
         <th>Title</th>
         <th>Category</th>
         <th>Status</th>
         <th>Image</th>
         <th>Tags</th>
         <th>Comments</th>
         <th>Date</th>
         <th>Delete</th>
         <th>Edit</th>
      </tr>
   </thead>
   <tbody>

      <?php
         global $connection;

         $query = "SELECT * FROM posts";
         $select_posts = mysqli_query($connection, $query);

         while($row = mysqli_fetch_assoc($select_posts)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";

            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
            $select_categories_edit = mysqli_query($connection, $query);


            while($row = mysqli_fetch_assoc($select_categories_edit)){
               $cat_id = $row['cat_id'];
               $cat_title = $row['cat_title'];
            }
            
            echo "<td>{$cat_title}</td>";

            echo "<td>{$post_status}</td>";
            echo "<td><img width='100' class='img-responsive' src='../images/{$post_image}' alt=''></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a style='cursor:pointer;' href='posts.php?delete={$post_id}'><i style='color: red' class='fa fa fa-trash'></i></a></td>";
            echo "<td><a style='cursor:pointer;' href='posts.php?source=edit_post&p_id={$post_id}'><i style='color: goldenrod' class='fa fa fa-edit'></i></a></td>";
            echo "</tr>";
         }
      ?>

      <!-- <tr>
         <td>10</td>
         <td>Puneri Paltan</td>
         <td>How to Explore</td>
         <td>Travel</td>
         <td>On the Way</td>
         <td><img width='100' class='img-responsive' src='../images/$post_image' alt=''></td>
         <td>solo_traveller</td>
         <td>Happy Journey</td>
         <td>12/12/12</td>
      </tr> -->
   </tbody>
</table>

<?php
   if(isset($_GET['delete'])){
      //echo "HELLO";
      $the_post_id = $_GET['delete'];
      $deletequery = "DELETE FROM posts WHERE post_id = {$the_post_id}";
      $delete_query = mysqli_query($connection, $deletequery);  
      header("Location: posts.php");
   }

?>