<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Sign Up</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Nama Depan</label>
            <input type="text" name="fname" placeholder="ex: Kaela" required>
          </div>
          <div class="field input">
            <label>Nama Belakang</label>
            <input type="text" name="lname" placeholder="ex: Kovalskia" required>
          </div>
        </div>
        <div class="field input">
          <label>Alamat Email</label>
          <input type="email" name="email" placeholder="ex: ehe@email.id" required>
        </div>
        <div class="field input">
          <label>Sandi</label>
          <input type="password" name="pword" placeholder="ex: simp4u" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Pilih Fotomu</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Lanjut Chatting">
        </div>
      </form>
      <div class="link">Sudah sign up? <a href="login.php">Login sekarang!</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
