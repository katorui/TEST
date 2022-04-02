<?php
ini_set('display_errors', "On");
try {
    $dbh = new PDO("mysql:host=localhost;dbname=raspai_test;charset=utf8mb4","root","root");
    $stmt = $dbh->prepare("SELECT * FROM item");
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    return "エラー：" . htmlspecialchars($e->getMessage(),
    ENT_QUOTES, 'UTF-8') . "<br>";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>アイテム追加</h1>
<form action = "other.php" method="POST">
    <input type="text" name ="item_name">
    <input type="submit" value="送信">
</form>
<?php foreach ($all as $item) :?>
    <ul>
      <li><?php echo $item["item_name"]; ?></li>
    </ul>
<?php endforeach; ?>
</body>
</html>
