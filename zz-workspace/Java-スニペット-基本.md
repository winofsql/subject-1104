# Java スニペット 基本

## 1. *class* 
```java
public class Main {
    // クラス名はファイル名から自動作成
}
```
## 2. *ctor*
   - クラス内でコンストラクタを作成
```java
public Main() {
    super();
}
```

## 3. *main*
   - エントリポイントの作成
```java
public static void main(String[] args) {
    
}
```

## 4. *public_method* 
   - 公開インスタンスメソッドの作成
```java
public void name() {
    
}
```
   - ( private_method : 非公開メソッド)


## 5. *public_static_method*
   - 公開クラスメソッドの作成
```java
public static void name() {
    
}
```
   - ( private_static method : 非公開メソッド)

## 6. *sysout*
   - コンソール出力
```java
System.out.println();
```

## 7. *fori*
   - for 構文
```java
for (int i = 0; i < args.length; i++) {
    
}
```

## 8. *foreach*
   - 拡張for 構文
```java
for (String string : args) {
    
}
```

## 9. *while*
   - while 構文
```java
while (condition) {
    value
}
```

## 10. *switch*
   - switch 構文
```java
switch (key) {
    case value:
        
        break;

    default:
        break;
}
```

## 11. *if*
   - if 構文
```java
if (condition) {
    
}
```

## 12. *ifelse*
   - if else 構文
```java
if (condition) {
    
} else {
    
}
```

## 12. *try_catch*
   - try ～ catch 構文
```java
try {
    
} catch (Exception e) {
    //TODO: handle exception
}
```


## 定義場所
```
extensions\redhat.java-n.nn.n\snippets
```