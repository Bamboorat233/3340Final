<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login / Register - LinkMusic</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/main.js" defer></script>
    <style>
      .login-register-box {
        max-width: 420px;
        margin: 140px auto;
        background-color: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        font-family: sans-serif;
        position: relative;
        z-index: 1;
      }
      .login-register-box h2 {
        text-align: center;
        margin-bottom: 20px;
      }
      .login-register-box input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 6px;
        border: 1px solid #ccc;
      }
      .login-register-box button {
        width: 100%;
        padding: 12px;
        background-color: rgba(85, 41, 5, 0.8);
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
      }
      .login-register-box .toggle {
        text-align: center;
        margin-top: 16px;
        font-size: 14px;
      }
      .login-register-box .toggle a {
        color: #007bff;
        cursor: pointer;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <?php include 'siderTopBar.php'; ?>


    <div class="login-register-box">
      <h2 id="form-title">User Login</h2>
      <form action="login_register.php" method="POST">
        <input type="hidden" name="action" value="login" id="form-action" />
        <input type="text" name="username" placeholder="Username" required />
        <input
          type="password"
          name="password"
          placeholder="Password"
          required
        />
        <input
          type="email"
          name="email"
          placeholder="Email (only for register)"
          id="email-field"
          style="display: none"
        />
        <button type="submit">Submit</button>
      </form>
      <div class="toggle">
        <span id="toggle-text">
          Don't have an account? <a id="toggle-link">Register</a>
        </span>
      </div>
    </div>

    <script>
      const action = document.getElementById("form-action");
      const title = document.getElementById("form-title");
      const email = document.getElementById("email-field");
      const toggleText = document.getElementById("toggle-text");
      const toggleLink = document.getElementById("toggle-link");

      toggleLink.addEventListener("click", () => {
        if (action.value === "login") {
          action.value = "register";
          title.innerText = "User Registration";
          email.style.display = "block";
          toggleText.innerHTML =
            'Already have an account? <a id="toggle-link">Login</a>';
        } else {
          action.value = "login";
          title.innerText = "User Login";
          email.style.display = "none";
          toggleText.innerHTML =
            'Don\'t have an account? <a id="toggle-link">Register</a>';
        }
      });
    </script>
  </body>
</html>
