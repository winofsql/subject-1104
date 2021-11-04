<?php

function readData(){
    $keijban_file = 'keijiban.txt';

    $fp = fopen($keijban_file, 'rb');

    if ($fp){
        if (flock($fp, LOCK_SH)){
            while (!feof($fp)) {
                $buffer = fgets($fp);
                print($buffer);
            }

            flock($fp, LOCK_UN);
        }
        else {
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

function writeData(){
    $personal_name = $_POST['personal_name'];
    $contents = $_POST['contents'];
    $contents = nl2br($contents);
    $now = date("Y/m/d H:i:s");

    $data = <<< DATA
<hr>
<p>投稿者:{$personal_name} : {$now}</p>
<p>内容:</p>
<p>{$contents}</p>
DATA;

    $keijban_file = 'keijiban.txt';

    $fp = fopen($keijban_file, 'ab');

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fwrite($fp,  $data) === FALSE){
                print('ファイル書き込みに失敗しました');
            }

            flock($fp, LOCK_UN);
        }
        else {
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

?>
