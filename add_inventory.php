<?php

require_once("blocks/header.php");
?>
    <table>
        <td valign="top"><?php require_once 'blocks/left_sb.php' ?></td>
        <td>
            <p class="h4">
            <table class="home_border">
                <form action="<?php echo $router->getUrl('new_inventory.php'); ?>" method="post">
                    <tr>
                        <td>Category</td>
                        <td>
                            <select name="category" size="0">
                                <?php

                                $result = $categories->selectCategories();


                                if (count($result) > 0) {
                                    foreach ($result as $myrow) {
                                        printf("<option value='%s'>%s</option>", $myrow["id"], $myrow["title"]);
                                    }

                                } else {
                                    echo "<p>Информация по запросу не может быть извлечена, в таблице нет записей</p>";
                                    exit();
                                }

                                ?>

                            </select></td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td><input name="model" id="model" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Article</td>
                        <td><input name="article" id="article" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Serial<br>number</td>
                        <td><input name="s_number" id="s_number" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input name="price" id="price" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td><input name="owner" id="owner" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Condition</td>
                        <td><input name="condition" id="condition" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><input name="date" id="date" type="text" value="<?php $date = date('Y-m-d');
                            echo $date; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Warranty<br>Period</td>
                        <td><input name="w_period" id="w_period" type="date"/></td>
                    </tr>
                    <tr>
                        <td>Warranty<br>end</td>
                        <td><input name="w_end" id="w_end" type="date"/></td>
                    </tr>
                    <tr>
                        <td>Comment</td>
                        <td><input name="comments" id="comments" type="text"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input name="submit" type="submit" value="Add inventory">
                        </td>
                    </tr>
                </form>
            </table>
        </td>
    </table>
<?php require_once 'blocks/footer.php' ?>