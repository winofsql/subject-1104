# java-net-post
GET と POST を同時に行う

## post-test.php
```php
<?php
header( "Access-Control-Allow-Origin: *" );
header("Content-Type: application/json; charset=utf-8");

$headers = apache_request_headers();

$result = new stdClass();

$result->method = $_SERVER["REQUEST_METHOD"];
$result->get = $_GET;
$result->post = $_POST;
$result->{"response"} = apache_response_headers();
$result->{"request"} = $headers;

print json_encode( $result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );

?>
```

```javascript
{
    "method": "POST",
    "get": {
        "subject": "日本語表示",
        "name": "山田 太郎",
        "text": "こんにちは\r\nさようなら",
        "send": "送信",
        "datetime": "2020/11/04 11:51:25"
    },
    "post": {
        "subject": "件名",
        "name": "鈴木 次郎",
        "text": "ようこそ\r\nよろしくお願いいたします",  
        "send": "送信ボタン",
        "datetime": "2020/11/04 00:00:00"
    },
    "response": {
        "X-Powered-By": "PHP/5.6.40",
        "Access-Control-Allow-Origin": "*",
        "Content-Type": "application/json; charset=utf-8"
    },
    "request": {
        "Host": "lightbox.sakura.ne.jp",
        "Content-Length": "313",
        "User-Agent": "Java/11",
        "Accept": "text/html, image/gif, image/jpeg, *; q=.2, */*; q=.2",
        "Content-Type": "application/x-www-form-urlencoded"
    }
}
```
