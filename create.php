<?php

//【２】phpからMySQLへ接続
//dbconnect.phpを読み込む → DBに接続
include_once('./dbconnect.php');

//新しいレコードを追加するための処理
//【ゴール】新しい家計簿が追加されて、トップに戻る
//【１】画面で入力された値を取得
//【２】phpからMySQLへ接続
//【３】SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//【４】index.phpに画面遷移する



//【１】画面で入力された値を取得
$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];

// $date;
//echo '<br>';
//echo $title;
//echo '<br>';
//echo $amount;
//echo '<br>';
//echo $type;



//【３】SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//INSERT文の作成
$sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUES(:title, :type, :amount, :date, now(),now())";

//作成したSQLを実行できるよう準備
$stmt = $pdo->prepare($sql);

//値の設定
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);

//SQL実行
$stmt->execute();

// index.phpに移行
header('Location: ./index.php');
exit;