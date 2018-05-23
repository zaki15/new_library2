<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookstate $bookstate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookstate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookstate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookstates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookstates form large-9 medium-8 columns content">
    <?= $this->Form->create($entity,
        ['type'=>['controller'=>'Bookstates','action'=>'index']]) ?>
    <fieldset class="form">
        <legend><?= __('変更・削除') ?></legend>
        <?php
            echo $this->Form->control('book_id');
            echo $this->Form->control('isbn');
            echo $this->Form->control('name');
            echo $this->Form->control('author',['options' => $books]);
            echo $this->Form->control('publisher');
            echo $this->Form->control('publish_date');
            echo $this->Form->control('id');
            echo $this->Form->control('arrival_date');
            echo $this->Form->control('delete_date');
            echo $this->Form->control('state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
