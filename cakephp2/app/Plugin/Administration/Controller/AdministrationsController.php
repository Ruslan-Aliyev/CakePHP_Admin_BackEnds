<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Administrations Controller
 *
 * @property Administration $Administration
 * @property PaginatorComponent $Paginator
 */
class AdministrationsController extends AdministrationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Administration->recursive = 0;
		$this->set('administrations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Administration->exists($id)) {
			throw new NotFoundException(__('Invalid administration'));
		}
		$options = array('conditions' => array('Administration.' . $this->Administration->primaryKey => $id));
		$this->set('administration', $this->Administration->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Administration->create();
			if ($this->Administration->save($this->request->data)) {
				$this->Flash->success(__('The administration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The administration could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Administration->exists($id)) {
			throw new NotFoundException(__('Invalid administration'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Administration->save($this->request->data)) {
				$this->Flash->success(__('The administration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The administration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Administration.' . $this->Administration->primaryKey => $id));
			$this->request->data = $this->Administration->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->Administration->exists($id)) {
			throw new NotFoundException(__('Invalid administration'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Administration->delete($id)) {
			$this->Flash->success(__('The administration has been deleted.'));
		} else {
			$this->Flash->error(__('The administration could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
