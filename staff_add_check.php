<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php

// 画面の入力データ
$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

// 入力データの安全対策
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

// 「スタッフ名」のチェック
if ($staff_name=='') {
  print'スタッフ名が入力されていません。 <br/>';
}
else {
  // 正常の場合、スタッフ名を表示
  print'スタッフ名:';
  print $staff_name;
  print'<br/>';
}

// 「パスワード」のチェック
if ($staff_pass=='') {
  print'パスワードが入力されていません。<br/>';
}

// 「パスワード２」のチェック
if ($staff_pass!=$staff_pass2) {
  print'パスワードが一致しません。<br/>';
}

// 入力データの総チェック
if ($staff_name=='' || $staff_pass=='' || $staff_pass!=$staff_pass2) {
  print'<form>';
  print'<input type="button" onclick="history.back()" value="戻る">';
  print'</form>';
} else {

  // 正常の場合、次画面へ遷移

  // パスワードをハッシュ化
  $staff_pass=md5($staff_pass);
  print'<form method="post" action="staff_add_done.php">';
  print'<input type="hidden" name="name" value="'.$staff_name.'">';
  print'<input type="hidden" name="pass" value="'.$staff_pass.'">';
  print'<br/>';
  print'<input type="button" onclick="history.back()" value="戻る">';
  print'<input type="submit" value="OK">';
  print'</form>';
}

?>
</form>
</body>
</html>
