<?php

    function comfirmQuery($result){

       global $connection;

       if(!$result){
          die("QUERY FAILED." . mysqli_Error($connection));
       }


    }   

   function insertCategories(){

      global $connection;

      if(isset($_POST['submit'])){
         $cat_title = $_POST['cat_title'];
         if($cat_title == "" || empty($cat_title)){
            echo '<span style="color:red">This field should not to be empty</span>';
         } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .="VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            unset($_POST['submit']);
            unset($_POST['cat_title']);
            if(!$create_category_query){
               die('QUERY FAILED' . mysqli_error($connection));
            }
         }
      }
   }

   function findAllCategories(){

      global $connection;
      
      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $query);
      
      while($row = mysqli_fetch_assoc($select_categories)){
         $cat_id = $row['cat_id'];
         $cat_title = $row['cat_title'];
         
         echo "<tr>";
         echo "<td>{$cat_id}</td>";
         echo "<td>{$cat_title}</td>";
         echo "<td><a style='cursor:pointer;' href='categories.php?delete={$cat_id}'><i style='color: red' class='fa fa fa-trash'></i></a></td>";
         echo "<td><a style='cursor:pointer;' href='categories.php?edit={$cat_id}'><i style='color: goldenrod' class='fa fa fa-edit'></i></a></td>";
         echo "</tr>";
      }
   }
   
   function deleteCategories(){
      
      global $connection;

      if(isset($_GET['delete'])){
         $the_cat_id = $_GET['delete'];
         $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
         $delete_query = mysqli_query($connection, $query);
         header("Location: categories.php");
      }

   }

   function editCategories(){
      global $connection;

      if(isset($_GET['edit'])){
         $cat_id = $_GET['edit'];
         include "includes/edit_categories.php";
      }
   }
?>