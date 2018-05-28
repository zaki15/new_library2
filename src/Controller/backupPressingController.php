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
    $this->paginate = [
      'contain' => ['Bookstates', 'Users', 'Reservations']
    ];

    $data = $this->Rentals->find('all');
    $array = array();
    foreach ($data as $rental) {
      $result = $this->delay_check($rental->id);
      if($result['delay']){
        array_push($array,$rental);
      }
    }
    $this->set('rentals', $array);
  }

  private function delay_check($rental_id){//rentals_idより延滞判定 返り値 連想配列 delay=>boolean diff_days=>返却期限との差
    $limit_date = $this->Rentals->get($rental_id)->limit_date;
    $mail_limit = $limit_date->modify('+10 day');
    $letter_limit = $limit_date->modify('+30 day');
    $return_date =$this->Rentals->get($rental_id)->return_date;
    $today_date = Time::now();

    $diff_days = $limit_date->diff($today_date)->days;

    if($mail_limit > $today_date ){//正常
      $return = ['delay'=>false,'diff_days'=>$diff_day,'state'=>'期間内'];

    }elseif(!empty($return_date)){//返却してる
      $return = ['delay'=>false,'diff_days'=>$diff_days,'state'=>'返却済'];

    }elseif($letter_limit < $today_date){//30日以上延滞中
      $return = ['delay'=>true,'diif_days'=>$diff_days,'state'=>'30日以上延滞中'];

    }else{
      $return = ['delay'=>true,'diif_days'=>$diff_days,'state'=>'10日以上延滞中'];
    }

    return $return;
  }

} //classの閉じ括弧
