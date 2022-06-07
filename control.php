<?php
require_once("setting.php");

header( "Content-Type: text/html; charset=utf-8" );

require_once("model.php");

$dataFile = 'bbs.dat';
$line_data = "";
$kensu = "";

// POST ( FORM からの送信 )
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    write_data();

}

// *************************************
// ファイルの読込み( A )
// テキストファイルを読み込んで行を要素とした配列にする
// *************************************
$posts = @file($dataFile, FILE_IGNORE_NEW_LINES);

// 配列を逆順に変換する( 最後に追加した行が先頭になる )
if ( $posts !== FALSE ) {
    $posts = array_reverse($posts);
}
else {
    // ファイルが無い場合空の配列
    $posts = array();
}

$kensu = count($posts);

// *************************************
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
// 画面
// *************************************
require_once("view.php");


//debug_print();
?>
