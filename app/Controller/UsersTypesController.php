<?php
App::uses('AppController', 'Controller');
/**
 * UsersTypes Controller
 *
 * @property UsersType $UsersType
 * @property PaginatorComponent $Paginator
 */
class UsersTypesController extends AppController {

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
	public function index() {
		$this->UsersType->recursive = 0;
		$this->set('usersTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsersType->exists($id)) {
			throw new NotFoundException(__('Invalid users type'));
		}
		$options = array('conditions' => array('UsersType.' . $this->UsersType->primaryKey => $id));
		$this->set('usersType', $this->UsersType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersType->create();
			if ($this->UsersType->save($this->request->data)) {
				$this->Flash->success(__('The users type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users type could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->UsersType->exists($id)) {
			throw new NotFoundException(__('Invalid users type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersType->save($this->request->data)) {
				$this->Flash->success(__('The users type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The users type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersType.' . $this->UsersType->primaryKey => $id));
			$this->request->data = $this->UsersType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UsersType->id = $id;
		if (!$this->UsersType->exists()) {
			throw new NotFoundException(__('Invalid users type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UsersType->delete()) {
			$this->Flash->success(__('The users type has been deleted.'));
		} else {
			$this->Flash->error(__('The users type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
