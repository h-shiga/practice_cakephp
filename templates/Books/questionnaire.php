<h1>アンケート</h1>
<?= $this->Form->create($questionnaires) ?>
<?= $this->Form->control('感想', ['name' => 'impression',]) ?>
<?= $this->Form->control('読んだことはありますか？', ['name' => 'is_read', 'type' => 'radio', 'options' => $isRead]) ?>
<?= $this->Form->control('あなたの性別', ['name' => 'answerer_gender_code', 'type' => 'select', 'options' => $genders]) ?>
<?= $this->Form->control('他に読んだことがある夏目漱石の作品は？', ['name' => 'know_trigger', 'type' => 'select', 'options' => $bookName]) ?>
<?= $this->Form->submit('アンケートを送信') ?>
<?= $this->Form->end() ?>