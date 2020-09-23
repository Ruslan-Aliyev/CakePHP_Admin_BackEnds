<div class="administrations form">
<?php echo $this->Form->create('Administration'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Administration'); ?></legend>
	<?php
		echo $this->Form->input('field1');
		echo $this->Form->input('field2');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Administrations'), array('action' => 'index')); ?></li>
	</ul>
</div>
