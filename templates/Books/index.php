<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */

$bookFirst = $books->first();
?>

<html>

<body>
    <header id="title">
        <h1>作品紹介</h1>
    </header>
    <div class="content">
        <div class="content-cohesive" id="introduction">
            <h2><?= $bookFirst->name ?></h2>
            <h3><?= preg_replace($before, $after, $bookFirst->book_begin_texts[0]->begin_text, 1) ?></h3>
        </div>
        <div class="content-cohesive" id="information">
            <table class="content-table">
                <h3>情報</h3>
                <?= $this->Html->tableHeaders(['区分', '内容'], ['class' => 'content-table-information']),
                    $this->Html->tableCells([
                        ['著者', $bookFirst->creator->name],

                        ['発行元', '服部書店'],
                        ['ジャンル', $bookFirst->book_category->name],
                        ['国', $bookFirst->country->name],
                        ['言語', $bookFirst->country->name . '語']
                    ]) ?>
            </table>
            <h4>登場人物</h4>
            <div>
                <ul class="character">
                    <?php foreach ($bookFirst->book_characters as $book) : ?>
                        <?= $book->name ?>
                    <?php endforeach; ?></ul>
                <?= $this->Html->link('青空文庫', 'https://www.aozora.gr.jp/cards/000148/files/789_14547.html') ?>
            </div>
        </div>
        <div class="content-cohesive" id="cover">
            <h3>表紙</h3>
            <?= $this->Html->image('book-cover-' . $bookFirst->id . '.jpg'); ?>
        </div>
        <div class="content-cohesive" id="questionnaire">
            <?= $this->Form->create($books, ['url' => ['action' => 'questionnaire']]) ?>
            <h3>アンケート</h3>
            <?= $this->Form->label('感想'), $this->Form->textarea('impression') ?>
            <?= $this->Form->label('読んだことはありますか？'), $this->Form->radio('read_question', ['はい', 'いいえ'], ['value' => 0]) ?>
            <?= $this->Form->label('あなたの性別') ?>
            <select name="sex">
                <?php foreach ($genders as $gender) : ?>
                    <?= '<option value=' . $gender->code . '>' . $gender->name . '</option>'; ?>
                <?php endforeach; ?></select>
            <?= $this->Form->label('他に読んだことがある夏目漱石の作品は？') ?>
            <select name="other_read" multiple size="3">
                <?php foreach ($books as $book) : ?>
                    <?= '<option value = ' . $book->name . '>' . $book->name . '</option>' ?>
                <?php endforeach; ?></select>
            <?= $this->Form->submit('アンケートを送信') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

</html>