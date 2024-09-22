<?php

// *************************************
// MARK:hsc
// HTML の埋め込みを排除する
// ( 煩雑になるので必要に応じて実装 )
// *************************************
function hsc($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

// *************************************
// MARK:write_data
// データの書き込み
// *************************************
function write_data() {

    global $dataFile;

    $message = trim($_POST["message"]);
    $user = trim($_POST["user"]);

    if ($message !== "") {

        if ( $user == "" ) {
            $user = "匿名で投稿";
        }

        // TSV に出力するので TAB を排除
        // ( TABをスペース化する )
        $message = str_replace("\t", ' ', $message);
        $user = str_replace("\t", ' ', $user);

        $time_stamp = date('Y-m-d H:i:s');

        // TSV データ
        $newData = "{$message}\t{$user}\t{$time_stamp}\n";

        // ファイルに追加書き込み
        $fp = fopen($dataFile, 'a');
        fwrite($fp, $newData);
        fclose($fp);

        //header('Location: control.php');
        //exit;
    }
}


// **************************
// MARK:debug_print
// デバッグ表示
// **************************
function debug_print() {

    print "<pre class=\"m-5\">";
    print_r( $_GET );
    print_r( $_POST );
    print_r( $_SESSION );
    print "</pre>";

}

?>
