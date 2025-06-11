<?php
$pdo = new PDO(
        'mysql:host=mysql322.phy.lolipop.lan;
        dbname=LAA1553892-kadai01;charset=utf8',
        'LAA1553892',
        '0730'
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
    $created_at = date('Y-m-d H:i:s');

    if (trim($comment) === '') {
    header("Location: form.php");
    exit;
}

    $stmt = $pdo->prepare("INSERT INTO comment (user_id,content,created_at) VALUES (:user_id, :comment, :created_at)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->execute();



$entry = "$created_at\t$name\t$comment\n";
file_put_contents('comments.txt', $entry, FILE_APPEND);
header("Location: view.php");
exit;
?>
