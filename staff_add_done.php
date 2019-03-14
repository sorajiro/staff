<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

try {

  // 画面の入力データ
  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];

  // 入力データの安全対策
  $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
  $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

  // DB接続
  $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
  $user = 'root';
  $password = '1234';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // データ挿入(sql)
  $sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
  $stmt=$dbh->prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $stmt->execute($data);

  // DB切断
  $dbh = null;

  // 追加メッセージ表示
  print $staff_name;
  print'さんを追加しました。<br />';

} catch (Exception $e) {
  print'ただいま障害により大変ご迷惑をおかけしております。';
  // 命令の強制終了
  exit();
}

?>

<a href="staff_list.php">戻る</a>

</body>
</html>
