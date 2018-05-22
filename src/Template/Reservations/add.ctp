<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div id="right_top">
  <br>
  <br>
    <?= $this->Html->link(__('予約リストに戻る'), ['action' => 'index']) ?>
</div>

<div id="right_center">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('予約情報の入力') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('bookstate_id', ['options' => $bookstates]);
            echo $this->Form->control('book_id', ['options' => $books]);
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('予約')) ?>
    <?= $this->Form->end() ?>
</div>
