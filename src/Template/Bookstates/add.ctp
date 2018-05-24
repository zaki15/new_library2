<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookstate $bookstate
 */
?>
<div id="right_top">
  <h1>新規資料登録</h1>

  新規資料の情報を入力してください

</div>
<div id="right_center">
  <?= $this->Form->create('all',['type'=>'post','url'=>['controller'=>'Bookstates','action'=>'add']]) ?>
  <table border="1">
    <?php
        echo '<tr><td>ISBN番号</td><td>'.$this->Form->control('Bookstates.isbn',['label'=>'']).'</td></tr>';
        echo '<tr><td>区分</td><td>'.$this->Form->select('Bookstates.category_id', [0,1, 2, 3, 4, 5,6,7,8,9]).'</td></tr>';
        echo '<tr><td>タイトル</td><td>'.$this->Form->control('Bookstates.name',['label'=>'']).'</td></tr>';
        echo '<tr><td>著者名</td><td>'.$this->Form->control('Bookstates.author',['label'=>'']).'</td></tr>';
        echo '<tr><td>出版社コード</td><td>'.$this->Form->control('Bookstates.publisher',['label'=>'']).'</td></tr>';
        echo '<tr><td>出版日</td><td>'.$this->Form->control('Bookstates.publish_date',['label'=>'']).'</td></tr>';
        echo '<tr><td>入荷年月日</td><td>'.$this->Form->control('Bookstates.arrival_date',['label'=>'']).'</td></tr>';
        echo '<tr><td>廃棄年月日</td><td>'.$this->Form->control('Bookstates.delete_date',['label'=>'']).'</td></tr>';
        echo '<tr><td>蔵書冊数</td><td>'.$this->Form->control('Bookstates.state',['label'=>'']).'</td></tr>';
    ?>
  </table>

</div>

<div id="right_under">
  <?= $this->Form->button(__('登録'),['class'=>'under_button']) ?>
  <?= $this->Form->end() ?>


  <button class="under_button">情報検索画面へ</button>
</div>
