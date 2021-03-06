<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
 */

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>督促状管理画面</title>
  </head>
  <body>

<div id="right_top">
  <br>
  <h2>延滞情報一覧</h2>
  <a href="#delay10">10日以上延滞者一覧</a><br>
  <a href="#delay30">30日以上延滞者一覧</a>
</div>

<div id="right_center">
    <h3 id="delay10"><?= __('10日以上延滞者') ?></h3>
    <table id="test_table" border="1">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','貸出ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookstate_id','資料ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','資料名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','会員ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('氏名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel','電話番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address','住所') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email','Eメール') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_date','貸出日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('limit_date','返却期限') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pressing_letter','督促状') ?></th>
                <th scope="col" class="actions"><?= __('変更') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($delay10 as $rental_1):
              ?>
            <tr>
                <td><?= $this->Number->format($rental_1->id) ?></td>
                <td><?= h($rental_1->bookstate_id) ?></td>
                <td><?= h($rental_1->bookstate->book->name) ?></td>
                <td><?= h($rental_1->user->id) ?></td>
                <td><?= h($rental_1->user->last_name) ?><?= h($rental_1->user->first_name) ?></td>
                <td><?= h($rental_1->user->tel) ?></td>
                <td><?= h($rental_1->user->address) ?></td>
                <td><?= h($rental_1->user->email) ?></td>
                <td><?= h($rental_1->rent_date) ?></td>
                <td><?= h($rental_1->limit_date) ?></td>
                <td><?php if($rental_1->pressing_letter == 0){echo '';}elseif($rental_1->pressing_letter == 1){echo '連絡済';}elseif($rental_1->pressing_letter == 2){echo '書面送付済';} ?></td>
                <td class="actions">
                <?= $this->Html->link(__('変更'), ['controller' => 'Pressing', 'action' => 'edit', $rental_1->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <h3 id="delay30"><?= __('30日以上延滞者') ?></h3>
    <table id="test_table" border="1">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookstate_id','資料ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','資料名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','会員ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('氏名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel','電話番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address','住所') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email','Eメール') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_date','貸出日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('limit_date','返却期限') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pressing_letter','督促状') ?></th>
                <th scope="col" class="actions"><?= __('変更') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($delay30 as $rental_2):
              ?>
            <tr>
              <td><?= $this->Number->format($rental_2->id) ?></td>
              <td><?= h($rental_2->bookstate_id) ?></td>
              <td><?= h($rental_2->bookstate->book->name) ?></td>
              <td><?= h($rental_2->user->id) ?></td>
              <td><?= h($rental_2->user->last_name) ?><?= h($rental_2->user->first_name) ?></td>
              <td><?= h($rental_2->user->tel) ?></td>
              <td><?= h($rental_2->user->address) ?></td>
              <td><?= h($rental_2->user->email) ?></td>
              <td><?= h($rental_2->rent_date) ?></td>
              <td><?= h($rental_2->limit_date) ?></td>
              <td><?php if($rental_2->pressing_letter == 0){echo '';}elseif($rental_2->pressing_letter == 1){echo '連絡済';}elseif($rental_2->pressing_letter == 2){echo '書面送付済';} ?></td>
              <td class="actions">
                <?= $this->Html->link(__('変更'), ['controller' => 'Pressing', 'action' => 'edit', $rental_2->id]) ?>
              </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>

    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div> -->

</body>
</html>
