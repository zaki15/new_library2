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
  <!-- <pre>
<?php
var_dump($bookstate);
 ?>
  </pre> -->
  <?= $this->Form->create($bookstate,['type'=>'post','url'=>['controller'=>'Bookstates','action'=>'done']]) ?>
  <table id="test_table">
        <?php
        $i=0;

        foreach ($bookstate as $value) {

            echo $this->Form->control('book.'.$i.'.isbn',['value'=>$value->book->isbn]);
            echo $this->Form->control('book.'.$i.'.name',['value'=>$value->book->name]);
            echo $this->Form->control('book.'.$i.'.author',['value'=>$value->book->author]);
            echo $this->Form->control('book.'.$i.'.publisher',['value'=>$value->book->publisher_id]);
            echo $this->Form->control('book.'.$i.'.publish_date',['value'=>$value->book->publish_date]);
            echo $this->Form->control('book.'.$i.'.arrival_date',['value'=>$value->arrival_date]);
            echo $this->Form->control('book.'.$i.'.delete_date',['value'=>$value->delete_date]);
            echo $this->Form->control('book.'.$i.'.state',['value'=>$value->state]);

            $i++;
            echo '<hr>';
          }?>
      </table>

    </div>

    <div id="right_under">

      <?= $this->Form->button(__('登録'),['class'=>'under_button']) ?>
      <?= $this->Form->end() ?>


      <button class="under_button">情報検索画面へ</button>
    </div>
