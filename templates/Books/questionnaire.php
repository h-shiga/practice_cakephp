<?php

/**
 * @var \App\View\AppView $this
 * @var object $questions
 */
?>

<html>

<body>
    <header id="title">
        <h1>アンケート内容</h1>
        <?= $this->Html->link('本一覧画面へ', ['action' => 'index']) ?>
    </header>
    <div class="content">
        <table>
            <?= $this->Html->tableHeaders(['ID', '読んだ本', '感想', '読んだことがあるか', '性別', 'ほかに読んだことがある作品', '操作']) ?>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?= $question->id ?></td>
                    <td><?= $question->book_name ?></td>
                    <td><?= $question->impression ?></td>
                    <td><?= $question->is_read == 1 ? 'はい' : 'いいえ' ?></td>
                    <td><?= $question->answerer_gender_code == 'M' ? '男性' : '女性' ?></td>
                    <td><?= $question->know_trigger ?></td>
                    <td>
                        <?= $this->Form->postLink('削除', ['action' => 'delete', $question->id], ['confirm' => 'よろしいですか?']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>