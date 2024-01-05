<?php include_once "db.php";

if (isset($_POST['subject'])) {
    $Que->save(['text' => $_POST['subject'], 'subject_id' => 0, 'vote' => 0]);
    // 找之前儲存在text內，相同內容的id，但不能有相同的內容
    $subject_id = $Que->find(['text' => $_POST['subject']])['id'];
    // 找最大的 id ，但不能有短時間，有很多筆資料存入
    $subject_id=$Que->max('id');
}


if (isset($_POST['option'])) {
    foreach ($_POST['option'] as $option) {
        $Que->save(['text' => $option, 'subject_id' =>$subject_id, 'vote' => 0]);
    }
}

to("../back.php?do=que");
