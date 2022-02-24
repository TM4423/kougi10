<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/bootstrap.min.css" rel='stylesheet'>
    <style>div{padding: 10px;font-size:16px;}</style>
    <title>ログイン</title>
</head>
<body>
    
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">おすすめ本データベース</a>
            </div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form action="login_act.php" method="post">
    <div class="jumbotron">
        <fieldset>
            <legend>IDとPasswordを、入力してください</legend>
            <label>ID：<input type="text" name="lid"></label><br>
            <label>PW：<input type="text" name="lpw"></label><br>
            <input type="submit" value="ログイン">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->

</body>
</html>