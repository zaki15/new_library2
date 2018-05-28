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
  <h3>督促状管理画面</h3>
  <a href="#delay10">10日以上延滞者一覧</a><br>
  <a href="#delay30">30日以上延滞者一覧</a>
</div>

<div id="right_center">
    <h3 id="delay10"><?= __('10日以上延滞者') ?></h3>
    <table id="test_table" border="1">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookstate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','資料名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name','名字') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name','名前') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','会員ID') ?></th>
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
                <td><?= h($rental_1->user->last_name) ?></td>
                <td><?= h($rental_1->user->first_name) ?></td>
                <td><?= h($rental_1->user->id) ?></td>
                <td><?= h($rental_1->user->tel) ?></td>
                <td><?= h($rental_1->user->address) ?></td>
                <td><?= h($rental_1->user->email) ?></td>
                <td><?= h($rental_1->rent_date) ?></td>
                <td><?= h($rental_1->limit_date) ?></td>
                <td><?= h($rental_1->pressing_letter) ?></td>
                <td class="actions">
                <?= $this->Html->link(__('変更'), ['controller' => 'Rentals', 'action' => 'edit', $rental_1->id]) ?>
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
                <th scope="col"><?= $this->Paginator->sort('bookstate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','資料名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name','名字') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name','名前') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','会員ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel','電話番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address','住所') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email','Eメール') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_date','貸出日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('limit_date','返却期限') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pressing_letter','督促状') ?></th>
                <!--<th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($delay30 as $rental_2):
              ?>
            <tr>
              <td><?= $this->Number->format($rental_2->id) ?></td>
              <td><?= h($rental_2->bookstate_id) ?></td>
              <td><?= h($rental_2->bookstate->book->name) ?></td>
              <td><?= h($rental_2->user->last_name) ?></td>
              <td><?= h($rental_2->user->first_name) ?></td>
              <td><?= h($rental_1->user->id) ?></td>
              <td><?= h($rental_2->user->tel) ?></td>
              <td><?= h($rental_2->user->address) ?></td>
              <td><?= h($rental_2->user->email) ?></td>
              <td><?= h($rental_2->rent_date) ?></td>
              <td><?= h($rental_2->limit_date) ?></td>
              <td><?= h($rental_2->pressing_letter) ?></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rental_2->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rental_2->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rental_2->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental_2->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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
