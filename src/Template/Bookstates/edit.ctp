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
  <pre>
    <?php var_dump($new_test); ?>
  </pre>
  <?= $this->Form->create($bookstate,['type'=>'post','url'=>['controller'=>'Bookstates','action'=>'edit']]) ?>
  <table border="1">
        <?php
        $i='1';
            // echo $this->Form->control('book_id');
            echo $this->Form->control('book'.$i.'.isbn');
            echo $this->Form->control('book'.$i.'.name');
            echo $this->Form->control('book'.$i.'.author');
            echo $this->Form->control('book'.$i.'.publisher');
            echo $this->Form->control('book'.$i.'.publish_date');
            echo $this->Form->control('book'.$i.'.arrival_date');
            echo $this->Form->control('book'.$i.'.delete_date');
            echo $this->Form->control('book'.$i.'.state');

            echo '<br>';
            $i='2';

            echo $this->Form->control('book'.$i.'.isbn');
            echo $this->Form->control('book'.$i.'.name');
            echo $this->Form->control('book'.$i.'.author');
            echo $this->Form->control('book'.$i.'.publisher');
            echo $this->Form->control('book'.$i.'.publish_date');
            echo $this->Form->control('book'.$i.'.arrival_date');
            echo $this->Form->control('book'.$i.'.delete_date');
            echo $this->Form->control('book'.$i.'.state');

        ?>
      </table>

    </div>

    <div id="right_under">
      <?= $this->Form->button(__('登録'),['class'=>'under_button']) ?>
      <?= $this->Form->end() ?>


      <button class="under_button">情報検索画面へ</button>
    </div>
