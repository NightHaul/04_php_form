<?php
include('../_parts/header.php');
session_start();
unset($_SESSION['form_data']);
?>


<div class="contact">
  <h1>お問い合わせ</h1>
  <form method="POST" action="">
    <p>お問い合わせ頂きありがとうございます。<br>
    送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
    なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
    </p>
    <a href="http://localhost/04_php_form/index.php/">トップへ戻る</a>
    </div>

    <?php
include('../_parts/footer.php')
?>