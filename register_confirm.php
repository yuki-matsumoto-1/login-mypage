<?php
mb_internal_encoding("utf8");

// 仮保存されたファイル名で画像ファイルを取得(サーバーへ仮アップロードされたディレクトリとファイル名)
$temp_pic_name = $_FILES['picture']['tmp_name'];

// 元のファイル名で画像ファイルを取得。事前に画像を格納する「image」という名前のフォルダを作成しておく必要あり
$original_pic_name=$_FILES['picture']['name'];
$path_filename='./image/'.$original_pic_name;

// 仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
$_POST['picture']=$path_filename;
$textarea=$_POST['comments']

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" href="register_confirm.css">
    </head>
        <body>
            <header>
                <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
            </header>
            <main>
            <!-- このbodyの中に、マイページとして表示する部分を記述していく (HTMLとPOSTで記述) -->
            <div class="form_contents">
                <div class="nakami">
                    <h2>会員登録 確認</h2>
                    <p class="torokaku">こちらの内容で登録してもよろしいでしょうか？</p>
                    <div class="name">
                        <label>氏名：<?php echo $_POST['name']; ?></label>
                    </div>
                    <div class="mail">
                        <label>メール：<?php echo $_POST['mail']; ?></label>
                    </div>
                    <div class="password">
                        <label>パスワード：<?php echo $_POST['password']; ?></label>
                    </div>
                    <div class="picture">
                        <label>プロフィール写真：<?php echo $_FILES['picture']['name']; ?></label>
                    </div>
                    <div>
                        <label class="comments">コメント：<?php echo nl2br(htmlspecialchars($textarea)); ?></label>
                    </div>
                    <div class="button">
                        <form action="register.php" method="post" class="back">
                            <input type="submit" class="back_button" value="戻って修正する" />
                        </form>
                        <form action="register_insert.php" method="post" class="toroku">
                            <input type="submit" class="submit_button"  value="登録する" />
                            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                            <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
                            <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
                            <input type="hidden" name="picture" value="<?php echo $_POST['picture']; ?>">
                            <input type="hidden" name="comments" value="<?php echo $_POST['comments']; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </main>


    <footer>
        ©︎2018 InterNous.inc. Allrights reserved
    </footer>

        </body>
    </html>
