<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('予約リストに戻る'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Edit Reservation') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('bookstate_id', ['options' => $bookstates]);
            echo $this->Form->control('book_id', ['options' => $books]);
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
