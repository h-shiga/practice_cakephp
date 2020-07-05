
<?php echo $this->Form->create('Attachment', array('enctype' => 'multipart/form-data')); ?>
<?php echo $this->Form->file('attachment'); ?>
<?php echo $this->Form->submit('アップロード'); ?>
<?php echo $this->Form->end(); ?>