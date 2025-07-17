<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #EEEFF3;
      width: 100vw;
      height: 100vh;
      min-height: 100vh;
      font-family: Montserrat, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .container {
      width: 90vw;
      max-width: 1200px;
      height: 80vh;
      min-height: 600px;
      background: #EEEFF3;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 40px;
      border-radius: 30px;
      box-sizing: border-box;
    }
    .left {
      flex: 2;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .left-title {
      color: #324BA6;
      font-size: 3.5vw;
      font-weight: 700;
      line-height: 1.1;
      margin-bottom: 1vw;
    }
    .left-desc {
      color: #324BA6;
      font-size: 1.2vw;
      font-weight: 700;
    }
    .form-card {
      flex: 1;
      background: #fff;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
      border-radius: 32px;
      padding: 40px 32px;
      display: flex;
      flex-direction: column;
      min-width: 340px;
      max-width: 370px;
      min-height: 350px;
      gap: 18px;
      justify-content: center;
    }
    .form-card label {
      color: #324BA6;
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 6px;
    }
    .form-card input {
      width: 100%;
      border: none;
      border-bottom: 1.5px solid #000;
      font-size: 1rem;
      margin-bottom: 18px;
      outline: none;
      background: transparent;
      font-family: Montserrat, sans-serif;
      padding: 6px 0;
    }
    .form-card button {
      width: 100%;
      height: 44px;
      background: #091F5B;
      border-radius: 16px;
      color: #F2F1DF;
      font-size: 1.1rem;
      font-family: Montserrat, sans-serif;
      font-weight: 700;
      border: none;
      margin-bottom: 10px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
    }
    .form-card button[type="button"] {
      font-size: 1rem;
      margin-bottom: 0;
      background: #091F5B;
      color: #F2F1DF;
    }
    .google-icon {
      display: inline-block;
      width: 22px;
      height: 22px;
      background: #fff;
      border-radius: 50%;
      margin-right: 10px;
      color: #324BA6;
      font-size: 1.1rem;
      text-align: center;
      line-height: 22px;
      font-weight: bold;
      border: 1.5px solid #324BA6;
    }
    @media (max-width: 900px) {
      .container {
        flex-direction: column;
        height: auto;
        min-height: unset;
        gap: 20px;
      }
      .left-title {
        font-size: 2rem;
      }
      .left-desc {
        font-size: 1rem;
      }
      .form-card {
        min-width: 220px;
        max-width: 100vw;
        padding: 24px 12px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left">
      <div class="left-title">
        Login to<br>continue
      </div>
    </div>
    <form class="form-card" id="loginForm">
      <label for="email">email</label>
      <input id="email" name="email" type="email" required>
      <label for="password">password</label>
      <input id="password" name="password" type="password" required>
      <button type="submit">login</button>
      <button type="button">
        <span class="google-icon">G</span>
        continue with google
      </button>
    </form>
    <script>
      document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Mengubah tujuan pengalihan ke halaman beranda (homepage)
        window.location.href = '/'; 
      });
    </script>
  </div>
</body>
</html>
