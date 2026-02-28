<?php
require_once __DIR__ . '/includes/database.php';

$database = new \Portfolio\Database();
$connection = $database->connect();

$stmt = $connection->prepare(
  'SELECT project_id, title, description, category, image_path, page_link
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

  $path = trim($p['page_link'] ?? '');
  if ($path !== '') {
    if (preg_match('#^(https?://|/)#', $path)) {
      return $path;
    }
    return $base . ltrim($path, '/');
  }

  return '#';
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

            <?php foreach ($projects as $project): ?>
              <div class="works-column <?php echo htmlspecialchars(categoryClass($project['category'])); ?>">
                <a href="<?php echo htmlspecialchars(projectLink($project)); ?>" class="works-link">
                  <div class="works-item">
                    <div class="works-photo-box">
                      <div class="works-thumb">
                        <img
                          src="images/<?php echo htmlspecialchars($project['image_path']); ?>"
                          alt="<?php echo htmlspecialchars($project['title']); ?> preview"
                          class="works-img">
                      </div>
                    </div>
                    <h3 class="works-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                    <p class="works-text"><?php echo htmlspecialchars($project['description']); ?></p>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>

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