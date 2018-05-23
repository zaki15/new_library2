<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div id="right_top">
    <!-- <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('予約リストに戻る'), ['action' => 'index']) ?></li>
    </ul> -->
    <br>
    <?= $this->Html->link(__('予約リストに戻る'), ['action' => 'index']) ?>
</div>

<div id="right_center">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('予約情報の編集') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('bookstate_id', ['options' => $bookstates]);
            echo $this->Form->control('book_id', ['options' => $books]);
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('確定')) ?>
    <?= $this->Form->end() ?>
</div>
