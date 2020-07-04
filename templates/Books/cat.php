<?php

/**
 * @var \App\View\AppView $this
 * @var array $books
 * @var array $before
 * @var array $after
 * @var array $genders
 * @var object $bookIntroductions
 */

?>

<html>

<body>
    <header id="title">
        <h1>作品紹介</h1>
    </header>
    <div class="content">
        <div class="content-cohesive" id="introduction">
            <h2><?= $bookIntroductions->name ?></h2>
            <h3><?= preg_replace($before, $after, $bookIntroductions->book_begin_texts[0]->begin_text, 1) ?></h3>
        </div>
        <div class="content-cohesive" id="information">
            <table class="content-table">
                <h3>情報</h3>
                <?= $this->Html->tableHeaders(['区分', '内容'], ['class' => 'content-table-information']),
                    $this->Html->tableCells([
                        ['著者', $bookIntroductions->creator->name],
                        ['発行年月日', $bookIntroductions->publication_date->i18nFormat()],
                        ['発行元', '服部書店'],
                        ['ジャンル', $bookIntroductions->book_category->name],
                        ['国', $bookIntroductions->country->name],
                        ['言語', $bookIntroductions->country->name . '語'],
                    ]) ?>
            </table>
            <h4>登場人物</h4>
            <div>
                <ul class="character">
                    <?php foreach ($bookIntroductions->book_characters as $book) : ?>
                        <?= $book->name ?>
                    <?php endforeach; ?>
                </ul>
                <?= $this->Html->link('青空文庫', 'https://www.aozora.gr.jp/cards/000148/files/789_14547.html') ?>
            </div>
        </div>
        <div class="content-cohesive" id="cover">
            <h3>表紙</h3>
            <?= $this->Html->image('book-cover-' . $bookIntroductions->id . '.jpg'); ?>
        </div>
        <div class="content-cohesive" id="questionnaire">
            <h3>アンケート</h3>
            <?= $this->Html->link('アンケート画面へ', '/books/questionnaire') ?>
        </div>
    </div>

    <?= $this->Html->link('本一覧画面へ', '/books') ?>

</html>