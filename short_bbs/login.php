<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="check.php" method="POST">
        <p>ユーザー名：<input type="text" name="username" required></p>
        <p>パスワード：<input type="password" name="password" required></p>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>