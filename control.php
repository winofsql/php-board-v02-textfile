<?php
require_once("setting.php");

header( "Content-Type: text/html; charset=utf-8" );

require_once("model.php");

$dataFile = 'bbs.dat';
// 表示データ
$line_data = "";
// 投稿件数(表示用)
$kensu = "";

// MARK:送信処理
// POST ( FORM からの送信 )
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    // 送信時はまず書き込み
    // ( この後で表示されます )
    write_data();

}

// *************************************
// MARK:読み込み
// ファイルの読込み( A )
// テキストファイルを読み込んで行を要素とした配列にする
// ▼ FILE_IGNORE_NEW_LINES
// 配列の各要素の最後の改行を省略します。
// *************************************
$posts = @file($dataFile, FILE_IGNORE_NEW_LINES);

// MARK:逆ソート
// 配列を逆順に変換する( 最後に追加した行が先頭になる )
if ( $posts !== FALSE ) {
    $posts = array_reverse($posts);
}
else {
    // ファイルが無い場合空の配列
    $posts = array();
}

// MARK:投稿件数
$kensu = count($posts);





// *************************************
// MARK:データ作成
// 画面用データの作成( B )
// *************************************
if ( $kensu != 0 ) {
    foreach ($posts as $post) {
        $lines = explode( "\t", $post );

        $message = hsc( $lines[0] );
        $user = hsc( $lines[1] );
        $time_stamp = $lines[2];

        $line_data .= "<li>{$message} {$user} - {$time_stamp}</li>";
    }
}
else {
    $line_data .= '<li>投稿データはありません</li>';
}


// *************************************
// MARK:画面
// *************************************
require_once("view.php");


//debug_print();
?>
