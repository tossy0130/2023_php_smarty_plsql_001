<?php

/*

CREATE TABLE TEST01_USERS (
    id NUMBER(10) PRIMARY KEY,
    name VARCHAR2(255) NOT NULL,
    email VARCHAR2(255) UNIQUE NOT NULL
);

-- シーケンスを作成
CREATE SEQUENCE user_id_seq START WITH 1 INCREMENT BY 1;

-- トリガーを作成してシーケンスを使用
CREATE OR REPLACE TRIGGER users_before_insert
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    SELECT user_id_seq.nextval INTO :new.id FROM dual;
END;
/


*/

/*

-- usersテーブルへのデータ挿入
INSERT INTO TEST01_USERS (id, name, email)
VALUES (user_id_seq.NEXTVAL, 'user_a', 'a@example.com');

INSERT INTO TEST01_USERS (id, name, email)
VALUES (user_id_seq.NEXTVAL, 'user_b', 'b@example.com');

INSERT INTO TEST01_USERS (id, name, email)
VALUES (user_id_seq.NEXTVAL, 'user_c', 'c@example.com');

INSERT INTO TEST01_USERS (id, name, email)
VALUES (user_id_seq.NEXTVAL, 'user_d', 'd@example.com');


*/

// エラーを出力する
ini_set('display_errors', "On");

require(__DIR__ . '/vendor/autoload.php');
// require_onec( __DIR__ . '/vendor/autoload.php');
//require( __DIR__ . 'vendor/smarty/smarty/libs/Smarty.class.php');


// === oracle接続情報

// (SERVER = DEDICATED)

$tns = "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.254.194)(PORT = 1521))
    (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = ORCL2.WORLD)
    )
)";

$username = "MAEBASI";
$password = "MAEBASI";

// === DB　へ接続
$conn = oci_connect($username, $password, $tns);

// エラー処理
if (!$conn) {
    die("データベースに接続できません。");
}


// PL/SQLプロシージャを呼び出す
// $query = "BEGIN GET_TABLE_LIST(:p1); END;";
$query = 'BEGIN GET_TABLE_LIST_02(:p1); END;';

$stmt = oci_parse($conn, $query);

// OUTパラメータのバインディング
$r_str = ""; // OUTパラメータの初期化
oci_bind_by_name($stmt, ':p1', $r_str, 4000); // 4000はVARCHAR2の最大サイズを示す値。適宜変更してください。

oci_execute($stmt);

// OUTパラメータの値を出力
echo "プロシージャの出力: " . $r_str;
// データベース接続を閉じる
oci_close($conn);


$smarty = new Smarty();

$smarty->template_dir = __DIR__ . '/templates/';
$smarty->compile_dir = __DIR__ . '/templates_c';

$smarty->assign('title', 'Smarty Go!!!');
$smarty->assign('class', 'red');
$smarty->assign('name', 'Taro');

// $smarty->assign('users', $users);

$smarty->escape_html = true;

$smarty->display('index.tpl');
