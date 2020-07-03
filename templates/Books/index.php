<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */

?>

<html>

<body>
    <header id="title">
        <h1>本一覧画面</h1>
    </header>
    <legend>検索</legend>
    <?= $this->Form->input('name', array('empty' => true)); ?>
    <div class="content">
        <table class="book-table">
            <?= $this->Html->tableHeaders(['ID', 'タイトル', '作者', '発行日'], ['class' => 'content-table-information']) ?>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><?= $this->Html->link($book->name, '/books/' . $book->e_name) ?></td>
                    <td><?= $book->creator->name ?></td>
                    <td><?= $book->publication_date->format('Y-m-d') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>