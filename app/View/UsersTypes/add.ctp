<div class="usersTypes form">
<?php echo $this->Form->create('UsersType'); ?>
	<fieldset>
		<legend><?php echo __('Add Users Type'); ?></legend>
	<?php
		echo $this->Form->input('users_type_name');
		echo $this->Form->input('priority');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
