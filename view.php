<!DOCTYPE html>
<html lang="ja">
<?php // MARK:HEAD ?>
<head>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <title>掲示板 v02 TSV</title>

<?php // MARK:SCRIPT ?>
<script>

</script>


</head>

<?php // MARK:BODY ?>
<body>
    <h3 class="alert alert-primary">
        <a href="control.php">掲示板(TSV)</a>
        <a href=".." style="float:right;text-decoration:none;">📂</a>
    </h3>
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
