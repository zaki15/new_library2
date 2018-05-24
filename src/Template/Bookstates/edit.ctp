<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookstate $bookstate
 */
?>
<div id="right_top">
  <h1>資料情報の変更・削除</h1>

  変更する項目を入力してください<br>
  廃棄の場合は蔵書冊数を変更してください

</div>
<div id="right_center">
  <?= $this->Form->create($bookstate,['type'=>'post','url'=>['controller'=>'Bookstates','action'=>'edit']]) ?>
  <table border="1">
        <?php
            // echo $this->Form->control('book_id');
            echo $this->Form->control('book.isbn');
            echo $this->Form->control('book.name');
            echo $this->Form->control('book.author');
            echo $this->Form->control('book.publisher');
            echo $this->Form->control('book.publish_date');
            echo $this->Form->control('arrival_date');
            echo $this->Form->control('delete_date');
            echo $this->Form->control('state');
        ?>
      </table>

    </div>

    <div id="right_under">
      <?= $this->Form->button(__('登録'),['class'=>'under_button']) ?>
      <?= $this->Form->end() ?>


      <button class="under_button">情報検索画面へ</button>
    </div>
