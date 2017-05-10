<?php require_once 'blocks/header.php';?>
 <p class="h4">
        <table class="home_border">
            <tr>
                <td>id</td>
                <td>Category</td>
                <td>Model</td>
                <td>Article</td>
                <td>Serial<br>number</td>
                <td>Price</td>
                <td>Owner</td>
                <td>Condition</td>
                <td>Date</td>
                <td>Warranty<br>Period</td>
                <td>Warranty<br>end</td>
                <td>Comment</td>
                <td>Action</td>
            </tr>
            <?php
            $arr = $inventory->selectInventories();
            foreach ($arr as $value) {
                echo "
            <tr>
                <td>" . $value['id'] . "</td>
                <td>" . $value['category'] . "</td>
                <td>" . $value['model'] . "</td>
                <td>" . $value['article'] . "</td>
                <td>" . $value['s_number'] . "</td>
                <td>" . $value['price'] . "</td>
                <td>" . $value['owner'] . "</td>
                <td>" . $value['condition'] . "</td>
                <td>" . $value['date'] . "</td>
                <td>" . $value['w_period'] . "</td>
                <td>" . $value['w_end'] . "</td>
                <td>" . $value['comments'] . "</td>
                <td><a href='update_inventory.php?id=" . $value['id'] . "'>Edit</a> 
                <a href='delete_inventory.php?id=" . $value['id'] . "'>Delete</a></td>
            </tr>
        ";
            }
            ?>
        </table>
        </p>
<?php require_once 'blocks/footer.php'; ?>