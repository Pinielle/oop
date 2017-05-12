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
            </tr>
            <?php

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
                <td>" . date('Y-m-d',strtotime($value['date'])) . "</td>
                <td>" . date('Y-m-d',strtotime($value['w_period'])) . "</td>
                <td>" . date('Y-m-d',strtotime($value['w_end'])) . "</td>
                <td>" . $value['comments'] . "</td>
            </tr>
        ";
            }
            ?>
</table>