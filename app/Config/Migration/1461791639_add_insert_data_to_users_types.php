<?php

class AddInsertDataToUsersTypes extends CakeMigration
{

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'add_insert_data_to_users_types';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_field' => array(
                'users_types' => array(),
            ),
        ),
        'down' => array(
            'drop_field' => array(
                'users_types' => array(),
            ),
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function before($direction)
    {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction)
    {
        $usersTypes = ClassRegistry::init('UsersTypes');
        $usersTypes->save([
            [
                'users_type_name' => '管理者',
                'priority' => 0
            ],
            [
                'users_type_name' => '通常ユーザー',
                'priority' => 1
            ]
        ]);
        return true;
    }
}
