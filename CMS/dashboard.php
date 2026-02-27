<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['logged_in_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/grid.css">
  <link rel="stylesheet" href="../css/main.css">
  <title>JN Designs Portfolio - CMS Dashboard</title>
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
              <h2 class="contact-thankyou-title">Dashboard</h2>
              <p class="contact-thankyou-text">
                Welcome back, <?php echo htmlspecialchars($user['username'] ?? 'Admin'); ?>.
              </p>
            </div>

            <div class="grid-con contact-grid">

              <div class="col-span-full m-col-span-5 l-col-span-5 contact-left">
                <h2 class="contact-heading">CMS PANEL</h2>

                <p class="contact-copy">
                  Manage your portfolio projects from here.
                </p>

                <p class="contact-copy">
                  Add a project, or view the full list to edit/delete.
                </p>
              </div>

              <div class="col-span-full m-col-span-1 l-col-span-1 contact-divider"></div>

              <div class="col-span-full m-col-span-6 l-col-span-6 contact-right">

                <div class="contact-actions" style="display:flex; gap:12px; flex-wrap:wrap;">
                  <a class="contact-submit" href="projects.php" style="text-decoration:none; display:inline-block; text-align:center;">
                    VIEW PROJECTS
                  </a>

                  <a class="contact-submit" href="edit_projects.php" style="text-decoration:none; display:inline-block; text-align:center;">
                    ADD PROJECT
                  </a>

                  <a class="contact-submit" href="logout.php" style="text-decoration:none; display:inline-block; text-align:center;">
                    LOGOUT
                  </a>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

</body>
</html>