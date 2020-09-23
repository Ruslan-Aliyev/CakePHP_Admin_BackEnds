<div class="administrations view">
<h2><?php echo __('Administration'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field1'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['field1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field2'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['field2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($administration['Administration']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Administration'), array('action' => 'edit', $administration['Administration']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Administration'), array('action' => 'delete', $administration['Administration']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $administration['Administration']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Administrations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Administration'), array('action' => 'add')); ?> </li>
	</ul>
</div>
