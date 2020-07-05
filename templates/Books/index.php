<?php

/**
 * @var \App\View\AppView $this
 * @var array $books
 */

?>
<?= $this->Html->script('jquery-3.5.1.min.js') ?>
<?= $this->Html->script('jquery-cakephp.js') ?>

<html>

<body>
    <header id="title">
        <h1>本一覧画面</h1>
    </header>
    <?= $this->Html->link('本の登録', ['action' => 'add']) ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('検索（タイトルまたは発行日）', ['name' => 'find', 'placeholder' => 'このまま検索すると全て表示されます。']); ?>
        <?= $this->Form->button('検索') ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <div class="content">
        <table>
            <?= $this->Html->tableHeaders(['ID', 'タイトル', '作者', '発行日(年/月/日)', '操作']) ?>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= $this->Number->format($book->id) ?></td>
                    <td><?= $this->Html->link($book->name, '/books/' . $book->e_name) ?></td>
                    <td><?= $book->creator->name ?></td>
                    <td><?= $book->publication_date->i18nFormat('YYYY/MM/dd') ?></td>
                    <td>
                        <?= $this->Html->link('編集', ['action' => 'edit', $book->id]) ?>
                        <?= $this->Form->postLink(
                            '削除',
                            ['action' => 'delete', $book->id],
                            ['confirm' => 'よろしいですか?']
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?= $this->Html->link('アンケート一覧画面', ['action' => 'questionnaire']) ?>
    </div>
</body>

</html>