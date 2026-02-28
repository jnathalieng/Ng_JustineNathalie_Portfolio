<?php
session_start();

require_once __DIR__ . '/../includes/database.php';

$database = new \Portfolio\Database();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $results = $database->query(
        'SELECT * FROM users WHERE username = :username',
        ['username' => $username]
    );

    $user = $results[0] ?? null;

    if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
        $_SESSION['logged_in_user'] = $user;
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/grid.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
</head>

<body class="site">
  <h1 class="hidden">JN Designs Portfolio Website</h1>

  <div style="text-align:center; padding:40px 0 10px 0;">
    <img src="../images/FinalLogo_JN.png" alt="JN Designs Logo" style="max-width:140px;">
  </div>

  <main class="site-main">
    <section class="contact-wrapper">
      <div class="grid-con">
        <div class="col-span-full contact-card-outer">
          <div class="contact-card-inner">
            <div class="contact-inner-outline"></div>

            <div class="contact-thankyou">
              <h2 class="contact-thankyou-title">CMS Login</h2>
              <p class="contact-thankyou-text">Access your portfolio dashboard.</p>
            </div>

            <div class="grid-con contact-grid">

              <div class="col-span-full m-col-span-5 l-col-span-5 contact-left">
                <h2 class="contact-heading">ADMIN ACCESS</h2>

                <p class="contact-copy">
                  Enter your admin credentials to manage your portfolio projects.
                </p>
              </div>

              <div class="col-span-full m-col-span-1 l-col-span-1 contact-divider"></div>

              <div class="col-span-full m-col-span-6 l-col-span-6 contact-right">

                <?php if (!empty($error)) : ?>
                  <p class="contact-required-note"><?php echo $error; ?></p>
                <?php endif; ?>

                <form method="POST">
                  <div class="contact-field-group">
                    <label class="contact-label">USERNAME:<span>*</span></label>
                    <input class="contact-input" type="text" name="username" required>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">PASSWORD:<span>*</span></label>
                    <input class="contact-input" type="password" name="password" required>
                  </div>

                  <p class="contact-required-note">**Denotes a required field.</p>

                  <div class="contact-actions">
                    <button class="contact-submit" type="submit">LOGIN</button>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

</body>
</html>