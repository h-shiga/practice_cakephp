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
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books view content">
            <h3><?= h($book->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($book->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Book Category') ?></th>
                    <td><?= $book->has('book_category') ? $this->Html->link($book->book_category->name, ['controller' => 'BookCategories', 'action' => 'view', $book->book_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $book->has('creator') ? $this->Html->link($book->creator->name, ['controller' => 'Creators', 'action' => 'view', $book->creator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Country Code') ?></th>
                    <td><?= h($book->country_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($book->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Publication Date') ?></th>
                    <td><?= h($book->publication_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Book Begin Texts') ?></h4>
                <?php if (!empty($book->book_begin_texts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Book Id') ?></th>
                            <th><?= __('Begin Text') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->book_begin_texts as $bookBeginTexts) : ?>
                        <tr>
                            <td><?= h($bookBeginTexts->id) ?></td>
                            <td><?= h($bookBeginTexts->book_id) ?></td>
                            <td><?= h($bookBeginTexts->begin_text) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'BookBeginTexts', 'action' => 'view', $bookBeginTexts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'BookBeginTexts', 'action' => 'edit', $bookBeginTexts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BookBeginTexts', 'action' => 'delete', $bookBeginTexts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookBeginTexts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Book Characters') ?></h4>
                <?php if (!empty($book->book_characters)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Book Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Role') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->book_characters as $bookCharacters) : ?>
                        <tr>
                            <td><?= h($bookCharacters->id) ?></td>
                            <td><?= h($bookCharacters->book_id) ?></td>
                            <td><?= h($bookCharacters->name) ?></td>
                            <td><?= h($bookCharacters->role) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'BookCharacters', 'action' => 'view', $bookCharacters->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'BookCharacters', 'action' => 'edit', $bookCharacters->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BookCharacters', 'action' => 'delete', $bookCharacters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookCharacters->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Questionaire Read Relational Books') ?></h4>
                <?php if (!empty($book->questionaire_read_relational_books)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Questionaire Id') ?></th>
                            <th><?= __('Book Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->questionaire_read_relational_books as $questionaireReadRelationalBooks) : ?>
                        <tr>
                            <td><?= h($questionaireReadRelationalBooks->id) ?></td>
                            <td><?= h($questionaireReadRelationalBooks->questionaire_id) ?></td>
                            <td><?= h($questionaireReadRelationalBooks->book_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'QuestionaireReadRelationalBooks', 'action' => 'view', $questionaireReadRelationalBooks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'QuestionaireReadRelationalBooks', 'action' => 'edit', $questionaireReadRelationalBooks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionaireReadRelationalBooks', 'action' => 'delete', $questionaireReadRelationalBooks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionaireReadRelationalBooks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
