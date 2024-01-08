<?php
$que = $Que->find($_GET['id'])
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $que['text'] ?></legend>

    <?php
    $opt = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($opts as $opt) {
        echo "<div>";
        echo "<input type='radio' name='' value='{$opt['id']}'>";
        echo $opt['text'];
        echo "</div>";
    }

    ?>
    <div class="ct">
        <input type="button" value="submit">
    </div>
</fieldset>