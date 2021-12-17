<?php
require_once __DIR__ . '/functions.php';

//初期化
$name = '';
$japanese = '';
$mathematics = '';
$science = '';
$social_studies = '';
$english = '';
//エラーチェック用の配列
$errors = [];

//リクエストメソッドの判定
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //フォームに入力されたデータの受け取り
    $name = filter_input(INPUT_POST, 'name');
    $japanese = filter_input(INPUT_POST, 'japanese');
    $mathematics = filter_input(INPUT_POST, 'mathematics');
    $science = filter_input(INPUT_POST, 'science');
    $social_studies = filter_input(INPUT_POST, 'social_studies');
    $english = filter_input(INPUT_POST, 'english');

    //バリデーション
    if ($name == '') {
        $errors[] = '氏名を入力して下さい';
    }
    if ($japanese == '') {
        $errors[] = '国語の点数を入力してください';
    }
    if ($mathematics == '') {
        $errors[] = '数学の点数を入力してください';
    }
    if ($science == '') {
        $errors[] = '理科の点数を入力してください';
    }
    if ($social_studies == '') {
        $errors[] = '社会の点数を入力してください';
    }
    if ($english == '') {
        $errors[] = '英語の点数を入力してください';
    }
    if (empty($errors)) {
        header('Location: result.html');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="stylesheet" href="style.css">
    <title>五教科テスト点数入力</title>
</head>

<body>
    <div class="wrapper">
        <h1 class="title">五教科テスト点数入力</h1>
        <?php if ($errors) : ?>
            <ul class="errors">
                <?php foreach ($errors as $error) : ?>
                    <li><?= h($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">氏名 <span class="required">(必須)<span></label>
                <input type="text" min="0" max="100" name="name" id="name" value="<?= h($name) ?>">
            </div>
            <div class="form-group">
                <label for="japanese">国語 <span class="required">(必須)<span></label>
                <input type="number" min="0" max="100" name="japanese" id="japanese" value="<?= h($japanese) ?>">点
            </div>
            <div class="form-group">
                <label for="mathematics">数学 <span class="required">(必須)<span></label>
                <input type="number" min="0" max="100" name="mathematics" id="mathematics" value="<?= h($mathematics) ?>">点
            </div>
            <div class="form-group">
                <label for="science">理科 <span class="required">(必須)<span></label>
                <input type="number" min="0" max="100" name="science" id="science" value="<?= h($science) ?>">点
            </div>
            <div class="form-group">
                <label for="social_studies">社会 <span class="required">(必須)<span></label>
                <input type="number" min="0" max="100" name="social_studies" id="social_studies" value="<?= h($social_studies) ?>">点
            </div>
            <div class="form-group">
                <label for="english">英語 <span class="required">(必須)<span></label>
                <input type="number" min="0" max="100" name="english" id="english" value="<?= h($english) ?>">点
            </div>
            <input type="submit" value="送信" class="submit_btn" onclick="rest(this.form)">
        </form>
    </div>
</body>

</html>