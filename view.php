<!DOCTYPE html>
<html lang="ja">
<head>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <title>掲示板 v02</title>
    

</head>

<body>
    <h3 class="alert alert-primary">掲示板</h3>
    <div id="content"
        class="m-4">
        <form action=""
            method="POST">
            <div>
                <span style='display:inline-block;width:100px;'>
                    メッセージ
                </span>
                <input
                    type="text"
                    name="message"
                    value="<?= $_POST["message"] ?>"
                    >
                <input
                    type="submit"
                    name="send"
                    value="投稿"
                    >
            </div>
            <div>
                <span style='display:inline-block;width:100px;'>
                    投稿者
                </span>
                <input
                    type="text"
                    name="user"
                    value="<?= $_POST["user"] ?>"
                    >
            </div>

        </form>



        <h5 class="m-4 alert alert-primary" style='width:200px;text-align:center'>投稿一覧 (<?= $kensu ?>件)</h5>
        <ul>
            <?= $line_data ?>
        </ul>

    </div>
</body>
</html>
