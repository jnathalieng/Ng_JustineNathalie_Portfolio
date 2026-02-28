<?php
require_once __DIR__ . '/includes/database.php';

$database = new \Portfolio\Database();

$results = $database->query(
    'SELECT * FROM projects WHERE project_id = :id',
    ['id' => 2]
);

$project = $results[0] ?? null;

if (!$project) {
    echo "Project not found.";
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
  <h1 class="hidden">JN Designs Portfolio Project Page</h1>

  <div id="sticky-nav-con">
    <header class="head">
      <div class="logo">
        <a href="index.php">
          <img src="images/FinalLogo_JN.png" alt="JN Designs Logo">
        </a>
      </div>

      <nav id="main-nav">
        <button class="burger-btn" id="burger-button"><i class="fa fa-bars"></i></button>
        <div id="burger-con" class="menu-panel">
          <ul class="menu-list">
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.html">ABOUT ME</a></li>
            <li><a href="project.php">WORKS</a></li>
            <li><a href="docs/Resume-JustineNg.pdf" target="_blank">RESUME</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </div>

  <main id="content">
    <section class="project-wrapper">
      <div class="grid-con">

        <div class="col-span-full m-col-start-2 m-col-end-12 l-col-start-3 l-col-end-11 project-content">

          <h2 class="project-label">PROJECT:</h2>
          <h1 class="project-title">
            <?php echo htmlspecialchars($project['title']); ?>
          </h1>

          <h2 class="project-label">ABOUT:</h2>
          <p class="project-text">
            <?php echo nl2br(htmlspecialchars($project['About'] ?? $project['description'])); ?>
          </p>

          <h2 class="project-label">CASE STUDY:</h2>

          <?php if (!empty($project['Brand-Concept'])) : ?>
            <h3 class="project-heading">Brand Concept</h3>
            <p class="project-text">
              <?php echo nl2br(htmlspecialchars($project['Brand-Concept'])); ?>
            </p>
          <?php endif; ?>

          <?php if (!empty($project['LogoDev'])) : ?>
            <h3 class="project-heading">Logo Development</h3>
            <p class="project-text">
              <?php echo nl2br(htmlspecialchars($project['LogoDev'])); ?>
            </p>
          <?php endif; ?>

          <?php if (!empty($project['Brand-Identity'])) : ?>
            <h3 class="project-heading">Brand Identity</h3>
            <p class="project-text">
              <?php echo nl2br(htmlspecialchars($project['Brand-Identity'])); ?>
            </p>
          <?php endif; ?>

          <?php if (!empty($project['Packaging'])) : ?>
            <h3 class="project-heading">Packaging</h3>
            <p class="project-text">
              <?php echo nl2br(htmlspecialchars($project['Packaging'])); ?>
            </p>
          <?php endif; ?>

          <?php if (!empty($project['In-Context'])) : ?>
            <h3 class="project-heading">In Context</h3>
            <p class="project-text">
              <?php echo nl2br(htmlspecialchars($project['In-Context'])); ?>
            </p>
          <?php endif; ?>

          <div class="section-btn-inner">
            <a href="project.html" class="section-learn-btn">Back to Work Page</a>
          </div>

        </div>
      </div>
    </section>
  </main>

  <footer id="site-footer">
    <div class="footer-inner">
      <p>Created by J. Nathalie ©2024</p>
      <div class="footer-icons">
        <a href="www.linkedin.com/in/jnathalieng"><img src="images/Linkedin.png" alt="LinkedIn icon"></a>
        <a href="#"><img src="images/Facebook.png" alt="Facebook icon"></a>
        <a href="www.instagram.com/jnathalieng"><img src="images/Instagram.png" alt="Instagram icon"></a>
        <a href="#"><img src="images/Youtube.png" alt="YouTube icon"></a>
        <a href="mailto:ngjnathalie.ca@gmail.com"><img src="images/Email.png" alt="Email icon"></a>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>