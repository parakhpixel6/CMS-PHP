<table class="table table-bordered table-hover ">
   <thead>
      <tr>
         <th>ID</th>
         <th>Author</th>
         <th>Comment</th>
         <th>E-Mail</th>
         <th>Status</th>
         <th>In Response To</th>
         <th>Approve</th>
         <th>Unapprove</th>
         <th>Date</th>
         <th>Delete</th>
      </tr>
   </thead>
   <tbody>

      <?php
         global $connection;

         $query = "SELECT * FROM comments";
         $select_comments = mysqli_query($connection, $query);

         while($row = mysqli_fetch_assoc($select_comments)){
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            //$comment_category_id = $row['comment_category_id'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            //$comment_tags = $row['comment_tags'];
            //$comment_comment_count = $row['comment_comment_count'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$comment_category_id} ";
            // $select_categories_edit = mysqli_query($connection, $query);


            // while($row = mysqli_fetch_assoc($select_categories_edit)){
            //    $cat_id = $row['cat_id'];
            //    $cat_title = $row['cat_title'];
            // }

            if($comment_status === 'Approved'){
               echo "<td style='color: green;'>{$comment_status}</td>";  
            } else {
               echo "<td style='color:red;'>{$comment_status}</td>";    
            }
   


            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
               $post_id = $row['post_id'];
               $post_title = $row['post_title'];
               echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }



            echo "<td><a style='cursor:pointer; color: green' href='comments.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a style='cursor:pointer; color: red' href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td>{$comment_date}</td>";
            echo "<td><a style='cursor:pointer;' href='comments.php?delete={$comment_id}'><i style='color: red' class='fa fa fa-trash'></i></a></td>";
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
      $the_comment_id = $_GET['delete'];
      $deletequery = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
      $delete_query = mysqli_query($connection, $deletequery);  
      header("Location: comments.php");
   }

   if(isset($_GET['unapprove'])){
      //echo "HELLO";
      $the_comment_id = $_GET['unapprove'];
      $unapprovequery = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$the_comment_id}";
      $unapprove_comment_query = mysqli_query($connection, $unapprovequery);  
      header("Location: comments.php");
   }

   if(isset($_GET['approve'])){
      //echo "HELLO";
      $the_comment_id = $_GET['approve'];
      $approvequery = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id}";
      $approve_comment_query = mysqli_query($connection, $approvequery);  
      header("Location: comments.php");
   }

?>