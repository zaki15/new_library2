<?php
namespace App\Controller;
use App\Controller\AppController;
/**
 * Rentals Controller
 *
 * @property \App\Model\Table\RentalsTable $Rentals
 *
 * @method \App\Model\Entity\Rental[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RentalsController extends AppController
{
  public function initialize(){
    $this->viewBuilder()->setLayout('main');
    $this->loadModel('Users');
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

      if($this->request->is('post')){

        $query = $this->request->data['Rentals']['find'];
        $condition = ['conditions'=>['Users.id'=>$query],'contain'=>['Users']];
        $rentals = $this->Rentals->find('all',$condition);
        //$users = $this->paginate($this->Users);
        $this->set(compact('rentals','users'));
        //echo "<pre>".print_r($this->set(compact('rentals')))."</pre>";
      }else{
        //$condition = ['contain' => ['Bookstates', 'Users', 'Reservations']];
        //$data = $this->Rentals->find('all')->contain('Users');
      }

    }
    public function test(){
      if($this->request->is('post')){

        $query = $this->request->data['Rentals']['find'];

        $user = $this->Users->get($query, [
            'contain' => ['Rentals', 'Reservations']
        ]);/*
        $user = $this->Users->find('all', [
            'conditions'=>['Users.id'=>$query],
            'contain' => ['Rentals', 'Reservations']
        ]);*/
        $this->set('user', $user);


      }else{
        $this->set('user', $user);
        //$condition = ['contain' => ['Bookstates', 'Users', 'Reservations']];
        //$data = $this->Rentals->find('all')->contain('Users');
      }



    }
    /**
     * View method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rental = $this->Rentals->get($id, [
            'contain' => ['Bookstates', 'Users', 'Reservations']
        ]);
        $this->set('rental', $rental);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rental = $this->Rentals->newEntity();
        if ($this->request->is('post')) {
            $rental = $this->Rentals->patchEntity($rental, $this->request->getData());
            if ($this->Rentals->save($rental)) {
                $this->Flash->success(__('貸出が完了しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('貸出に失敗しました。入力し直して下さい。'));
        }
        $bookstates = $this->Rentals->Bookstates->find('list', ['limit' => 200]);
        $users = $this->Rentals->Users->find('list', ['limit' => 200]);
        $reservations = $this->Rentals->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('rental', 'bookstates', 'users', 'reservations'));
    }

    public function search(){
    //下のコード何？
      $this->paginate = [
          'contain' => ['Bookstates', 'Users', 'Reservations']
      ];
      $rentals = $this->paginate($this->Rentals);

      $this->set(compact('rentals'));
    }

    public function returncheck(){
      $this->paginate = [
          'contain' => ['Bookstates', 'Users', 'Reservations']
      ];
      $rentals = $this->paginate($this->Rentals);

      $this->set(compact('rentals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rental = $this->Rentals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rental = $this->Rentals->patchEntity($rental, $this->request->getData());
            if ($this->Rentals->save($rental)) {
                $this->Flash->success(__('The rental has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rental could not be saved. Please, try again.'));
        }
        $bookstates = $this->Rentals->Bookstates->find('list', ['limit' => 200]);
        $users = $this->Rentals->Users->find('list', ['limit' => 200]);
        $reservations = $this->Rentals->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('rental', 'bookstates', 'users', 'reservations'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Rental id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rental = $this->Rentals->get($id);
        if ($this->Rentals->delete($rental)) {
            $this->Flash->success(__('The rental has been deleted.'));
        } else {
            $this->Flash->error(__('The rental could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
