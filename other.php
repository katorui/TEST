<?php
ini_set('display_errors', "On");
// var_dump($_POST);
if (isset($_POST)) {
    $item_name = $_POST["item_name"];
    echo $item_name;
}

try {
    $dbh = new PDO("mysql:host=localhost;dbname=raspai_test;charset=utf8mb4","root","root");
    // データ取得用SQL
    $stmt = $dbh->prepare("INSERT INTO item (item_name) VALUES (:item_name)");
    // SQLをセット
    $stmt->bindParam( ":item_name", $item_name, PDO::PARAM_STR);
    // SQLを実行
    $stmt->execute();
    $dbh = null;
    header('Location: /');
} catch (PDOException $e) {
    return "エラー：" . htmlspecialchars($e->getMessage(),
    ENT_QUOTES, 'UTF-8') . "<br>";
}
