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

    // IDを取得
    $user_id=$_SESSION['id'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
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
        <p>名前：<input type="text" name="name" required></p>
        <p>コメント：<br>
        <textarea name="comment" rows="4" cols="40" required></textarea></p>
        <p><button type="submit">投稿する</button></p>
    </form>
    <p><a href="view.php">▶ 投稿一覧を見る</a></p>
    <p><a href="logout.php">ログアウト</a></p>
</body>
</html>
