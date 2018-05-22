<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div id="right_top">
  <h1>新規会員登録</h1>

  新規会員の情報を入力してください

</div>
<div id="right_center">


  <?= $this->Form->create($user) ?>
  <table border="1" id="test_table">
    <?php
        echo '<tr><td>姓</td><td>'.$this->Form->control('last_name',['label'=>'']).'</td></tr>';
        echo '<tr><td>名</td><td>'.$this->Form->control('first_name',['label'=>'']).'</td></tr>';
        echo '<tr><td>郵便番号</td><td>'.$this->Form->control('postal',['label'=>'']).'</td></tr>';
        echo '<tr><td>住所</td><td>'.$this->Form->control('address',['label'=>'']).'</td></tr>';
        echo '<tr><td>電話番号</td><td>'.$this->Form->control('tel',['label'=>'']).'</td></tr>';
        echo '<tr><td>E-mail</td><td>'.$this->Form->control('email',['label'=>'']).'</td></tr>';
        echo '<tr><td>誕生日</td><td>'.$this->Form->control('birthday',['label'=>'']).'</td></tr>';
        echo '<tr><td>パスワード</td><td>'.$this->Form->control('password',['label'=>'']).'</td></tr>';
        echo '<tr><td>会員種別</td><td>'.$this->Form->control('role',['label'=>'']).'</td></tr>';
        echo '<tr><td>入会年月日</td><td>'.$this->Form->control('add_date',['label'=>'']).'</td></tr>';
        echo '<tr><td>退会年月日</td><td>'.$this->Form->control('delete_date',['label'=>'']).'</td></tr>';
    ?>
  </table>

</div>

<div id="right_under">
  <?= $this->Form->button(__('登録'),['class'=>'under_button']) ?>
  <?= $this->Form->end() ?>


  <button class="under_button">情報検索画面へ</button>
</div>
