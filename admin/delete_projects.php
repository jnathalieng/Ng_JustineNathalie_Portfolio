<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../includes/database.php';

$database = new \Portfolio\Database();

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: dashboard.php');
    exit;
}

$results = $database->query(
    'SELECT project_id, title FROM projects WHERE project_id = :id',
    ['id' => $id]
);

$project = $results[0] ?? null;

if (!$project) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database->query(
        'DELETE FROM projects WHERE project_id = :id',
        ['id' => $id]
    );

    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">
  <title>JN Designs Portfolio</title>
  <link rel="icon" type="image/png" href="jn_favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="jn_favicon/favicon.svg" />
  <link rel="shortcut icon" href="jn_favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="jn_favicon/apple-touch-icon.png" />
  <link rel="manifest" href="jn_favicon/site.webmanifest" />
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
                    onclick="window.location.href='dashboard.php'">
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
                      onclick="window.location.href='dashboard.php'">
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