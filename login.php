<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login / Register - LinkMusic</title>
    <link rel="icon" href="images/logo.png" type="image/png" sizes="32x32" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/main.js" defer></script>
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

// 使用事件委托：监听 toggleText 上的点击事件，而不是 toggleLink 本身
toggleText.addEventListener("click", (e) => {
  if (e.target && e.target.id === "toggle-link") {
    e.preventDefault(); // 防止跳转
    if (action.value === "login") {
      action.value = "register";
      title.innerText = "User Registration";
      email.style.display = "block";
      toggleText.innerHTML =
        'Already have an account? <a id="toggle-link" href="#">Login</a>';
    } else {
      action.value = "login";
      title.innerText = "User Login";
      email.style.display = "none";
      toggleText.innerHTML =
        'Don\'t have an account? <a id="toggle-link" href="#">Register</a>';
    }
  }
});

    </script>
  </body>
</html>
