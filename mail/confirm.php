<?php
include('../_parts/header.php');

error_reporting(E_ALL & ~E_NOTICE);

session_start();
$name = $_SESSION['form_data']['name'];
$huri = $_SESSION['form_data']['huri'];
$tel = $_SESSION['form_data']['tel'];
$email = $_SESSION['form_data']['email'];
$memo = $_SESSION['form_data']['memo'];




function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
?>

<div class="contact">
  <h1>お問い合わせ</h1>
  <form method="POST" action="complete.php">
    <p>下記の内容をご確認の上送信ボタンを押してください<br>
      内容を訂正する場合は戻るを押してください。
    </p>
    <div class="confirm">
      <p>氏名</p>
      <?php echo h($name); ?>

      <p>フリガナ</p>
      <?php echo h($huri); ?>


      <p>電話番号</p>
      <p>
        <?php echo h($tel); ?>
      </p>

      <p>メールアドレス<span>*</span></p>
      <p>
        <?php echo h($email); ?>
      </p>

      <p>お問い合わせ内容</p>

      <?php echo h($memo); ?>
      <div class="con_btn">
        <button type="submit">送 信</button>
        <a href="contact.php" class="modoru">戻 る</a>
      </div>

    </div>
  </form>
</div>


<?php
include('../_parts/footer.php')
?>