<div class="usersTypes view">
<h2><?php echo __('Users Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersType['UsersType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users Type Name'); ?></dt>
		<dd>
			<?php echo h($usersType['UsersType']['users_type_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($usersType['UsersType']['priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usersType['UsersType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usersType['UsersType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Type'), array('action' => 'edit', $usersType['UsersType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Type'), array('action' => 'delete', $usersType['UsersType']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersType['UsersType']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
