<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GOOD GAME</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="common.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div id="slider-container">
      <div class="slider">
        <div class="list">
          <div class="item active">
            <div class="content"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- LOGIN POPUP -->
     
      <div class="form-container" id="login">
        <h1>Masuk</h1>
        <div class="auth-link">
          <p>Tidak punya akun? <a href="signup.php">Daftar</a></p>
        </div>
        <form id="loginForm" action="auth/proses-login.php" method="POST">
          <div class="form-group">
            <i class="fa-solid fa-user" id="ic"></i>
            <input type="text" id="username" name="username" required />
            <label for="username">Username</label>
          </div>
          <div class="form-group">
            <i class="fa-solid fa-lock" id="ic"></i>
            <input type="password" id="password" name="password" required />
            <i
              class="fa-sharp fa-solid fa-eye"
              id="toggleIcon"
              data-target="password"
            ></i>
            <label for="password">Password</label>
          </div>
          <span class="error" id="errorValid"></span>
          <div class="options"></div>
          <button type="submit">Masuk</button>
        </form>
      </div>
    </div>

    <script src="common.js"></script>
  </body>
</html>
