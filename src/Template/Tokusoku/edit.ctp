<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rental->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookstates'), ['controller' => 'Bookstates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookstate'), ['controller' => 'Bookstates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rentals form large-9 medium-8 columns content">
    <?= $this->Form->create($rental) ?>
    <fieldset>
        <legend><?= __('Edit Rental') ?></legend>
        <?php
            echo $this->Form->control('bookstate_id', ['options' => $bookstates]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('reservation_id', ['options' => $reservations]);
            echo $this->Form->control('rent_date');
            echo $this->Form->control('return_date');
            echo $this->Form->control('pressing_letter');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
