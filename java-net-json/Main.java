import java.net.*;
import java.util.*;
import java.io.*;
import com.google.gson.Gson;

public class Main {

    public static void main(String[] args) {

        try {

            // 書き込みファイル名
            String filename = "syain.txt";
            // テキストで書き込み為の準備
            BufferedWriter bw = new BufferedWriter( new OutputStreamWriter( new FileOutputStream(filename), "utf-8" ) );			

            // System.out.println("社員コード");
            // Scanner sc = new Scanner(System.in, "UTF-8");
            // String scode = sc.nextLine();
            // System.out.println("氏名");
            // String sname = sc.nextLine();
            String target = "社員マスタ.csv";
            String scode = "";
            String sname = "";
            try {
                FileInputStream sjis_file = new FileInputStream(target);
                InputStreamReader charset_stream = new InputStreamReader(sjis_file, "ms932");
                BufferedReader buffer = new BufferedReader(charset_stream);

                String line_buffer;
                line_buffer = buffer.readLine();
                String[] data = line_buffer.split(",");

                scode = data[0];
                sname = data[1];
                    
                // 閉じる
                buffer.close();
                charset_stream.close();
                sjis_file.close();
            } catch (Exception e) {
                //TODO: handle exception
            }


            // URL文字列
            String str = "http://localhost/php-test/db-select-02-heardoc.php?scode=" 
                + scode
                + "&sname="
                + URLEncoder.encode(sname, "utf-8");

            // ターゲット
            URL url = new URL( str );
            // 接続オブジェクト
            HttpURLConnection http = (HttpURLConnection)url.openConnection();
            // GET メソッド 
            http.setRequestMethod("GET");
            // 接続 
            http.connect();
            
            // UTF-8 でリーダーを作成
            InputStreamReader isr = new InputStreamReader( http.getInputStream(), "utf-8");   
            // 行単位で読み込む為の準備   
            BufferedReader br = new BufferedReader( isr );   
            // BufferedReader は、readLine が null を返すと読み込み終了   

            // 文字列作成用
            StringBuilder sb = new StringBuilder();

            String line_buffer;
            while ( null != (line_buffer = br.readLine() ) ) {   
                // StringBuilder に全体を作成
                sb.append(String.format("%s\r\n", line_buffer));
            }

            // 閉じる   
            br.close();
            isr.close();
            http.disconnect();

            // *********************************************
            // JSON の処理
            // *********************************************
            Gson gson = new Gson();
            // データ部分のみ使用
            Syain data = gson.fromJson( sb.toString(), Syain.class );
            if ( (data.社員コード).equals("false") ) {
                bw.write("データが存在しません");
            }
            else {
                bw.write( String.format("%s\r\n", data.社員コード ) );
                bw.write( String.format("%s\r\n", data.氏名 ) );
                bw.write( String.format("%s\r\n", data.フリガナ ) );
                bw.write( String.format("%s\r\n", data.所属 ) );
                bw.write( String.format("%s\r\n", data.性別 ) );
                bw.write( String.format("%s\r\n", data.給与 ) );
                bw.write( String.format("%s\r\n", data.手当 ) );
                bw.write( String.format("%s\r\n", data.管理者 ) );
                bw.write( String.format("%s\r\n", data.作成日 ) );
                bw.write( String.format("%s\r\n", data.更新日 ) );
            }

            bw.close();		// BufferedWriter

        }
        catch( Exception e ) {
            System.out.println( e.getMessage() );
        }

    }

}
