<?php
include('../_parts/header.php');
?>

<?php

error_reporting(E_ALL & ~E_NOTICE);

session_start();



function h($s){
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}



if($_SERVER['REQUEST_METHOD'] == "POST"){



  $name = $_POST['name'];
  $huri = $_POST['huri'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $memo = $_POST['memo'];
  $error = [];




  if(mb_strlen($name) > 10 || $name == ''){
    $error['name'] = '氏名は必須入力です。10文字以内でご入力ください。';

  }

  if(mb_strlen($huri) > 10 || $huri == ''){
    $error['huri'] = 'フリガナは必須入力です。10文字以内でご入力ください。';

  }

  if (!ctype_digit($tel)) {
    $error['tel'] = "電話番号0-9の数字のみ入力してください。";

  }
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == ''){
    $error['email'] = 'メールアドレスは正しくご入力ください。';

  }

  if(trim($memo) == ''){
    $error['memo'] = 'お問い合わせ内容は必須項目です。';

  }
  if(!empty($error)){
    $error_message = implode('\n', $error);
    echo '<script>alert("'.$error_message.'")</script>';
  }

  



  if(empty($error)){
    $_SESSION['form_data'] = $_POST;
    header("Location: confirm.php");
    exit();
  }else{
  if(isset($_SESSION['form_data'])){
    $name = $_SESSION['form_data']['name'];
    $huri = $_SESSION['form_data']['huri'];
    $tel = $_SESSION['form_data']['tel'];
    $email = $_SESSION['form_data']['email'];
    $memo = $_SESSION['form_data']['memo'];
  }
} 

?>
<div class="contact">
<h1>お問い合わせ</h1>
<form method="POST" action="">
  <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
  <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br>
<span>*</span>は必須項目となります。</p>

  <p>氏名<span>*</span></p>
  <p>
  <?php if($error['name']) {echo '<span style="color:red;">' . h($error['name']) . '</span>';}?>
    <input type="text" name="name" value="<?php echo h($name);?>" placeholder="山田太郎">
  </p>

  <p>フリガナ<span>*</span></p>
  <p>
  <?php if($error['huri']) {echo '<span style="color:red;">' . h($error['huri']) . '</span>';}?>
    <input type="text" name="huri" value="<?php echo h($huri);?>" placeholder="ヤマダタロウ">
  </p>

  <p>電話番号</p>
  <p>
  <?php if($error['tel']) {echo '<span style="color:red;">' . h($error['tel']) . '</span>';}?>
    <input type="text" name="tel" value="<?php echo h($tel);?>" placeholder="090123456789">
  </p>

  <p>メールアドレス<span>*</span></p>
  <p>
  <?php if($error['email']) {echo '<span style="color:red;">' . h($error['email']) . '</span>';}?>
    <input type="text" name="email" value="<?php echo h($email);?>" placeholder="test@test.co.jp">
</p>

  <p class="nr">お問い合わせ内容をご記入ください<span>*</span></p>
  <p>
    <?php if(isset($error['memo'])) {echo '<span style="color:red;">' . h($error['memo']) . '</span>';}?>
    <textarea name="memo" cols="300" rows="20"> <?php echo h($memo);?></textarea>
    </p>
  <button type="submit">送信</button>

</form>

</div>

<?php
include('../_parts/footer.php')
?>