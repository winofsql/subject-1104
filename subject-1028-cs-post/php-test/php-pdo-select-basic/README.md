# php-pdo-select-basic
社員マスタ => https://github.com/winofsql/sql-syain

## db-select-01-array.php
![image](https://user-images.githubusercontent.com/1501327/129667592-ac1a109c-0d11-4828-b659-a09bc0e6f9b1.png)

## db-select-02-heardoc.php
結果の HTML をヒアドキュメントで作成し &lt;?= $html ?&gt; で埋め込みます
```php
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
```
![image](https://user-images.githubusercontent.com/1501327/129667707-47089ae0-9372-4b5e-b08b-ee7f1e3c8491.png)

