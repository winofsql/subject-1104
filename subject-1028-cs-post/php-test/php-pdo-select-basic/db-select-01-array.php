<?php
require_once( "setting.php" );
require_once( "connect.php" );
header( "Content-Type: text/html; charset=utf-8" );

// ***********************************
// 接続
// ***********************************
$pdo = new PDO( $GLOBALS["connect_string"], $GLOBALS["user"], $GLOBALS["password"] );

// ***********************************
// SQL 文字列
// ***********************************
$sql = 'SELECT * FROM 社員マスタ WHERE 給与 >= :kyuyo ORDER BY 社員コード';
// ***********************************
// 準備
// ***********************************
$statement = $pdo->prepare($sql);

// ***********************************
// バインド
// ***********************************
$kyuyo = 300000;
$statement->bindValue(':kyuyo', $kyuyo, PDO::PARAM_INT);

// ***********************************
// 実行
// ***********************************
$statement->execute();

// ***********************************
// 結果データを取得
// ***********************************
$results = [];  // 配列として初期化
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;  // 配列に行配列を追加
}

// 全ての行データの詳細の文字列化
$data = print_r( $results, true );

?>
<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
</head>
<body>
<h3 class="alert alert-primary">社員マスタ</h3>
<div id="content" class="m-4">

<pre>
<?= $data ?>
</pre>

</div>
</body>
</html>
