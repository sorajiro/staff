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
  $staff_code = $_POST['code'];
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

  // データ更新(sql)
  $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
  $stmt=$dbh->prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $data[] = $staff_code;
  $stmt->execute($data);

  // DB切断
  $dbh = null;

} catch (Exception $e) {
  print'ただいま障害により大変ご迷惑をおかけしております。';
  // 命令の強制終了
  exit();
}

?>

修正しました。<br/>
<br/>
<a href="staff_list.php">戻る</a>

</body>
</html>
