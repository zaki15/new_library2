<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<div id="right_top">
    <br>
    <br>
    <!--<? /*= $this->Html->link(__('新規予約'), ['action' => 'add'])*/ ?> -->
    <h3>利用者ID検索</h3>
    <?=$this->Form->create(null,['type'=>'post','url'=>['controller'=>'People','action'=>'index']]) ?>
    <div><?=$this->Form->text('Reservations.find') ?></div>
    <div><?=$this->Form->submit('検索') ?></div>
    <?=$this->Form->end() ?>

</div>
<br>
<br>

<div id="right_center">
    <h3><?= __('予約台帳') ?></h3>
    <table border="1" id="test_table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookstate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('book_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($reservations as $reservation): ?> <!--$reservationsはデフォルトでテーブルクラスに用意されているオブジェクト -->
            <tr>
                <td><?= $this->Number->format($reservation->id) ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->last_name, ['controller' => 'Users', 'action' => 'view', $reservation->user->last_name]) : '' ?></td>
                <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->first_name, ['controller' => 'Users', 'action' => 'view', $reservation->user->first_name]) : '' ?></td>
                <td><?= $reservation->has('bookstate') ? $this->Html->link($reservation->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $reservation->bookstate->id]) : '' ?></td>
                <td><?= $reservation->has('book') ? $this->Html->link($reservation->book->name, ['controller' => 'Books', 'action' => 'view', $reservation->book->id]) : '' ?></td>
                <td><?= h($reservation->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __(' # {0} の予約情報を削除しますか?', $reservation->id)]) ?>
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

  <input type="button" name="" value="新規予約" onclick="location.href='http://localhost/library_system2/reservations/add'">
</div>
