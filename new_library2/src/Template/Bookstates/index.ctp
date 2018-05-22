<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookstate[]|\Cake\Collection\CollectionInterface $bookstates
 */
?>
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
