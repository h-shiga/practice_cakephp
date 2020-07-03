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
    <div class="content">
        <?php foreach ($books as $book) : ?>
            <?= '<div id=' . $book->e_name . '>' ?>
            <?= $this->Html->image('book-cover-' . $book->id . '.jpg', ['url' => ['action' => $book->e_name]]) ?>
            <?= '</div>' ?>
        <?php endforeach; ?>
    </div>
</body>

</html>