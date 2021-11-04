import java.net.*;
import java.io.*;

public class Main {

    public static void main(String[] args) {

        try {

            // URL文字列
            String str = "http://localhost/php-test/keijiban.php";

            StringBuilder sb = new StringBuilder();
            // sb.append(str);
            // sb.append(String.format("?subject=%s", URLEncoder.encode("日本語表示", "utf-8") ));
            // sb.append(String.format("&name=%s", URLEncoder.encode("山田 太郎", "utf-8") ));
            // sb.append(String.format("&text=%s", URLEncoder.encode("こんにちは\r\nさようなら", "utf-8") ));
            // sb.append(String.format("&send=%s", URLEncoder.encode("送信", "utf-8") ));
            // sb.append(String.format("&datetime=%s", URLEncoder.encode("2020/11/04 11:51:25", "utf-8") ));

            // ターゲット
            URL url = new URL( str );
            // 接続オブジェクト
            HttpURLConnection http = (HttpURLConnection)url.openConnection();
            http.setConnectTimeout(30000);
            http.setReadTimeout(30000);
            http.setDoOutput(true);
            http.setRequestMethod("POST");
            // 接続 
            http.connect();
            
            OutputStreamWriter osw = new OutputStreamWriter(http.getOutputStream());
            BufferedWriter bw = new BufferedWriter(osw);

            // sb.setLength(0);
            sb.append(String.format("personal_name=%s", URLEncoder.encode("件名", "utf-8") ));
            sb.append(String.format("&contents=%s", URLEncoder.encode("鈴木 次郎\n本文", "utf-8") ));

            bw.write( sb.toString() );
            bw.close();
            osw.close();
            
            // UTF-8 でリーダーを作成
            InputStreamReader isr = new InputStreamReader(http.getInputStream(), "utf-8");   
            // 行単位で読み込む為の準備
            BufferedReader br = new BufferedReader(isr);
            String line_buffer;   
            // BufferedReader は、readLine が null を返すと読み込み終了
            while ( null != (line_buffer = br.readLine() ) ) {
                System.out.println(line_buffer);
            }

            // 閉じる   
            br.close();
            isr.close();
            
            http.disconnect();

        }
        catch( Exception e ) {
            System.out.println( e.getMessage() );
        }
    }
}