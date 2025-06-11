<?php
    $pdo = new PDO(
        'mysql:host=mysql322.phy.lolipop.lan;
        dbname=LAA1553892-kadai01;charset=utf8',
        'LAA1553892',
        '0730'
    );
    $userId = 1;

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->execute([$userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $row ? $row['username'] : '';
    $password = $row ? $row['password'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン画面</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="check.php" method="POST">
        <p>ユーザー名：<input type="text" name="username" 
                      value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" required></p>
        <p>パスワード：<input type="password" name="password" 
                      value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?>" required></p>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>