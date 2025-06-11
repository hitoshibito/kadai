<?php
session_start();
if ($_SESSION['admin_login'] == false) {
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
$user_name = $_SESSION['username'];

$stmt = $pdo->prepare("SELECT C.content, C.created_at, U.username FROM comment AS C INNER JOIN user AS U ON C.user_id = U.id");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>📜 投稿一覧</h1>
    <p><a href="form.php">← 投稿フォームへ戻る</a></p>
    <hr>
    <?php
    $filename = 'comments.txt';
    if (!empty($filename)) {
        foreach ($results as $result) {
            echo "<div class='post'>";
            echo "<p><strong>".$result['username']."</strong> さん (".$result['created_at'].")</p>";
            echo "<p>" . nl2br($result['content']) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>まだ投稿がありません。</p>";
    }
    ?>
</body>

</html>