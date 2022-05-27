<?php
mb_internal_encoding("utf8");

// セッションスタート
session_start();

// mypage.phpからの導線以外は、『login_error.php』へリダイレクト
if(empty($_POST['from_mypage'])){
    header('Location:./login_error.php');
}

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>
        <body>

        <header>
                <img src="4eachblog_logo.jpg">
                <div class="logout"><a href="log_out.php">ログアウト</a></div>
            </header>
            <main>
            <!-- HTMLとsessionを記述。編集できるように、sessionはvalueに入れる。 -->
            
                <form action="mypage_update.php" method="post">
                    <div class="form_contents">
                        <h2>会員情報</h2>
                        <p>こんにちは！<?php echo $_SESSION['name'] ?>さん</p>
                        <div class="syasin"><img src="<?php echo $_SESSION['picture'] ?>" width="150px" height="150px"></div>
                        
                        <div class="migi">
                            <div class="name">氏名：<input type="text" name="name" value="<?php echo $_SESSION['name']?>"></div>
                            <div class="mail">メール：<input type="text" name="mail" value="<?php echo $_SESSION['mail'] ?>"></div>
                            <div class="password">パスワード：<input type="text" name="password" value="<?php echo $_SESSION['password'] ?>"></div>
                        </div>
                            <div class="comments"><textarea rows="4" cols="45" name="comments"><?php echo $_SESSION['comments'] ?></textarea></div>
                        <div class="button">
                            <input type="submit" class="edit_button" size="35" value="この内容に編集する">
                        </div>
                    </div>
                </form>
            </main>
    <footer>
        ©︎2018 InterNous.inc. Allrights reserved
    </footer>
        </body>
    </html>