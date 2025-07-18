<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Findor</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: #EEEFF3;
      overflow: hidden; /* Supaya tidak bisa scroll */
    }
    body {
      width: 100vw;
      height: 100vh;
      box-sizing: border-box;
      font-family: Montserrat, Arial, sans-serif;
    }
    .main-container {
      width: 100vw;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .promo {
      color: #3454b4;
      font-size: 2.5vw;
      font-weight: bold;
      margin-right: 40px;
      max-width: 320px;
      line-height: 1.1;
    }
    .form-bg {
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 8px 32px rgba(44, 62, 80, 0.12);
      padding: 20px 18px 16px 18px;
      width: 270px;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }
    .form-bg label {
      font-weight: bold;
      color: #3454b4;
      font-size: 13px;
      margin-bottom: 1px;
      margin-top: 7px;
    }
    .form-bg input {
      border: none;
      border-bottom: 2px solid #3454b4;
      background: transparent;
      padding: 6px 2px;
      font-size: 13px;
      outline: none;
      margin-bottom: 4px;
    }
    .form-bg button[type="submit"] {
      margin-top: 12px;
      background: #10296a;
      color: #fff;
      font-weight: bold;
      font-size: 15px;
      border: none;
      border-radius: 18px;
      padding: 8px 0;
      cursor: pointer;
      transition: background 0.2s;
    }
    .form-bg button[type="submit"]:hover {
      background: #3454b4;
    }
    .form-bg button[type="button"] {
      margin-top: 6px;
      background: #10296a;
      color: #fff;
      font-weight: 500;
      font-size: 13px;
      border: none;
      border-radius: 18px;
      padding: 8px 0;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }
    .form-bg button[type="button"] span {
      display: inline-block;
      width: 16px;
      height: 16px;
      background: url('https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg') no-repeat center/contain;
      margin-right: 4px;
    }
    @media (max-width: 700px) {
      .main-container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0;
      }
      .promo {
        font-size: 5vw;
        max-width: 90vw;
        margin-right: 0;
        margin-bottom: 18px;
        text-align: center;
      }
      .form-bg {
        width: 90vw;
        max-width: 320px;
        padding: 10px 2vw 10px 2vw;
      }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <div class="promo">
      signup<br>and get a <br>first free ride!
    </div>
    <!-- Menambahkan atribut action dan method untuk semantik form yang lebih baik.
         Perhatikan: onsubmit masih akan mengesampingkan pengiriman form standar. -->
    <form class="form-bg" autocomplete="off" onsubmit="event.preventDefault(); window.location.href='/login';" method="POST" action="/register">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="phone">No.TLP</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <label for="retype-password">Retype-password</label>
      <input type="password" id="retype-password" name="retype-password" placeholder="Retype your password" required>

      <label for="address">Alamat</label>
      <input type="text" id="address" name="alamat" placeholder="Enter your address" required>

      <button type="submit">signup</button>
      <button type="button" name="google-signup-button">
        <span></span>
        continue with google
      </button>
    </form>
  </div>
</body>
</html>
