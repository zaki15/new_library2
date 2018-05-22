<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookstate $bookstate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookstate'), ['action' => 'edit', $bookstate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookstate'), ['action' => 'delete', $bookstate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookstate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookstates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookstate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookstates view large-9 medium-8 columns content">
    <h3><?= h($bookstate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $bookstate->has('book') ? $this->Html->link($bookstate->book->name, ['controller' => 'Books', 'action' => 'view', $bookstate->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookstate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $this->Number->format($bookstate->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Arrival Date') ?></th>
            <td><?= h($bookstate->arrival_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delete Date') ?></th>
            <td><?= h($bookstate->delete_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rentals') ?></h4>
        <?php if (!empty($bookstate->rentals)): ?>
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
            <?php foreach ($bookstate->rentals as $rentals): ?>
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
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($bookstate->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Bookstate Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bookstate->reservations as $reservations): ?>
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
        </table>
        <?php endif; ?>
    </div>
</div>
