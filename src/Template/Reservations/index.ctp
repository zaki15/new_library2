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
    <h3>予約者検索</h3>
    <form action="localhost/libratysystem/index" method="post">
     <input type="text" name="search">
     <input type="button" value="検索">
    </form>
    <input type="button" name="" value="予約画面へ" onclick="location.href='http://localhost/library_system2/reservations/add'">
</div>
<br>
<br>

<div id="right_center">
    <h3><?= __('予約リスト') ?></h3>
    <table border="1" id="test_table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
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
                <td><?= $reservation->has('bookstate') ? $this->Html->link($reservation->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $reservation->bookstate->id]) : '' ?></td>
                <td><?= $reservation->has('book') ? $this->Html->link($reservation->book->name, ['controller' => 'Books', 'action' => 'view', $reservation->book->id]) : '' ?></td>
                <td><?= h($reservation->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?>
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
