<?php
require_once( "setting.php" );
require_once( "connect.php" );
header( "Content-Type: application/json; charset=utf-8" );

// ***********************************
// 接続
// ***********************************
$pdo = new PDO( $GLOBALS["connect_string"], $GLOBALS["user"], $GLOBALS["password"] );

// ***********************************
// SQL 文字列
// ***********************************
$sql = "SELECT * FROM 社員マスタ WHERE 社員コード = '0001'"; //>= :kyuyo ORDER BY 社員コード';
// ***********************************
// 準備
// ***********************************
$statement = $pdo->prepare($sql);

// ***********************************
// バインド
// ***********************************
// $kyuyo = 300000;
// $statement->bindValue(':kyuyo', $kyuyo, PDO::PARAM_INT);

// ***********************************
// 実行
// ***********************************
$statement->execute();

// ***********************************
// 結果データを取得
// ***********************************
$html = "";
$row = $statement->fetch(PDO::FETCH_ASSOC);

print json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );


?>