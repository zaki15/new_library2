<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookstates'), ['controller' => 'Bookstates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookstate'), ['controller' => 'Bookstates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $reservation->has('user') ? $this->Html->link($reservation->user->id, ['controller' => 'Users', 'action' => 'view', $reservation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bookstate') ?></th>
            <td><?= $reservation->has('bookstate') ? $this->Html->link($reservation->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $reservation->bookstate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $reservation->has('book') ? $this->Html->link($reservation->book->name, ['controller' => 'Books', 'action' => 'view', $reservation->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($reservation->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rentals') ?></h4>
        <?php if (!empty($reservation->rentals)): ?>
        <table cellpadding="0" cellspacing="0">
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
