<?php
// セッション開始
session_start();
$db['host'] = "";  // DBサーバのURL
$db['user'] = "";  // ユーザー名
$db['pass'] = "";  // ユーザー名のパスワード
$db['dbname'] = "";  // データベース名

// エラーメッセージの初期化
$errorMessage = "";

echo "database login...<br>";

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <ul>
            <li><a href="Login.php">ログイン画面に戻る</a></li>
        </ul>
    </body>
</html>