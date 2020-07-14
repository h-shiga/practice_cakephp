<?php

/**
 * @var \App\View\AppView $this
 * @var array $books
 */

?>

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
            <?= $this->Html->tableHeaders(['ID', 'タイトル', '作者', '発行日(月/日/年(19**))', '操作']) ?>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= $this->Number->format($book->id) ?></td>
                    <td><?= $this->Html->link($book->name, '/books/' . $book->e_name) ?></td>
                    <td><?= $book->creator->name ?></td>
                    <td><?= $book->publication_date->i18nFormat() ?></td>
                    <td>
                        <?= $this->Html->link('編集', ['action' => 'edit', $book->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>