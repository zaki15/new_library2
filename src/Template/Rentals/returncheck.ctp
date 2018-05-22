<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
*/
?>

<div id="right_top">
  <h1>返却</h1>
  会員ID
  <input id="search" type="text">
  <input type="submit" value="検索"><br>
</div>

<div id="right_center">
  <h3><?= __('Rentals') ?></h3>

  <table border='1' id='rental_table'>
    <thead>
      <tr>
        <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
        <th scope="col"><?= $this->Paginator->sort('bookstate_id','資料ID') ?></th>
        <th scope="col"><?= $this->Paginator->sort('reservation_id','予約情報') ?></th>
        <th scope="col"><?= $this->Paginator->sort('rent_date','貸出年月日') ?></th>
        <th scope="col"><?= $this->Paginator->sort('pressing_letter','督促状') ?></th>
        <th scope="col"><?= $this->Paginator->sort('return_date','返却日') ?></th>
        <th scope="col"></th>

        <th scope="col" class="actions"><?= __('Actions') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rentals as $rental): ?>
        <tr>
          <td><?= $this->Number->format($rental->id) ?></td>
          <td><?= $rental->has('bookstate') ? $this->Html->link($rental->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $rental->bookstate->id]) : '' ?></td>
          <td><?= $rental->has('user') ? $this->Html->link($rental->user->id, ['controller' => 'Users', 'action' => 'view', $rental->user->id]) : '' ?></td>
          <td><?= $rental->has('reservation') ? $this->Html->link($rental->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $rental->reservation->id]) : '' ?></td>
          <td><?= h($rental->rent_date) ?></td>
          <td><?= h($rental->return_date) ?></td>
          <td><?= $this->Number->format($rental->pressing_letter) ?></td>
          <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $rental->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rental->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>






</div>
<div id="right_under">

  <button class="under_button">さらに追加</button>

  <button class="under_button">返却処理へ</button>
</div>
