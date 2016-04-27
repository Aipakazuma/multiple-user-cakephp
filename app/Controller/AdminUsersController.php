<?php
App::uses('AppController', 'Controller');

/**
 * AdminUsers Controller
 *
 * @property AdminUser $AdminUser
 * @property PaginatorComponent $Paginator
 */
class AdminUsersController extends AppController
{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(['login']);
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->AdminUser->recursive = 0;
        $this->set('adminUsers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->AdminUser->exists($id)) {
            throw new NotFoundException(__('Invalid admin user'));
        }
        $options = array('conditions' => array('AdminUser.' . $this->AdminUser->primaryKey => $id));
        $this->set('adminUser', $this->AdminUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->AdminUser->create();
            if ($this->AdminUser->save($this->request->data)) {
                $this->Flash->success(__('The admin user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->AdminUser->exists($id)) {
            throw new NotFoundException(__('Invalid admin user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->AdminUser->save($this->request->data)) {
                $this->Flash->success(__('The admin user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The admin user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('AdminUser.' . $this->AdminUser->primaryKey => $id));
            $this->request->data = $this->AdminUser->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->AdminUser->id = $id;
        if (!$this->AdminUser->exists()) {
            throw new NotFoundException(__('Invalid admin user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->AdminUser->delete()) {
            $this->Flash->success(__('The admin user has been deleted.'));
        } else {
            $this->Flash->error(__('The admin user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * @return \Cake\Network\Response|null
     */
    public function admin_login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or password is incorrect'));
        }
    }

    /**
     * @return \Cake\Network\Response|null
     */
    public function admin_logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
