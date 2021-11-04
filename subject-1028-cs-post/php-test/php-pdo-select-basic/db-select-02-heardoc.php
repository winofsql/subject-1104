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
$html = "";
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

    $html .= <<<HTML
    <tr>
        <td>{$row["氏名"]}</td>
        <td>{$row["フリガナ"]}</td>
        <td>{$row["給与"]}</td>
        <td>{$row["手当"]}</td>
        <td>{$row["生年月日"]}</td>
    </tr>
HTML;

}

?>
<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<style>
td {
    white-space: pre;
}
</style>
</head>
<body>
<h3 class="alert alert-primary">社員マスタ</h3>
<div id="content" class="m-4">

<div class="table-responsive">
    <table class="table table-hover">
    <?= $html ?>
    </table>
</div>

</div>
</body>
</html>



