<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookstate $bookstate
 */
?>
<div id="right_top">
  <h1>変更完了</h1>

  変更内容が反映されました。<br>


</div>
<div id="right_center">
  <pre>
<?php
var_dump($new_test);
 ?>
  </pre>
  <table id="test_table">
        <?php
        $i=0;
        foreach ($bookstate as $value) {
          echo h($value->book->isbn);
          echo h($value->book->name);
          echo h($value->book->author);
          echo h($value->book->publisher_id);
          echo h($value->book->publish_date);
          echo h($value->arrival_date);
          echo h($value->delete_date);
          echo h($value->state);
            // echo $this->Form->control('book.'.$i.'.isbn',['value'=>$value->book->isbn]);
            // echo $this->Form->control('book.'.$i.'.name',['value'=>$value->book->name]);
            // echo $this->Form->control('book.'.$i.'.author',['value'=>$value->book->author]);
            // echo $this->Form->control('book.'.$i.'.publisher',['value'=>$value->book->publisher_id]);
            // echo $this->Form->control('book.'.$i.'.publish_date',['value'=>$value->book->publish_date]);
            // echo $this->Form->control('book.'.$i.'.arrival_date',['value'=>$value->arrival_date]);
            // echo $this->Form->control('book.'.$i.'.delete_date',['value'=>$value->delete_date]);
            // echo $this->Form->control('book.'.$i.'.state',['value'=>$value->state]);
            $i++;
            echo '<hr>';
          }

        ?>
      </table>

    </div>

    <div id="right_under">

      <button class="under_button">情報検索画面へ</button>
    </div>
