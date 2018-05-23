<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
*/
?>

<div id="right_top">
  <h1>貸出</h1>

  <?=$this->Form->create(null,['type'=>'post','url'=>['controller'=>'Rentals','action'=>'index']]) ?>
  <?=$this->Form->text('Rentals.find') ?>
  <?=$this->Form->submit('検索') ?>
  <?=$this->Form->end() ?>
</div>

<div id="right_center">
  <h3><?= __('Rentals') ?></h3>

  <table id="test_table" border="1">
    <?php if (!empty($rentals)): ?>
      <?php foreach ($rentals as $rentals): ?>


      <tr>
        <th scope="row"><?= __('ユーザーId') ?></th>
        <td><?= $this->Number->format($rentals->user->id) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('姓') ?></th>
        <td><?= h($rentals->user->last_name) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('名') ?></th>
        <td><?= h($rentals->user->first_name) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('郵便番号') ?></th>
        <td><?= h($rentals->user->postal) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('住所') ?></th>
        <td><?= h($rentals->user->address) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('電話番号') ?></th>
        <td><?= h($rentals->user->tel) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('Email') ?></th>
        <td><?= h($rentals->user->email) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('パスワード') ?></th>
        <td><?= h($rentals->user->password) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('会員種別') ?></th>
        <td><?= h($rentals->user->role) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('生年月日') ?></th>
        <td><?= h($rentals->user->birthday) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('入会年月日') ?></th>
        <td><?= h($rentals->user->add_date) ?></td>
      </tr>
      <tr>
        <th scope="row"><?= __('退会年月日') ?></th>
        <td><?= h($rentals->user->delete_date) ?></td>
        <td><?= h($rentals->id) ?></td>
        <td><?= h($rentals->bookstate_id) ?></td>
        <td><?= h($rentals->user_id) ?></td>
        <td><?= h($rentals->reservation_id) ?></td>
        <td><?= h($rentals->rent_date) ?></td>
        <td><?= h($rentals->return_date) ?></td>
        <td><?= h($rentals->pressing_letter) ?></td>
      </tr>



      <?php endforeach; ?>
    <?php else:?>
      <td ><font color="red">会員idを入力して検索してください</font></td>
    </table>

  <?php endif; ?>



  <table class="test_table" border="1">
    <?php if (!empty($rentals)): ?>

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

      <?php foreach ($rentals as $rentals): ?>

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

    <?php if (!empty($rentals->user->rental)): ?>
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
<!--もし延滞、貸出超過があった場合は押せない仕様にする。-->
<?=$this->Form->end()?>

</div>
