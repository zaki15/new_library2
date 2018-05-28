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

        <h4><?= __('予約情報の入力') ?></h4>
        <?php
            echo "会員ID";
            echo $this->Form->text('user_id', ['options' => $users]);
            echo "<br>";
            echo "資料台帳ID";
            echo $this->Form->text('bookstate_id', ['options' => $bookstates]);
            echo "<br>";
            echo "資料名";
            echo $this->Form->text('book_name', ['options' => $books]);
            echo $this->Form->control('date');
        ?>
    <?= $this->Form->button(__('予約')) ?>
    <?= $this->Form->end() ?>
</div>
