<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>

<div id="right_top">

<h1>資料検索</h1>
<?= $this->Form->create(null,
['type'=>'post',
'url'=>['controller'=>'Bookstates',
'action'=>'search']])?>

<div><?= $this->Form->text('Bookstates.find') ?></div>
<div><?= $this->Form->submit('検索') ?></div>
<div><?= $this->Form->end() ?></div>
</div>

<div id="right_center">

  <h3><?= __('Bookstates') ?></h3>

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
    </tr>
    <?php foreach ($bookstates as $bookstate): ?>
      <tr>
        <td><?= h($bookstate->isbn)  ?></td>
        <td><?= h($bookstate->category) ?></td>
        <td><?= h($bookstate->name) ?></td>
        <td><?= h($bookstate->author) ?></td>
        <td><?= h($bookstate->publisher) ?></td>
        <td><?= h($bookstate->publish_date) ?></td>
        <td><?= h($bookstate->book_id) ?></td>
        <td><?= h($bookstate->arrival_date) ?></td>
        <td><?= h($bookstate->delete_date) ?></td>
        <td><?= h($bookstate->state) ?></td>
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
  <?= $this->Form->create(null,
  ['type'=>'post',
  'url'=>['controller'=>'Bookstates',
  'action'=>'edit']])?>
  <?= $this->Form->button(__('変更・削除画面へ'),['class'=>'under_button']) ?>
  <?= $this->Form->end() ?>
</div>
