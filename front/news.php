<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table style="width:95%;margin:auto;">
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        ?>
        <tr>
            <th width="30%" style="background-color: lightgray;">標題</th>
            <th width="50%">內容</th>
            <th></th>
        </tr>
        <?php
        $rows = $News->all(['sh' => 1], " limit $start , $div");
        foreach ($rows as $row) {
        ?>
            <tr>
                <td style="background-color: red;">
                    <div class="title" data-id="<?= $row['id'] ?>"><?= $row['title'] ?></div>
                </td>
                <td>
                    <div id="s<?= $row['id'] ?>"> <?= mb_substr($row['title'], 0, 25) ?>...</div>
                    <div id="a<?= $row['id'] ?>" style="display: none;"> <?= $row['news'] ?></div>
                </td>

                </div>
                <td>

            </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;
            //echo "<a href='./index.php?do=news&p=$prev'>";
            //可省略 ./index.php, 因為?是指當下的頁面
            echo "<a href='?do=news&p=$prev'>";
            echo "<";
            echo "</a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? 'font-size:22px;' : 'font-size:16px';
            echo "<a href='?do=news&p=$i' style='$size'>";
            echo $i;
            echo "</a>";
        }
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='./index.php?do=news&p=$next'>";
            echo ">";
            echo "</a>";
        }

        ?>
    </div>
</fieldset>

<script>
    // 使用 ()=> 要在()中加e，否則無法使用$(e.target)指向特定的物件, 使用$(this)會指向window
    $("td .title").on('click', (e) => {
        //  $(e.target) 等同於 在 function (){ }下的 $(this)
        let id = $(e.target).data('id');
        console.log(id)
        $(`#s${id},#a${id}`).toggle();
       // $("#s" + id + ",#a" + id).toggle();
    })
</script>