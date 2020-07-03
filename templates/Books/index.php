<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>

<html>

<body>
    <header id="title">
        <h1>作品紹介</h1>
    </header>
    <div class="content">
        <div class="content-cohesive" id="introduction">
            <h2><?= $books->first()->name ?></h2>
            <h3><?= str_replace($before, $after, $books->first()->book_begin_texts[0]->begin_text) ?></h3>
        </div>
        <div class="content-cohesive" id="information">
            <table class="content-table">
                <h3>情報</h3>
                <thead class="content-table-information">
                    <tr>
                        <th>区分</th>
                        <th>内容</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>著者</td>
                        <td><?= $books->first()->creator->name ?></td>
                    </tr>
                    <tr>
                        <td>発行年月日</td>
                        <td><?= $books->first()->publication_date ?></td>
                    </tr>
                    <tr>
                        <td>発行元</td>
                        <td>服部書店</td>
                    </tr>
                    <tr>
                        <td>ジャンル</td>
                        <td><?= $books->first()->book_category->name ?></td>
                    </tr>
                    <tr>
                        <td>国</td>
                        <td><?= $books->first()->country->name ?></td>
                    </tr>
                    <tr>
                        <td>言語</td>
                        <td><?= $books->first()->country->name ?>語</td>
                    </tr>
                </tbody>
            </table>
            <h4>登場人物</h4>
            <div>
                <ul class="character">
                    <?php foreach ($books->first()->book_characters as $book) : ?>
                        <?= $book->name ?>
                    <?php endforeach; ?></ul>
                <p><a href="https://www.aozora.gr.jp/cards/000148/files/789_14547.html">青空文庫</a></p>
            </div>
        </div>
        <div class="content-cohesive" id="cover">
            <h3>表紙</h3>
            <?= $this->Html->image('book-cover-' . $books->first()->id . '.jpg'); ?>
        </div>
        <div class="content-cohesive" id="questionnaire">
            <form method="POST" action="questionnaire.php">
                <h3>アンケート</h3>
                <p>・感想 </p>
                <textarea name=" impression" rows="8" cols="40"></textarea>
                <p>・読んだことはありますか？</p>
                <input type="radio" name="read_question" value="1" checked="checked">はい
                <input type="radio" name="read_question" value="2">いいえ
                <p>・あなたの性別</p>
                <select name="sex">
                    <?php foreach ($genders as $gender) : ?>
                        <?= '<option value=' . $gender->code . '>' . $gender->name . '</option>'; ?>
                    <?php endforeach; ?></select>
                <p>・他に読んだことがある夏目漱石の作品は？</p>
                <select name="other_read" multiple size="3">
                    <?php foreach ($books as $book) : ?>
                        <?= '<option value = ' . $book->name . '>' . $book->name . '</option>' ?>
                    <?php endforeach; ?></select>
                <p><input type="submit" value="アンケートを送信"></p>
            </form>
        </div>
    </div>

</html>