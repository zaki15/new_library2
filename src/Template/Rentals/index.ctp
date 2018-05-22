<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
*/
?>

<div id="right_top">
  <h1>貸出</h1>
  <input id="search" type="text">
  <input type="submit" value="検索"><br>
</div>

<div id="right_center">
  <h3><?= __('Rentals') ?></h3>

  <table id="test_table" border="1">
    <tr>
        <th scope="row"><?= __('ユーザーId') ?></th>
        <td><?= $this->Number->format($user->id) ?></td>
    </tr>
      <tr>
          <th scope="row"><?= __('姓') ?></th>
          <td><?= h($user->last_name) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('名') ?></th>
          <td><?= h($user->first_name) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('郵便番号') ?></th>
          <td><?= h($user->postal) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('住所') ?></th>
          <td><?= h($user->address) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('電話番号') ?></th>
          <td><?= h($user->tel) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Email') ?></th>
          <td><?= h($user->email) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('パスワード') ?></th>
          <td><?= h($user->password) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('会員種別') ?></th>
          <td><?= h($user->role) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('生年月日') ?></th>
          <td><?= h($user->birthday) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('入会年月日') ?></th>
          <td><?= h($user->add_date) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('退会年月日') ?></th>
          <td><?= h($user->delete_date) ?></td>
      </tr>
  </table>

  <h4><?= __('貸出情報') ?></h4>

  <table class="test_table" border="1">
    <?php if (!empty($user->rentals)): ?>

        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Bookstate Id') ?></th>
            <th scope="col"><?= __('User Id') ?></th>
            <th scope="col"><?= __('Reservation Id') ?></th>
            <th scope="col"><?= __('Rent Date') ?></th>
            <th scope="col"><?= __('Return Date') ?></th>
            <th scope="col"><?= __('Pressing Letter') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->rentals as $rentals): ?>
        <tr>
            <td><?= h($rentals->id) ?></td>
            <td><?= h($rentals->bookstate_id) ?></td>
            <td><?= h($rentals->user_id) ?></td>
            <td><?= h($rentals->reservation_id) ?></td>
            <td><?= h($rentals->rent_date) ?></td>
            <td><?= h($rentals->return_date) ?></td>
            <td><?= h($rentals->pressing_letter) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Rentals', 'action' => 'view', $rentals->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Rentals', 'action' => 'edit', $rentals->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rentals', 'action' => 'delete', $rentals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentals->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php else:?>
        <td>貸出情報はありません</td>
    <?php endif; ?>
  </table>

  <h4><?= __('予約情報') ?></h4>
  <table class="test_table" border="1">
    <?php if (!empty($user->reservations)): ?>
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('User Id') ?></th>
            <th scope="col"><?= __('Bookstate Id') ?></th>
            <th scope="col"><?= __('Book Id') ?></th>
            <th scope="col"><?= __('Date') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->reservations as $reservations): ?>
        <tr>
            <td><?= h($reservations->id) ?></td>
            <td><?= h($reservations->user_id) ?></td>
            <td><?= h($reservations->bookstate_id) ?></td>
            <td><?= h($reservations->book_id) ?></td>
            <td><?= h($reservations->date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php else:?>
        <td>予約情報はありません</td>
    <?php endif; ?>
  </table>


</div>

</div>
<div id="right_under">

<?=$this->Form->create(null,['type'=>'post','url'=>["controller"=>"Rentals", "action" => "search"]]) ?>
<?=$this->Form->submit('資料検索画面へ')?>
<?=$this->Form->end()?>

</div>
