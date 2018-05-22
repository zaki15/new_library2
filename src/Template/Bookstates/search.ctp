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
      <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    <?php foreach ($this as $bookstate): ?>
      <tr>

        <td><?= $bookstate->has('book') ? $this->Html->link($bookstate->book->isbn, ['controller' => 'Books', 'action' => 'view', $bookstate->book->id]) : '' ?></td>
        <td><?= $bookstate->has('category') ? $this->Html->link($bookstate->category->id, ['controller' => 'Categories', 'action' => 'view', $bookstate->category->id]) : '' ?></td>
        <td><?= $bookstate->has('book') ? $this->Html->link($bookstate->book->name, ['controller' => 'Books', 'action' => 'view', $bookstate->book->name]) : '' ?></td>
        <td><?= $bookstate->has('book') ? $this->Html->link($bookstate->book->author, ['controller' => 'Books', 'action' => 'view', $bookstate->book->author]) : '' ?></td>
        <td><?= $bookstate->has('publisher') ? $this->Html->link($bookstate->publisher->publisher, ['controller' => 'Books', 'action' => 'view', $bookstate->publisher->publisher]) : '' ?></td>
        <td><?= $bookstate->has('book') ? $this->Html->link($bookstate->book->publish_date, ['controller' => 'Books', 'action' => 'view', $bookstate->book->publish_date]) : '' ?></td>
        <td><?= $this->Number->format($bookstate->id) ?></td>
        <td><?= h($bookstate->arrival_date) ?></td>
        <td><?= h($bookstate->delete_date) ?></td>
        <td><?= h($bookstate->state) ?></td>
        <td class="actions">
          <?= $this->Html->link(__('View'), ['action' => 'view', $bookstate->id]) ?>
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookstate->id]) ?>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookstate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookstate->id)]) ?>
        </td>
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

<!--ブックステートの残骸
 <div id="right_center">
<br>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bookstate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>


<div class="bookstates index large-9 medium-8 columns content">
    <h3><?= __('Bookstates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('arrival_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delete_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookstates as $bookstate): ?>
            <tr>
                <td><?= $this->Number->format($bookstate->id) ?></td>
                <td><?= $bookstate->has('book') ? $this->Html->link($bookstate->book->name, ['controller' => 'Books', 'action' => 'view', $bookstate->book->id]) : '' ?></td>
                <td><?= h($bookstate->arrival_date) ?></td>
                <td><?= h($bookstate->delete_date) ?></td>
                <td><?= $this->Number->format($bookstate->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookstate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookstate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookstate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookstate->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>


</div> -->
