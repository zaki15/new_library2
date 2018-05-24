<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Publishers'), ['controller' => 'Publishers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Publisher'), ['controller' => 'Publishers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookstates'), ['controller' => 'Bookstates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookstate'), ['controller' => 'Bookstates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div id="right_top">
  <h1>新規資料登録</h1>

  新規資料の情報を入力してください

</div>

<div id="right_center">

    <?= $this->Form->create($book) ?>

    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo '<tr><td>区分</td><td>'.$this->Form->control('category_id', ['options' => $categories]).'</td></tr>';
            echo '<tr><td>出版社名</td><td>'.$this->Form->control('publisher_id', ['options' => $publishers]).'</td></tr>';
            echo '<tr><td>ISBN番号</td><td>'.$this->Form->control('isbn').'</td></tr>';
            echo '<tr><td>タイトル</td><td>'.$this->Form->control('name').'</td></tr>';
            echo '<tr><td>著者名</td><td>'.$this->Form->control('author').'</td></tr>';
            echo '<tr><td>出版日</td><td>'.$this->Form->control('publish_date').'</td></tr>';
            echo '<tr><td>資料ID</td><td>'.$this->Form->hidden('bookstate_id',['options' => $bookstates]).'</td></tr>';
            echo '<tr><td>入荷年月日</td><td>'.$this->Form->control('arrival_date',['options' => $bookstates]).'</td></tr>';
            echo '<tr><td>廃棄年月日</td><td>'.$this->Form->control('delete_date',['options' => $bookstates]).'</td></tr>';
            echo '<tr><td>蔵書冊数</td><td>'.$this->Form->control('state',['options' => $bookstates]).'</td></tr>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

  </div>

  <div id="right_under">
    <?= $this->Form->button(__('登録'),['class'=>'under_button']) ?>
    <?= $this->Form->end() ?>


    <button class="under_button">情報検索画面へ</button>
  </div>
