<?php

/*

テーブル作成

CREATE TABLE TEST01_USERS (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL
);


*/


require( __DIR__ . '/vendor/autoload.php');
// require_onec( __DIR__ . '/vendor/autoload.php');
//require( __DIR__ . 'vendor/smarty/smarty/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = __DIR__ . '/templates/';
$smarty->compile_dir = __DIR__ . '/templates_c';

$smarty->assign('title', 'Smarty Go!!!');
$smarty->assign('class', 'red');
$smarty->assign('name', 'Taro');

$smarty->escape_html = true;

$smarty->display('index.tpl');

?>
