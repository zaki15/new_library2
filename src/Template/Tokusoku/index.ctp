<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental[]|\Cake\Collection\CollectionInterface $rentals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookstates'), ['controller' => 'Bookstates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookstate'), ['controller' => 'Bookstates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals index large-9 medium-8 columns content">
    <h3><?= __('Rentals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bookstate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('return_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pressing_letter') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?= $this->Number->format($rental->id) ?></td>
                <td><?= $rental->has('bookstate') ? $this->Html->link($rental->bookstate->id, ['controller' => 'Bookstates', 'action' => 'view', $rental->bookstate->id]) : '' ?></td>
                <td><?= $rental->has('user') ? $this->Html->link($rental->user->id, ['controller' => 'Users', 'action' => 'view', $rental->user->id]) : '' ?></td>
                <td><?= $rental->has('reservation') ? $this->Html->link($rental->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $rental->reservation->id]) : '' ?></td>
                <td><?= h($rental->rent_date) ?></td>
                <td><?= h($rental->return_date) ?></td>
                <td><?= $this->Number->format($rental->pressing_letter) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rental->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rental->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?>
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
