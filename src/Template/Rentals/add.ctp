<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<div class="rentals form large-9 medium-8 columns content">
    <?= $this->Form->create($rental) ?>
    <fieldset>
        <legend><?= __('Add Rental') ?></legend>
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
