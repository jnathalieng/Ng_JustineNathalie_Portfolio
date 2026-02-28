<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../includes/database.php';

$database = new \Portfolio\Database();

$projects = $database->query(
    'SELECT
        project_id,
        title,
        description,
        date,
        category,
        page_link,
        About,
        `Brand-Concept`,
        LogoDev,
        `Brand-Identity`,
        Packaging,
        `In-Context`
     FROM projects
     ORDER BY project_id DESC'
);
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
    <a href="dashboard.php" style="display:inline-block;">
      <img src="../images/FinalLogo_JN.png" alt="JN Designs Logo" style="max-width:140px;">
    </a>
  </div>

  <main class="site-main">
    <section class="contact-wrapper">
      <div class="grid-con">
        <div class="col-span-full contact-card-outer">
          <div class="contact-card-inner">
            <div class="contact-inner-outline"></div>

            <div class="contact-thankyou">
              <h2 class="contact-thankyou-title">Projects</h2>
              <p class="contact-thankyou-text">View, edit, or delete projects in your portfolio database.</p>
            </div>

            <div class="grid-con contact-grid">

              <div class="col-span-full m-col-span-5 l-col-span-5 contact-left">
                <h2 class="contact-heading">CMS PANEL</h2>

                <p class="contact-copy">Add a new project or manage existing entries.</p>

                <div class="contact-actions" style="display:flex; gap:12px; flex-wrap:wrap; margin-top:16px;">
                  <a class="contact-submit" href="edit_projects.php" style="text-decoration:none; display:inline-block; text-align:center;">
                    ADD PROJECT
                  </a>

                  <a class="contact-submit" href="dashboard.php" style="text-decoration:none; display:inline-block; text-align:center;">
                    DASHBOARD
                  </a>

                  <a class="contact-submit" href="logout.php" style="text-decoration:none; display:inline-block; text-align:center;">
                    LOGOUT
                  </a>
                </div>
              </div>

              <div class="col-span-full m-col-span-1 l-col-span-1 contact-divider"></div>

              <div class="col-span-full m-col-span-6 l-col-span-6 contact-right">

                <?php if (empty($projects)) : ?>
                  <p class="contact-required-note">No projects found yet. Click "ADD PROJECT".</p>
                <?php else : ?>

                  <div style="overflow-x:auto; width:100%;">
                    <table style="width:100%; border-collapse:collapse;">
                      <thead>
                        <tr>
                          <th style="text-align:left; padding:10px 8px;">ID</th>
                          <th style="text-align:left; padding:10px 8px;">Title</th>
                          <th style="text-align:left; padding:10px 8px;">Category</th>
                          <th style="text-align:left; padding:10px 8px;">Date</th>
                          <th style="text-align:left; padding:10px 8px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($projects as $p) : ?>
                          <tr>
                            <td style="padding:10px 8px;"><?php echo (int)$p['project_id']; ?></td>
                            <td style="padding:10px 8px;"><?php echo htmlspecialchars($p['title'] ?? ''); ?></td>
                            <td style="padding:10px 8px;"><?php echo htmlspecialchars($p['category'] ?? ''); ?></td>
                            <td style="padding:10px 8px;"><?php echo htmlspecialchars($p['date'] ?? ''); ?></td>
                            <td style="padding:10px 8px; display:flex; gap:10px; flex-wrap:wrap;">
                              <a class="contact-submit"
                                 href="edit_projects.php?id=<?php echo (int)$p['project_id']; ?>"
                                 style="text-decoration:none; display:inline-block; text-align:center; padding:8px 12px;">
                                EDIT
                              </a>

                              <a class="contact-submit"
                                 href="delete_projects.php?id=<?php echo (int)$p['project_id']; ?>"
                                 style="text-decoration:none; display:inline-block; text-align:center; padding:8px 12px;">
                                DELETE
                              </a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>

                <?php endif; ?>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

</body>
</html>