<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>
<?php include "../includes/db.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to CMS Blogs
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                           <?php insert_categories();?>

                           <form action="categories.php" method="post">
                              <div class="form-group">
                                 <label for="cat_title">Add Category</label>
                                 <input class="form-control" type="text" name="cat_title" id="">
                              </div>
                              <div class="form-group">
                                 <input class="btn btn-primary" type="submit" name="submit" id="" value="Add Category">
                              </div>
                           </form>
                           <hr>

                           <?php
                           
                              if(isset($_GET['edit'])){
                                 $cat_id = $_GET['edit'];
                                 include "includes/edit_categories.php";
                              }
                           
                           ?>

                        </div>
                        <!-- <ol class="breadcrumb">
                           <li>
                              <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                           </li>
                           <li class="active">
                              <i class="fa fa-file"></i> Blank Page
                           </li>
                        </ol> -->
                        <div class="col-xs-6">

                           <table class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Deleting</th>
                                    <th>Updating</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php

                                 ?>
                                 <?php
                                    if(isset($_GET['delete'])){
                                       $the_cat_id = $_GET['delete'];
                                       $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                       $delete_query = mysqli_query($connection, $query);
                                       header("Location: categories.php");
                                    }
                                 ?>
                                 <!-- <tr>
                                    <td>Drama</td>
                                    <td>Documentry</td>
                                 </tr> -->
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php"; ?>
