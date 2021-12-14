<?php 
//エスケープ処理を行う関数
function h($str)
{
    //ENT_QUOTES:シングルオートとダブルクオートを共に変換する
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>