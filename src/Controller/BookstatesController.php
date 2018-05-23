<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookstates Controller
 *
 * @property \App\Model\Table\BookstatesTable $Bookstates
 *
 * @method \App\Model\Entity\Bookstate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookstatesController extends AppController
{
  public function initialize(){
    $this->viewBuilder()->setLayout('main');
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadModel('Books');
    $this->loadModel('Publishers');
    $this->loadModel('Categories');

  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Books']
        ];
        $bookstates = $this->paginate($this->Bookstates);

        $this->set(compact('bookstates'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookstate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookstate = $this->Bookstates->get($id, [
            'contain' => ['Books', 'Rentals', 'Reservations']
        ]);

        $this->set('bookstate', $bookstate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookstate = $this->Bookstates->newEntity();
        if ($this->request->isPost()) {
            $bookstate = $this->Bookstates->patchEntity($bookstate, $this->request->getData());
            if ($this->Bookstates->save($bookstate)) {
                $this->Flash->success(__('The bookstate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookstate could not be saved. Please, try again.'));
        }
        $books = $this->Bookstates->Books->find('list', ['limit' => 200]);
        $this->set(compact('bookstate', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookstate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookstate = $this->Bookstates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookstate = $this->Bookstates->patchEntity($bookstate, $this->request->getData());
            if ($this->Bookstates->save($bookstate)) {
                $this->Flash->success(__('The bookstate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookstate could not be saved. Please, try again.'));
        }
        $books = $this->Bookstates->Books->find('list', ['limit' => 200]);
        $this->set(compact('bookstate', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookstate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookstate = $this->Bookstates->get($id);
        if ($this->Bookstates->delete($bookstate)) {
            $this->Flash->success(__('The bookstate has been deleted.'));
        } else {
            $this->Flash->error(__('The bookstate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        if ($this->request->isPost()){
          $find = $this->request->data['Bookstates']['find'];
          $condition = ['conditions'=>['id'=>$find]];
          $data = $this->Bookstates->find('all')->contain('Books','Publishers','Categories');
        }else {
          $data = $this->Bookstates->find('all')->contain('Books','Publishers','Categories');
        }
        $this->set('bookstates',$data);
    }

}
