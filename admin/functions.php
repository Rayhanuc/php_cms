<?php

function insert_categories() {
    global $connection;
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
}

?>