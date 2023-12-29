<?php include_once "db.php";

unset($_POST['pw2']);
$User->save($_POST);

// 因為是AJAX，所以是在背景作業，不用導向其網頁
// 實務上要加上確認資料庫有無儲存成功，回傳狀態值