<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>
<div class="books index content">
    <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Books') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('book_category_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('publication_date') ?></th>
                    <th><?= $this->Paginator->sort('country_code') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?= $this->Number->format($book->id) ?></td>
                        <td><?= h($book->name) ?></td>
                        <td><?= $book->has('book_category') ? $this->Html->link($book->book_category->name, ['controller' => 'BookCategories', 'action' => 'view', $book->book_category->id]) : '' ?></td>
                        <td><?= $book->has('creator') ? $this->Html->link($book->creator->name, ['controller' => 'Creators', 'action' => 'view', $book->creator->id]) : '' ?></td>
                        <td><?= h($book->publication_date) ?></td>
                        <td><?= h($book->country_code) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>