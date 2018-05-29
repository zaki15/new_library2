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
  <br>
    <?= $this->Form->create($reservation) ?>
  <br>
        <h4><?= __('予約情報の入力') ?></h4>
        <?php
            echo $this->Form->control('user_id', ['options' => $users,'label'=>'会員ID']);
            echo $this->Form->control('bookstate_id', ['options' => $bookstates,'label'=>'資料台帳ID']);
            echo '資料目録ID'; echo $this->Form->number('book_id'); //'options' => $books,
            echo $this->Form->control('date',['label' => '日付']);
        ?>
    <?= $this->Form->button(__('予約')) ?>
    <?= $this->Form->end() ?>
</div>
