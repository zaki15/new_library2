<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
* @var ここ読んで　https://book.cakephp.org/3.0/ja/views/helpers/form.html
*/
?>

<div id="right_top">
  <h1>CSSテスト画面です(h1)</h1>
  controll:<?=$this->Form->controll('検索',['type'=>'test'])?><br>
  text:<?=$this->Form->text('検索')?><?=$this->Form->button('検索',['type'=>'submit'])?>
  ragio:<?=$this->Form->radio('favorite_color',
  [
    ['value' => 'r', 'text' => 'Red', 'style' => 'color:red;'],
    ['value' => 'u', 'text' => 'Blue', 'style' => 'color:blue;'],
    ['value' => 'g', 'text' => 'Green', 'style' => 'color:green;'],
    ])?>
    　checkbox1 <?=$this->Form->checkbox('done[]',['value' => 555])?>
    checkbox2<?=$this->Form->checkbox('done[]',['value' => 555])?>
    checkbox3<?=$this->Form->checkbox('done[]',['value' => 555])?><br>
    select:<?=$this->Form->select('field', [
      'Value 1' => 'Label 1',
      'Value 2' => 'Label 2',
      'Value 3' => 'Label 3'
    ])?>
    <?= $this->Html->link(__('リンク'), ['action' => 'edit', '']) ?>



  </div>
  <div id="right_center">


    <h3><?= __('Users') ?></h3>

    <table  border='1' id="test_table">
      <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('postal') ?></th>
        <th scope="col"><?= $this->Paginator->sort('address') ?></th>
        <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
        <th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
        <th scope="col"><?= $this->Paginator->sort('password') ?></th>
        <th scope="col"><?= $this->Paginator->sort('role') ?></th>
        <th scope="col"><?= $this->Paginator->sort('add_date') ?></th>
        <th scope="col"><?= $this->Paginator->sort('delete_date') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $this->Number->format($user->id) ?></td>
          <td><?= h($user->last_name) ?></td>
          <td><?= h($user->first_name) ?></td>
          <td><?= h($user->postal) ?></td>
          <td><?= h($user->address) ?></td>
          <td><?= h($user->tel) ?></td>
          <td><?= h($user->email) ?></td>
          <td><?= h($user->birthday) ?></td>
          <td><?= h($user->password) ?></td>
          <td><?= h($user->role) ?></td>
          <td><?= h($user->add_date) ?></td>
          <td><?= h($user->delete_date) ?></td>
          <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
          </td>
        </tr>
      <?php endforeach; ?>





    </table>


    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>

    </div>
  </div>

  <div id="right_under">
    <button class="under_button">TEST登録</button>


    <button class="under_button">TESTmenu</button>
  </div>
