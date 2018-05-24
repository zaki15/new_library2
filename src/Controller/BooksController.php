<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
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
            'contain' => ['Categories', 'Publishers']
        ];
        $books = $this->paginate($this->Books);

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Categories', 'Publishers', 'Bookstates', 'Reservations']
        ]);

        $this->set('book', $book);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->saveAll($book)) {
                $this->Flash->success(__('The book has been saveAlld.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saveAlld. Please, try again.'));
        }
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $publishers = $this->Books->Publishers->find('list', ['limit' => 200]);
        $bookstates = $this->Books->Bookstates->find('list', ['limit' => 200]);
        $this->set(compact('book', 'categories', 'publishers','bookstates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->saveAll($book)) {
                $this->Flash->success(__('The book has been saveAlld.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saveAlld. Please, try again.'));
        }
        $categories = $this->Books->Categories->find('list', ['limit' => 200]);
        $publishers = $this->Books->Publishers->find('list', ['limit' => 200]);
        $this->set(compact('book', 'categories', 'publishers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function search()
    {
        if ($this->request->isPost()){
          $find = $this->request->data['Books']['find'];
          $condition = ['conditions'=>['id'=>$find]];
          $data = $this->Books->find('all')->contain('Bookstates')->toArray();
          $categories = $this->Books->Categories->find('all')->toArray();
          $publishers = $this->Books->Publishers->find('all')->toArray();
        }else {
          $data = $this->Books->find('all')->contain('Bookstates')->toArray();
          $categories = $this->Books->Categories->find('all')->toArray();
          $publishers = $this->Books->Publishers->find('all')->toArray();
        }
        $this->set('books',$data,$categories,$publishers);


    }

}
