<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<div id="right_top">
    <br>
    <!--<? /*= $this->Html->link(__('新規予約'), ['action' => 'add'])*/ ?> -->
    <h3>会員ID検索</h3>
    <?=$this->Form->create(null,['type'=>'post','url'=>['controller'=>'Reservations','action'=>'index']]) ?>
    <div><?=$this->Form->text('id') ?>
    <?=$this->Form->submit('検索') ?></div>
    <?=$this->Form->end() ?>
    <br><?= $this->Html->link(__('新規予約'), ['action' => 'add']) ?>
</div>
<br>
<br>

<div id="right_center">
    <h3><?= __('予約台帳') ?></h3>
    <table border="1" id="test_table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','予約ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id','会員ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name','名字') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name','名前') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookstate_id','資料台帳ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id','資料名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_isbn','ISBN番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date','予約日') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= $this->Number->format($reservation->id) ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->last_name, ['controller' => 'Users', 'action' => 'view', $reservation->user->last_name]) : '' ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->first_name, ['controller' => 'Users', 'action' => 'view', $reservation->user->first_name]) : '' ?></td>
                <td><?= $reservation->has('bookstate') ? $this->Html->link($reservation->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $reservation->bookstate->id]) : '' ?></td>
                <td><?= $reservation->has('book') ? $this->Html->link($reservation->book->name, ['controller' => 'Books', 'action' => 'view', $reservation->book->id]) : '' ?></td>
                <td><?= $reservation->has('book') ? $this->Html->link($reservation->book->isbn, ['controller' => 'Books', 'action' => 'view', $reservation->book->isbn]) : '' ?></td>
                <td><?= h($reservation->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $reservation->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $reservation->id], ['confirm' => __(' # {0} の予約情報を削除しますか?', $reservation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?><?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<div id="right_under">
</div>
