<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>

<div id="right_top">
  <h3>督促状管理画面</h3>
</div>

<div id="right_center">
    <?= $this->Form->create($rental) ?>

        <legend><?= __('') ?></legend>
        <br>

        <?php
            echo $this->Form->control('pressing_letter',['label' => '督促状']);
        ?>

    <?= $this->Form->button(__('確定')) ?>
    <?= $this->Form->end() ?>
</div>

<div id="right_under">

</div>
