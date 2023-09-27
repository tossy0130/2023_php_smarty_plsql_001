<?php

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
$query = "BEGIN GET_TABLE_LIST_03(:id, :name, :email); END;";
$stmt = oci_parse($conn, $query);

// OUTパラメータのバインディング
oci_bind_by_name($stmt, ':id', $id, 4000); // 4000はVARCHAR2の最大サイズを示す値。適宜変更してください。
oci_bind_by_name($stmt, ':name', $name, 4000); // 同様にサイズを調整
oci_bind_by_name($stmt, ':email', $email, 4000); // 同様にサイズを調整

oci_execute($stmt);


$idx = 0;
// プロシージャの出力をPHPで処理して出力
while ($id != null && $name != null && $email != null) {
    echo "ID: " . $id . ", NAME: " . $name . ", EMAIL: " . $email . "<br>";

    // === とりあえず 無限ループ対策
    if ($idx >= 10) {
        break;
    }

    oci_execute($stmt); // 次の行を取得するために再度実行

    $idx = $idx + 1;
}

// データベース接続を閉じる
oci_close($conn);
