<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table style="width:95%;margin:auto;">
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        ?>
        <tr>
            <th width="30%">標題</th>
            <th width="50%">內容</th>
            <th>人氣</th>
        </tr>
        <?php
        $rows = $News->all(['sh' => 1], " order by `good` desc limit $start , $div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= mb_substr($row['title'], 0, 25) ?>...</td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;
            //echo "<a href='./index.php?do=pop&p=$prev'>";
            //可省略 ./index.php
            echo "<a href='?do=pop&p=$prev'>";
            echo "<";
            echo "</a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? 'font-size:22px;' : 'font-size:16px';
            echo "<a href='?do=pop&p=$i' style='$size'>";
            echo $i;
            echo "</a>";
        }
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='./index.php?do=pop&p=$next'>";
            echo ">";
            echo "</a>";
        }

        ?>
    </div>
</fieldset>