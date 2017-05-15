<?php require_once 'blocks/header.php';
?>
<table>
    <td valign="top"><?php require_once 'blocks/left_sb.php' ?></td>
    <td>
        <h1>Categories</h1>
        Add NEW Category<br>
        <form action="new_category.php" method="post">
            <input name="title" id="title" type="text"/>
            <input name="submit" type="submit" value="Add Category">
        </form>
        <p class="h4">
        <table class="home_border">
            <tr>
                <td>id</td>
                <td>Category</td>
                <td>Action</td>
            </tr>
            <?php
            $arr = $categories->selectCategories();
            foreach ($arr as $value) {
                echo "
            <tr>
                <td colspan=\"3\">
                    <form action='edit_category.php' method='post'>
                        <table>
                            <tr>
                                <td>" . $value['id'] . "</td>
                                <td><input name = 'title' value='" . $value['title'] . "'></td>
                                <td>
                                    <input type='submit' value='Save'/>
                                    <a href='delete_category.php?id=" . $value['id'] . "'>Delete</a>
                                    <input type='hidden' name='id' value='" . $value['id'] . "'>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            
        ";
            }
            ?>
        </table>
    </td>
</table>
<?php require_once 'blocks/footer.php'; ?>
