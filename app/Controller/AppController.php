<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = [
        'Flash',
        'Auth' => [
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login'
            ],
            'authError' => 'ユーザー名、パスワードを間違えています。',
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => 'Blowfish',
                    'userModel' => 'User',
                    'fields' => [
                        'username' => 'email'
                    ]
                ]
            ]
        ]
    ];

    public function beforeFilter()
    {
        if (isset($this->params['prefix']) && $this->params['prefix'] === 'admin') {
            $this->layout = 'admin';
            $this->_setAdminAuthParameter();
        }
        parent::beforeFilter();
    }

    private function _setAdminAuthParameter() {
        $this->Auth->authenticate = [
            'Form' => [
                'userModel' => 'AdminUser',
                'passwordHasher' => 'Blowfish',
                'fields' => [
                    'username' => 'email'
                ]
            ]
        ];
        $this->Auth->loginAction = [
            'controller' => 'users',
            'action' => 'admin_login',
            'admin' => true
        ];
        $this->Auth->loginRedirect = [
            'controller' => 'admin_users',
            'action' => 'admin_index',
            'admin' => true
        ];
        $this->Auth->logoutRedirect = [
            'controller' => 'users',
            'action' => 'admin_login',
            'admin' => true
        ];
        AuthComponent::$sessionKey = "Auth.Owner";
    }
}
