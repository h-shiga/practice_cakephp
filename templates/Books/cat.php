<?php

/**
 * @var \App\View\AppView $this
 * @var object $books
 * @var array $before
 * @var array $after
 * @var array $genders
 */

?>

<html>

<body>
    <header id="title">
        <h1>作品紹介</h1>
    </header>
    <div class="content">
        <div class="content-cohesive" id="introduction">
            <h2><?= $books->name ?></h2>
            <h3><?= preg_replace($before, $after, $books->book_begin_text->begin_text, 1) ?></h3>
        </div>
        <div class="content-cohesive" id="information">
            <table class="content-table">
                <h3>情報</h3>
                <?= $this->Html->tableHeaders(['区分', '内容'], ['class' => 'content-table-information']),
                    $this->Html->tableCells([
                        ['著者', $books->creator->name],
                        ['発行年月日', $books->publication_date->i18nFormat()],
                        ['発行元', '服部書店'],
                        ['ジャンル', $books->book_category->name],
                        ['国', $books->country->name],
                        ['言語', $books->country->name . '語'],
                    ]) ?>
            </table>
            <h4>登場人物</h4>
            <div>
                <ul class="character">
                    <?php foreach ($books->book_characters as $character) : ?>
                        <?= $character->name ?>
                    <?php endforeach; ?>
                </ul>
                <?= $this->Html->link('青空文庫', 'https://www.aozora.gr.jp/cards/000148/files/789_14547.html') ?>
            </div>
        </div>
        <div class="content-cohesive" id="cover">
            <h3>表紙</h3>
            <?= $this->Html->image($books->image)?>
        </div>
        <div class="content-cohesive" id="questionnaire">
            <h3>アンケート</h3>
            <?= $this->Form->create($questions) ?>
            <?= $this->Form->control('book_id', ['type' => 'hidden', 'value' => $books->id]) ?>
            <?= $this->Form->control('book_name', ['type' => 'hidden', 'value' => $books->name]) ?>
            <?= $this->Form->control('感想', ['name' => 'impression', 'type' => 'textarea']) ?>
            <?= $this->Form->control('読んだことはありますか？', ['name' => 'is_read', 'type' => 'radio', 'options' => $isRead]) ?>
            <?= $this->Form->control('あなたの性別', ['name' => 'answerer_gender_code', 'type' => 'select', 'options' => $genders]) ?>
            <?= $this->Form->control('他に読んだことがある夏目漱石の作品は？', ['name' => 'know_trigger', 'type' => 'select', 'options' => $bookName]) ?>
            <?= $this->Form->submit('アンケートを送信') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

    <?= $this->Html->link('本一覧画面へ', '/books') ?>

</html>