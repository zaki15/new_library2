<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
*/
?>

<div id="right_top">
  <h1>貸出</h1>
  書名
  <input id="search" type="text">
  著者名
  <input id="search" type="text">
  ISBN
  <input id="search" type="text">
  <input type="submit" value="検索"><br>

</div>

<div id="right_center">
  <h3><?= __('Rentals') ?></h3>

    <table  border='1' id="test_table">
      <tr>
        <th scope="col"><?= $this->Paginator->sort('ISBN番号') ?></th>
        <th scope="col"><?= $this->Paginator->sort('区分') ?></th>
        <th scope="col"><?= $this->Paginator->sort('タイトル') ?></th>
        <th scope="col"><?= $this->Paginator->sort('著者名') ?></th>
        <th scope="col"><?= $this->Paginator->sort('出版社名') ?></th>
        <th scope="col"><?= $this->Paginator->sort('出版日') ?></th>
        <th scope="col"><?= $this->Paginator->sort('資料ID') ?></th>
        <th scope="col"><?= $this->Paginator->sort('入荷年月日') ?></th>
        <th scope="col"><?= $this->Paginator->sort('廃棄年月日') ?></th>
        <th scope="col"><?= $this->Paginator->sort('蔵書冊数') ?></th>
        <th scope="col"><?= $this->Paginator->sort('変更・削除') ?></th>
        <th scope="col"></th>
      </tr>
      <?php foreach ($rentals as $rentals): ?>
        <tr>
          <td><?= h($rentals->book->isbn)  ?></td>
          <td><?= h($rentals->category->id)  ?></td>
          <td><?= h($rentals->book->name) ?></td>
          <td><?= h($rentals->book->author) ?></td>
          <td><?= h($rentals->publisher->publisher) ?></td>
          <td><?= h($rentals->book->publish_date) ?></td>
          <td><?= h($this->Number->format($rentals->id)) ?></td>
          <td><?= h($rentals->arrival_date) ?></td>
          <td><?= h($rentals->delete_date) ?></td>
          <td><?= h($rentals->state) ?></td>
          <td><?= $this->Form->checkbox('') ?></td>
          <td><?= $this->Form->checkbox('') ?></td>

        </tr>
      <?php endforeach; ?>

    </table>


    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>

    </div>
  </div>


  <div id="right_under">
<!--以下、遷移なし-->
  <button class="under_button">さらに追加</button>
  <button class="under_button">貸出処理へ</button>
</div>
