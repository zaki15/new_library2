<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新宿図書館システム</title>
  <?=$this->Html->css('mainstyle.css')?>


</head>
<body>
  <div id="container">
    <div id="left">
      <div id="logo">
        <font color="white">新宿図書館システム</font>
      </div>

      <div id="search_box">
        <br>
        <input id="left_text" type="text">
        <input type="submit" value="検索"><br>
        <input type="radio"><font color="">会員</font>
        <input type="radio"><font color="">資料</font>

      </div>

      <div id="menu">
        <br>
        <a href=""><font color="black">・会員管理</font></a><br><br>
        <a href=""><font color="black">・資料管理</font></a><br><br>
        <a href=""><font color="black">・貸出</font></a><br><br>
        <a href=""><font color="black">・返却</font></a><br><br>
        <a href=""><font color="black">・予約</font></a><br><br>
        <a href=""><font color="black"><s>・督促状管理</s></font></a>
      </div>


      <div id="left_footer">
      </div>


    </div>
    <div id="right">
      <div id="content">
        <?=$this->fetch('content')?>
      </div>

    </div>




  </div>

</body>
</html>
