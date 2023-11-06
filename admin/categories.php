<?php include "includes/admin_header.php" ; ?>


<div id="wrapper">

    <!-- Navigation markup start -->
    <?php include "includes/admin_navigation.php" ; ?>
    <!-- Navigation markup end -->

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <!-- Add Category form start-->
                    <div class="col-xs-6">
                        <!-- CATEGORY INPUT-->
                        <?php insert_categories(); ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>


                        <?php
                            // ** UPDATE AND INCLUDE QUERY
                            if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php" ;
                            }
                        ?>
                    </div><!-- Add Category form end-->

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- FIND ALL CATEGORIES QUERY START-->
                                <?php findAllCategories(); ?>
                                <?php deleteCategories(); ?>
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

    <?php include "includes/admin_footer.php" ; ?>
