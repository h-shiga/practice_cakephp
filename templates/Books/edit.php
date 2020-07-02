<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $book->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books form content">
            <?= $this->Form->create($book) ?>
            <fieldset>
                <legend><?= __('Edit Book') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('book_category_id', ['options' => $bookCategories]);
                    echo $this->Form->control('creator_id', ['options' => $creators]);
                    echo $this->Form->control('publication_date', ['empty' => true]);
                    echo $this->Form->control('country_code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
