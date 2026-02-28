<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../includes/database.php';

$database = new \Portfolio\Database();
$connection = $database->connect();

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: projects.php');
    exit;
}

$stmt = $connection->prepare('SELECT project_id, title FROM projects WHERE project_id = :id');
$stmt->execute(['id' => $id]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete = $connection->prepare('DELETE FROM projects WHERE project_id = :id');
    $delete->execute(['id' => $id]);

    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/grid.css">
  <link rel="stylesheet" href="../css/main.css">
  <title>JN Designs Portfolio - CMS Delete Project</title>
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
              <h2 class="contact-thankyou-title">Delete Project</h2>
              <p class="contact-thankyou-text">
                Are you sure you want to delete: <strong><?php echo htmlspecialchars($project['title']); ?></strong>?
              </p>
            </div>

            <div class="grid-con contact-grid">

              <div class="col-span-full m-col-span-5 l-col-span-5 contact-left">
                <h2 class="contact-heading">CONFIRM DELETE</h2>

                <p class="contact-copy">
                  This action cannot be undone.
                </p>

                <div class="contact-actions" style="display:flex; gap:12px; flex-wrap:wrap; margin-top:16px;">
                  <button class="contact-submit" type="button"
                    onclick="window.location.href='projects.php'"
                    style="text-decoration:none; display:inline-block; text-align:center;">
                    BACK TO PROJECTS
                  </button>

                  <button class="contact-submit" type="button"
                    onclick="window.location.href='dashboard.php'"
                    style="text-decoration:none; display:inline-block; text-align:center;">
                    DASHBOARD
                  </button>
                </div>
              </div>

              <div class="col-span-full m-col-span-1 l-col-span-1 contact-divider"></div>

              <div class="col-span-full m-col-span-6 l-col-span-6 contact-right">

                <form method="POST">
                  <div class="contact-actions" style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button class="contact-submit" type="submit">YES, DELETE</button>

                    <button class="contact-submit" type="button"
                      onclick="window.location.href='projects.php'"
                      style="text-decoration:none; display:inline-block; text-align:center;">
                      CANCEL
                    </button>
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