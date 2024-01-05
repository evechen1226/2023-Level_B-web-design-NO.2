<form action="./api/edit_news.php" method="post" >
        <table style="width:75%;text-align:center;">
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
            <td><input type="checkbox" name="sh[]" value="<?=$row['id']; ?>" <?=($row['sh'] == 1)?'checked': '';?>></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']; ?>"></td>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
            <tr>
        <?php
                    
                }
        ?>
            </tr>

        </table>
        <button type="submit">確定修改</button>
        
    </form>