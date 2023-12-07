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
                        Posts
<!--                        <small>Author</small>-->
                    </h1>

                    <!-- Posts table start -->
                    <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }

                        switch ($source) {
                            case 'add_post';
                                include "includes/add_post.php";
                                break;
                            case '100';
                                echo "NICE 100";
                                break;
                            case '200';
                                echo "NICE 200";
                                break;
                            case '300';
                                echo "NICE 300";
                                break;
                            default:
                                include "includes/view_all_posts.php";
                                break;

                        }
                    ?>
                    <!-- Posts table end -->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ; ?>
