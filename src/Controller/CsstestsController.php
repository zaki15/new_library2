<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class CsstestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize(){
      $this->viewBuilder()->setLayout('csstest_main');
      $this->loadModel('Users');

    }
    public $components = array('Paginator', 'Flash');
    public function index()
    {
      $users = $this->paginate($this->Users);
      $this->Flash->success(__('The user has been saved.'));

      $this->set(compact('users'));


    }


}
