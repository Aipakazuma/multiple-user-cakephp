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
                'controller' => 'admin_users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'indexes',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'admin_users',
                'action' => 'login'
            ],
            'authError' => 'ユーザー名、パスワードを間違えています。',
            'authenticate' => [
                'Form' => [
                    'passwordHasher' => 'Blowfish',
                    'userModel' => 'AdminUser',
                    'fields' => [
                        'username' => 'email'
                    ]
                ]
            ]
        ]
    ];
}
