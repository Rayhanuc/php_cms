<?php

// *** Function confirm
function confirmQuery($result) {
    global $connection;
    if (!$result) {
        die("<p class='bg-info'>QUERY FAILED<p>". mysqli_error($connection));
    }
}

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


function findAllCategories()
{
    global $connection;

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
}

function deleteCategories() {
    global $connection;

    // ** CATEGORIES DELETE QUERY START
    if (isset($_GET['delete'])) {
        $get_the_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$get_the_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
    // ** CATEGORIES DELETE QUERY END
}

?>