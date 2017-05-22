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
            if (isset($arr)){
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
                <td>" ;
                    if ($value['w_period']){
                    echo date('Y-m-d',strtotime($value['w_period']));}
                    echo "</td>
                <td>";
                    if ($value['w_end']){
                    echo date('Y-m-d',strtotime($value['w_end']));}
                    echo "</td>
                <td> <a href='update_inventory?id=" . $value['id'] . "'>Edit</a> 
                <a href='delete_inventory?id=" . $value['id'] . "'>Delete</a></td>
            </tr>
        ";}
            }
            ?>
</table>