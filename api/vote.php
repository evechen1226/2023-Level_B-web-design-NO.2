<?php include_once "db.php";

$opt=$Que->find($_POST['opt']);
$opt['vote']++;
$Que->save($opt);
$sub=$Que->find($opt['subject_id']);
$sub['vote']++;
$Que->save($sub);

// 也可以寫 $opt['subject_id']
to("../index.php?do=result&id={$sub['id']}");