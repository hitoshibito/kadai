<?php
session_start();
    $pdo = new PDO(
        'mysql:host=mysql322.phy.lolipop.lan;
        dbname=LAA1553892-kadai01;charset=utf8',
        'LAA1553892',
        '0730'
    );
        $sid = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8') : '';
        $password = isset($_POST['password'])? htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'): '';
        $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ? and password = ?");
        $stmt->execute([$sid, $password]);

        if ($sid == '') {
            header("Location:./login.php");
            exit;
        }
        if ($password == '') {
            header("Location:./login.php");
            exit;
        }

        if ($stmt->rowCount()>0) {
            //ログイン許可
            // IDを取得
            $_SESSION['id']=$_POST['id'];
            $_SESSION['admin_login'] = true;
            header("Location:./form.php");
        } else {
            //間違っているのでログイン不可
            header("Location:./login.php");
            exit;
        }
?>