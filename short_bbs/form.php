<?php
       session_start();
       if($_SESSION['admin_login'] == false){
           header("Location:./login.php");
           exit;
      }

      $pdo = new PDO(
        'mysql:host=mysql322.phy.lolipop.lan;
        dbname=LAA1553892-kadai01;charset=utf8',
        'LAA1553892',
        '0730'
    );

    // usernameを取得
    $user_name=$_SESSION['username'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $user_name, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>💬 一言掲示板</h1>
    <?php
    foreach ($results as $row) {
        echo '<p>ようこそ、'.$row['username'].'さん</p>';
    }
    ?>
    <form action="post.php" method="post">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($row['id']) ?>">
        <input type="hidden" name="name" value="<?= htmlspecialchars($row['username']) ?>"></p>
        <p>コメント：<br>
        <textarea name="comment" rows="4" cols="40" required></textarea></p>
        <p><button type="submit">投稿する</button></p>
    </form>
    <p><a href="view.php">▶ 投稿一覧を見る</a></p>
    <p><a href="logout.php">ログアウト</a></p>
</body>
</html>
