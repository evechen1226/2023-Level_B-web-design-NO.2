<?php include_once "db.php";

// $res = $User->count(['acc'=>$_POST['acc'],'pw' => $_POST['pw']]);

//1
// if ($res > 0) {
//     echo 1;
// } else {
//     echo 0;
// }

//2
// echo $res;

//3
// echo $User->count(['acc'=>$_POST['acc'],'pw' => $_POST['pw']]);

//4
// echo $User->count($_POST);

//5
//記錄session
$res=$User->count($_POST);

if($res){
    $_SESSION['user']=$_POST['acc'];
}
echo $res;
