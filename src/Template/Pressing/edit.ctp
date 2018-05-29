<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>

<div id="right_top">
  <br>
  <h2>督促状情報変更</h2>
</div>

<div id="right_center">
  <br>
  <p>0:未連絡</p>
  <p>1:電話・メール連絡済</p>
  <p>2:督促状送付済</p>

    <?= $this->Form->create($rental) ?>
        <legend><?= __('') ?></legend>
        <br>
        <?php
            echo $this->Form->control('pressing_letter',['label' => '入力 ']);
        ?>

    <?= $this->Form->button(__('確定')) ?>
    <?= $this->Form->end() ?>
</div>

<div id="right_under">

</div>
