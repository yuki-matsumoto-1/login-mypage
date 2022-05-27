<?php
// すでにログイン済みであればマイページへリダイレクトされる
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}

if(isset($_COOKIE['login_keep'])){
    $c_mail=$_COOKIE['mail'];
    $c_pass=$_COOKIE['password'];
}

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="login.css">
    </head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>
    <main>
        <form action="mypage.php" method="post">
            <div class="form_contents">
            
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" value="<?php echo $c_mail;?>" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="formbox" size="40" value="<?php echo $c_pass;?>" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>
                <div class="login_check">
                    <label>
                        <input type="checkbox" value="login_keep" name="login_keep"  
                        <?php 
                            if(isset($_COOKIE["login_keep"])){
                                echo "checked='checked'";
                            }
                        ?>
                        >ログイン状態を保持する
                    </label>
                </div>
                <div class="loguin_button">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
            </div>
        </form>
    </main>
    <footer>
        ©︎2018 InterNous.inc. Allrights reserved
    </footer>
</body>
</html>