<?php
require_once __DIR__ . '/includes/database.php';

$database = new \Portfolio\Database();
$connection = $database->connect();

$stmt = $connection->prepare(
  'SELECT project_id, title, description, category, date, url_path
   FROM projects
   ORDER BY date DESC'
);
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

function categoryClass($category) {
  $c = strtolower(trim($category ?? ''));
  $c = preg_replace('/[^a-z0-9]+/', '-', $c);
  return trim($c, '-');
}

function projectLink($p) {
  $base = '/Ng_JustineNathalie_Portfolio/';
  $id = (int)($p['project_id'] ?? 0);

  if ($id === 1) {
    return $base . 'squeezit.php';
  }

  if ($id === 2) {
    return $base . 'seven.php';
  }

  $path = trim($p['url_path'] ?? '');
  if ($path !== '') {
    if (preg_match('#^(https?://|/)#', $path)) {
      return $path;
    }
    return $base . ltrim($path, '/');
  }

  return $base . 'single_project.php?id=' . $id;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/main.css">
  <title>JN Designs Portfolio – Project Page</title>
</head>

<body data-page="project" class="site">
  <h1 class="hidden">JN Designs Portfolio Website</h1>

  <div id="sticky-nav-con">
    <header class="head">
      <div class="logo">
        <a href="index.html">
          <img src="images/FinalLogo_JN.png" alt="JN Designs Logo">
        </a>
      </div>

      <nav id="main-nav">
        <button class="burger-btn" id="burger-button"><i class="fa fa-bars"></i></button>

        <div id="burger-con" class="menu-panel">
          <ul class="menu-list">
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT ME</a></li>
            <li><a href="project.php">WORKS</a></li>
            <li><a href="docs/Ng_JustineNathalie_Resume.pdf" target="_blank">RESUME</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </div>

  <main>
    <section class="works" id="works">
      <div class="grid-con" id="works-grid">
        <div class="col-span-full m-col-start-2 m-col-end-12 l-col-start-2 l-col-end-12 works-inner" id="works-inner">

          <header class="works-header" id="works-header">
            <h2 class="works-heading" id="works-heading">Featured Work</h2>
            <p class="works-intro" id="works-intro">
              A peek into my world of design, storytelling, and digital play.
            </p>
          </header>

          <div class="works-row" id="works-row">

            <div class="work-column branding">
              <a href="seven.html" class="work-link">
                <div class="work-item">
                  <div class="work-photo-box">
                    <div class="work-thumb">
                      <img src="images/Seven_Cover.png" alt="SEVEN Pet Care branding preview" class="work-img">
                    </div>
                  </div>
                  <h3 class="work-title">SEVEN Pet Care</h3>
                  <p class="work-text">SEVEN is a gentle, nature-inspired pet-care brand built around the idea of “seven days of pet love.”</p>
                </div>
              </a>
            </div>

            <div class="work-column branding">
              <a href="squeezit.html" class="work-link">
                <div class="work-item">
                  <div class="work-photo-box">
                    <div class="work-thumb">
                      <img src="images/Squeezit_Cover.png" alt="Squeez It branding preview" class="work-img">
                    </div>
                  </div>
                  <h3 class="work-title">Squeez It!</h3>
                  <p class="work-text">Squeezit is a character-driven rebrand of a fruit-flavoured juice drink, created to feel like a tiny playground in a bottle.</p>
                </div>
              </a>
            </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="site-footer">
    <div class="footer-inner">
      <p>Created by J. Nathalie ©2024</p>

      <div class="footer-icons">
        <a href="https://www.linkedin.com/in/jnathalieng" target="_blank"><img src="images/Linkedin.png" alt="LinkedIn icon"></a>
        <a href="#"><img src="images/Facebook.png" alt="Facebook icon"></a>
        <a href="https://www.instagram.com/jnathalieng" target="_blank"><img src="images/Instagram.png" alt="Instagram icon"></a>
        <a href="#"><img src="images/Youtube.png" alt="YouTube icon"></a>
        <a href="mailto:ngjnathalie.ca@gmail.com"><img src="images/Email.png" alt="Email icon"></a>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script type="module" src="js/main.js"></script>
</body>
</html>