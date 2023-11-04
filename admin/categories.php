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
                        <?php
                            // ** CATEGORY INPUT QUERY START
                            if (isset($_POST['submit'])) {
                                $cat_title = $_POST['cat_title'];

                                if ($cat_title == "" | empty($cat_title)) {
                                    echo "<p class='alert-danger'>This field should not be empty.</p>";
                                } else {
                                    $query = "INSERT INTO categories(cat_title) ";
                                    $query .= "VALUE('{$cat_title}')";

                                    $create_category_query = mysqli_query($connection, $query);

                                    if (!$create_category_query) {
                                        die('QUERY FAILED' . mysqli_error($connection));
                                    }
                                }
                            }
                            // ** CATEGORY INPUT QUERY END
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Edit Category</label>

                                <?php
                                // ** CATEGORIES QUERY EDIT START
                                if (isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];

                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id   ";
                                $select_categories_edit = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($select_categories_edit)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    ?>

                                    <input value="<?php if (isset($cat_title)) { echo $cat_title; }?>" class="form-control" type="text" name="cat_title">

                              <?php   }} ?>
<!--                                CATEGORIES QUERY EDIT END-->

                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
                            </div>
                        </form>
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
                                <?php
                                    // ** FIND ALL CATEGORIES QUERY START
                                    $query = "SELECT * FROM categories";
                                    $select_categories = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($select_categories)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        if (!empty($select_categories)) {
                                            echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "<td><a class='text-danger' href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                            echo "<td><a class='text-info' href='categories.php?edit={$cat_id}'>edit</a></td>";
                                            echo "</tr>";
                                        }

                                    }
                                    // ** FIND ALL CATEGORIES QUERY END

                                    // ** CATEGORIES DELETE QUERY START
                                    if (isset($_GET['delete'])) {
                                        $get_the_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$get_the_id}";
                                        $delete_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                    }
                                    // ** CATEGORIES DELETE QUERY END
                                ?>
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
