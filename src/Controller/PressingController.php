<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*
* @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/

class PressingController extends AppController
{
  /**
  * Index method
  *
  * @return \Cake\Http\Response|void
  */
  public function initialize(){
    $this->viewBuilder()->setLayout('main');
    $this->loadModel('Rentals');
    $this->loadModel('Users');
    $this->loadModel('Books');
    $this->loadModel('Bookstates');
    $this->loadComponent('Paginator');
  }


  public function index(){
    /*$this->paginate = [
      'contain' => ['Bookstates', 'Users', 'Reservations']
    ];*/

    $data = $this->Rentals->find('all')->contain(['Users','Bookstates','Bookstates' => ['Books']]);
    $delay10 = array();
    $delay30 = array();
    foreach ($data as $rental) {
      $result = $this->delay_check($rental->id);
      if($result['delay'] && $result['state'] == '10日延滞中'){
        array_push($delay10,$rental);   //10日以上延滞している人の配列
      }elseif ($result['delay'] && $result['state'] == '30日延滞中') {
        array_push($delay30,$rental);   //30日以上延滞している人の配列
      }
    }
    $this->set('delay10', $delay10);
    $this->set('delay30', $delay30);
   }

  private function delay_check($rental_id){ //rentals_idより延滞判定 返り値 連想配列 delay=>boolean diff_days=>返却期限との差
    $limit_date = $this->Rentals->get($rental_id)->limit_date;
    $mail_limit = $limit_date->modify('+10 day');
    $letter_limit = $limit_date->modify('+30 day');
    $return_date =$this->Rentals->get($rental_id)->return_date;

    $today_date = Time::now();
    $diff_days = $limit_date->diff($today_date)->days;

    if($mail_limit > $today_date ){//正常
      $return = ['delay'=>false,'diff_days'=>$diff_days,'state'=>'期間内'];

    }elseif(!empty($return_date)){//返却してる
      $return = ['delay'=>false,'diff_days'=>$diff_days,'state'=>'返却済'];

    }elseif($letter_limit < $today_date){//30日以上延滞中
      $return = ['delay'=>true,'diif_days'=>$diff_days,'state'=>'30日延滞中'];

    }else{
      $return = ['delay'=>true,'diif_days'=>$diff_days,'state'=>'10日延滞中'];
    }

    return $return;
  }

} //classの閉じ括弧
