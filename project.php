<?php
require_once __DIR__ . '/includes/Database.php';

$database = new \Portfolio\Database();

$projects = $database->query(
  'SELECT project_id, title, description, category, date, page_link, image_path
   FROM projects
   ORDER BY date DESC'
);
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

            <?php if (empty($projects)) : ?>
              <p class="work-text">No projects found.</p>
            <?php else : ?>

              <?php foreach ($projects as $p) : ?>
                <?php
                  $link = trim($p['page_link'] ?? '');
                  if ($link === '') { $link = '#'; }

                  $img = trim($p['image_path'] ?? '');
                  if ($img === '') { $img = 'images/JN_Cover.png'; }

                  $title = $p['title'] ?? '';
                  $desc = $p['description'] ?? '';
                ?>

                <div class="work-column branding">
                  <a href="<?php echo htmlspecialchars($link); ?>" class="work-link">
                    <div class="work-item">
                      <div class="work-photo-box">
                        <div class="work-thumb">
                          <img
                            src="<?php echo htmlspecialchars($img); ?>"
                            alt="<?php echo htmlspecialchars($title); ?> preview"
                            class="work-img"
                          >
                        </div>
                      </div>

                      <h3 class="work-title"><?php echo htmlspecialchars($title); ?></h3>
                      <p class="work-text"><?php echo htmlspecialchars($desc); ?></p>

                    </div>
                  </a>
                </div>

              <?php endforeach; ?>

            <?php endif; ?>

          </div>

        </div>
      </div>
    </section>
  </main>

  <footer id="site-footer">
    <div class="footer-inner">
      <p>Created by J. Nathalie ©2024</p>

      <div class="footer-icons">
        <a href="https://www.linkedin.com/in/jnathalieng" target="_blank" rel="noopener">
          <img src="images/Linkedin.png" alt="LinkedIn icon">
        </a>
        <a href="#"><img src="images/Facebook.png" alt="Facebook icon"></a>
        <a href="https://www.instagram.com/jnathalieng" target="_blank" rel="noopener">
          <img src="images/Instagram.png" alt="Instagram icon">
        </a>
        <a href="#"><img src="images/Youtube.png" alt="YouTube icon"></a>
        <a href="mailto:ngjnathalie.ca@gmail.com">
          <img src="images/Email.png" alt="Email icon">
        </a>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script type="module" src="js/main.js"></script>
</body>
</html>