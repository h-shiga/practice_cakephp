<?php

/**
 * @var \App\View\AppView $this
 * @var object $book
 * @var array $bookCategories
 * @var array $creators
 * @var array $countries
 */
?>
<html>

<body>
    <header id="title">
        <h1>本編集画面</h1>
        <?= $this->Html->link('本一覧画面へ', ['action' => 'index']) ?>
    </header>
    <div class="content">
        <div id="book-table" class="books form content content-cohesive">
            <?= $this->Form->create($book, ['type' => 'file']) ?>
            <fieldset>
                <?= $this->Form->control('name'); ?>
                <?= $this->Form->control('book_category_id', ['options' => $bookCategories]); ?>
                <?= $this->Form->control('creator_id', ['options' => $creators]); ?>
                <?= $this->Form->control('publication_date', ['empty' => true]); ?>
                <?= $this->Form->control('country_code', ['options' => $countries]); ?>
                <?= $this->Form->control('english_name', ['name' => 'e_name']) ?>
                <?= $this->Form->control('image', ['type' => 'file']) ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
        <div id="cover" class="content-cohesive">
            <?= $this->Html->image('book-cover-' . $book->id . '.jpg'); ?>
        </div>
    </div>
</body>

</html>