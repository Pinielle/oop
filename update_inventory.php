<?php

require_once 'blocks/header.php';

$valueinventory = $inventory->selectInventory($_REQUEST['id']);
?>
        <p class="h4">
        <table class="home_border">
            <form action="edit_inventory" method="post">
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" size="0">
                            <?php

                            $result = $categories->selectCategories();


                            if (count($result) > 0) {
                                foreach ($result as $myrow){
                                    printf("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
                                }

                            }
                            else {
                                echo"<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
                                exit();
                            }

                            ?>

                        </select></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><input name="model" id="model" type="text" value="<?= $valueinventory['model']?>"/></td>
                </tr>
                <tr>
                    <td>Article</td>
                    <td><input name="article" id="article" type="text" value="<?= $valueinventory['article']?>"/></td>
                </tr>
                <tr>
                    <td>Serial<br>number</td>
                    <td><input name="s_number" id="s_number" type="text" value="<?= $valueinventory['s_number']?>"/></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input name="price" id="price" type="text" value="<?= $valueinventory['price']?>"/></td>
                </tr>
                <tr>
                    <td>Owner</td>
                    <td><input name="owner" id="owner" type="text" value="<?= $valueinventory['owner']?>"/></td>
                </tr>
                <tr>
                    <td>Condition</td>
                    <td><input name="condition" id="condition" type="text"
                               value="<?= $valueinventory['condition']?>"/></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input name="date" id="date" type="date"
                               value="<?= date('Y-m-d', strtotime($valueinventory['date']))?>"/></td>
                </tr>
                <tr>
                    <td>Warranty<br>Period</td>
                    <td><input name="w_period" id="w_period" type="date"
                               value="<?php
                               if ($valueinventory['w_period']){
                               echo date('Y-m-d', strtotime($valueinventory['w_period']));} ?>"/></td>
                </tr>
                <tr>
                    <td>Warranty<br>end</td>
                    <td><input name="w_end" id="w_end" type="date"
                               value="<?php
                               if ($valueinventory['w_end']){
                               echo date('Y-m-d', strtotime($valueinventory['w_end']));}?>"/></td>
                </tr>
                <tr>
                    <td>Comment</td>
                    <td><input name="comments" id="comments" type="text" value="<?= $valueinventory['comments']?>"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input name="submit" type="submit" value="Update">
                    </td>
                    <input name="id" type="hidden" value="<?= $valueinventory['id']?>">
                </tr>
            </form>
        </table>
<?php
    require_once 'blocks/footer.php';
?>