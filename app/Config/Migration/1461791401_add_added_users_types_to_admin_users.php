<?php
class AddAddedUsersTypesToAdminUsers extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_added_users_types_to_admin_users';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'admin_users' => array(
					'users_types_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'after' => 'password'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'admin_users' => array('users_types_id'),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
