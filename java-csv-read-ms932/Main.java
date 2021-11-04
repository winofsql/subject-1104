import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.InputStreamReader;

public class Main {

    // *****************************************************
    // エントリポイント
    // *****************************************************
    public static void main(String[] args) {

        String target = "社員マスタ.csv";
        try {
            // 開く
            FileInputStream sjis_file = new FileInputStream(target);
            InputStreamReader charset_stream = new InputStreamReader(sjis_file, "ms932");
            BufferedReader buffer = new BufferedReader(charset_stream);

            String line_buffer;

            String status = "初回";
            String[] adata;
            String disp;

            while ( null != (line_buffer = buffer.readLine() ) ) {

                // 初回
                if ( status.equals("初回") ){
                    status = "2回目以降";
                    adata = line_buffer.split(",");
                    System.out.print( adata[0] );
                    int count = adata.length;
                    for( int i = 1; i < count; i++) {
                        disp = String.format( " : %s", adata[i] );  
                        System.out.print( disp );
                    }										
                    System.out.println( );
                }
                // 2回目以降
                else {
                    adata = line_buffer.split(",");
                    System.out.print( adata[0] );
                    int count = adata.length;
                    for( int i = 1; i < count; i++) {
                        disp = String.format( " | %s", adata[i] );  
                        System.out.print( disp );
                    }										
                    System.out.println( );

                }
            }

            // 閉じる
            buffer.close();
            charset_stream.close();
            sjis_file.close();

        }
        catch (Exception ex) {
            ex.printStackTrace();
        }

    }

}
