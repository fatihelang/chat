<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Login</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Alamat Email</label>
          <input type="text" name="email" placeholder="ex: gsh@yapoo.com" required>
        </div>
        <div class="field input">
          <label>Sandi</label>
          <input type="password" name="pword" placeholder="ex: gws0987" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Lanjut Chatting">
        </div>
      </form>
      <div class="link">Belum sign up? <a href="index.php">Signup sekarang!</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
