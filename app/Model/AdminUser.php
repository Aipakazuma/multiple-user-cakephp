<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * AdminUser Model
 *
 */
class AdminUser extends AppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            ),
        ),
        'password' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            ),
        ),
    );

    /**
     * @param array $options
     * @return bool
     */
    public function beforeSave($options = []) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
