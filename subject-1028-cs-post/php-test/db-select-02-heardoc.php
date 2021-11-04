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
// $sql = "SELECT * FROM 社員マスタ WHERE 社員コード = :scode"; //>= :kyuyo ORDER BY 社員コード';
$sql = "UPDATE 社員マスタ set 氏名 = :sname WHERE 社員コード = :scode"; //>= :kyuyo ORDER BY 社員コード';
// ***********************************
// 準備
// ***********************************
$statement = $pdo->prepare($sql);

// ***********************************
// バインド
// ***********************************
if ( !isset($_GET['scode']) ) {
    $_GET['scode'] = '0001';
}
if ( !isset($_GET['sname']) ) {
    $_GET['sname'] = '匿名';
}
$scode = $_GET['scode'];
$sname = $_GET['sname'];
$statement->bindValue(':scode', $scode, PDO::PARAM_STR);
$statement->bindValue(':sname', $sname, PDO::PARAM_STR);

// ***********************************
// 実行
// ***********************************
$ret = $statement->execute();

// ***********************************
// 結果データを取得
// ***********************************
// $row = $statement->fetch(PDO::FETCH_ASSOC);
if ( $ret === false ) {
    print '{ "社員コード": "false"  }';
}
else {
    $row["社員コード"] = $_GET['scode'];
    $row["氏名"] = $_GET['sname'];
    print json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
}


?>