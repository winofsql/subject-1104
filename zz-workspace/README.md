# Subject ワークスペース用テンプレート

## 環境 => https://github.com/winofsql/vscode-template
ワークスペース テンプレート

## ZIP をダウンロードして設定
#### 1 : subject-main.zip としてダウンロード

#### 2 : [7Zip](https://sevenzip.osdn.jp/) で解凍

#### 3 : -main を -9999 フォーマットで当日日付に変更

#### 4 : VSCode で フォルダとして中の zz-workspace-vbs フォルダを開く

#### 5 : Run Terminal Command で 設定から 『基本設定』 を実行

#### 6 : Run Terminal Command で 設定から 『ワークスペース作成』 を実行

#### 7 : フォルダで開いた VSCode を閉じる

#### 8 : lightbox.code-workspace を エクスプローラから実行

#### 9 : zz-workspace-vbs フォルダと同じところに、言語用フォルダ( ※1 )を作成

#### 10 : Run Terminal Command で 設定から 『ワークスペース作成』 を実行

![image](https://user-images.githubusercontent.com/1501327/134792059-fea2d3a3-c180-4246-bc03-5f3a6814adaf.png)

拡張を指定フォルダに保存している場合は、vscode.bat を作成して **『その他のアプリ』** から選択
```
"D:\app2\Microsoft VS Code\Code.exe" --extensions-dir="D:\app2\vscode\extensions" %1
```

\
\
**※1 ▼ 以下の文字列を含むフォルダ**
```
java
cs
js
hta
php
ps
py
sql
vbs
wsh
```
※ cs で フォームがある場合は、form という文字列を含める

## Java 用ライブラリをユーザ設定に定義
```javascript
"java.project.referencedLibraries": [
    "lib/**/*.jar",
    "\\app\\workspace\\lib\\mysql-connector-java-8.0.26.jar",
    "\\app\\workspace\\lib\\gson-2.8.8.jar",
    "\\app\\workspace\\lib\\javax.mail.jar",
    "\\app\\workspace\\lib\\javax.activation-1.2.0.jar",
    "\\app\\workspace\\lib\\poi-5.0.0.jar",
    "\\app\\workspace\\lib\\commons-collections4-4.4.jar",
    "\\app\\workspace\\lib\\xmlbeans-4.0.0.jar",
    "\\app\\workspace\\lib\\poi-ooxml-full-5.0.0.jar",
    "\\app\\workspace\\lib\\poi-ooxml-5.0.0.jar",
    "\\app\\workspace\\lib\\commons-compress-1.20.jar",
    "\\app\\workspace\\lib\\pdfbox-app-2.0.24.jar",
    "\\app\\workspace\\lib\\ucanaccess-5.0.1.jar",
    "\\app\\workspace\\lib\\commons-lang3-3.8.1.jar",
    "\\app\\workspace\\lib\\commons-logging-1.2.jar",
    "\\app\\workspace\\lib\\hsqldb-2.5.0.jar",
    "\\app\\workspace\\lib\\jackcess-3.0.1.jar",
]    
```

## Git
[ダウンロード](https://git-scm.com/)
