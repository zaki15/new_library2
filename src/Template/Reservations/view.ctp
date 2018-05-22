<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<br>
<div id="right_top">
        <br>
        <?= $this->Html->link(__('閲覧中の予約情報を編集'), ['action' => 'edit', $reservation->id]) ?><br>
        <?= $this->Form->postLink(__('閲覧中の予約情報を削除'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?><br>
        <?= $this->Html->link(__('予約リストに戻る'), ['action' => 'index']) ?><br>
</div>

<div class="reservations view large-9 medium-8 columns content">
    <h3>予約ID:<?= h($reservation->id) ?></h3>
    <table id="right_center" border="1">
        <tr>
            <th scope="row"><?= __('利用者ID') ?></th>
            <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('名字') ?></th>
            <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->last_name, ['controller' => 'Users', 'action' => 'view', $reservation->user->last_name]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('名前') ?></th>
            <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->first_name, ['controller' => 'Users', 'action' => 'view', $reservation->user->first_name]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bookstate') ?></th>
            <td><?= $reservation->has('bookstate') ? $this->Html->link($reservation->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $reservation->bookstate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('書名') ?></th>
            <td><?= $reservation->has('book') ? $this->Html->link($reservation->book->name, ['controller' => 'Books', 'action' => 'view', $reservation->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('予約ID') ?></th>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('予約日') ?></th>
            <td><?= h($reservation->date) ?></td>
        </tr>
    </table>
    <div id="right_under">
        <h4><?= __('Related Rentals') ?></h4>
        <?php if (!empty($reservation->rentals)): ?>
        <table border="1" id="test_table">
            <tr>
                <th scope="col"><?= __('貸出Id') ?></th>
                <th scope="col"><?= __('Bookstate Id') ?></th>
                <th scope="col"><?= __('利用者ID') ?></th>
                <th scope="col"><?= __('予約ID') ?></th>
                <th scope="col"><?= __('貸出日') ?></th>
                <th scope="col"><?= __('返却日') ?></th>
                <th scope="col"><?= __('Pressing Letter') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reservation->rentals as $rentals): ?>
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
        </table>
        <?php endif; ?>
    </div>
</div>
