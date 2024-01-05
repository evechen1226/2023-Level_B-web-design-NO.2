<form action="./edit_news.php" method="post" class="ct">
        <table class="style:text">
            <tr>
                <td>編號</td>
                <td>顯示</td>
                <td>刪除</td>

                <?php
                $rows = $News->all();
                foreach ($rows as $row) {
                ?>
            </tr>
            <td><?= $row['title']; ?></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']; ?>" <?=($row['sh'] == 1)?'checked': '';?>></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']; ?>"></td>
            <tr>
        <?php
                    
                }
        ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <button type="submit">確定修改</button>
        
    </form>