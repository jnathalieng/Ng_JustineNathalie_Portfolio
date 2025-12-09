<?php
require_once 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/main.css">
  <title>JN Designs Portfolio</title>
</head>

<body class="site">
  <h1 class="hidden">JN Designs Portfolio Website</h1>

  <div id="sticky-nav-con">
    <header class="head">
      <div class="logo">
        <img src="images/FinalLogo_JN.png" alt="JN Designs Logo">
      </div>

      <nav id="main-nav">
        <button class="burger-btn" id="burger-button">
          <i class="fa fa-bars"></i>
        </button>

        <div id="burger-con" class="menu-panel">
          <ul class="menu-list">
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT ME</a></li>
            <li><a href="work.html">WORKS</a></li>
            <li><a href="docs/Resume-JustineNg.pdf" target="_blank">RESUME</a></li>
            <li><a href="contact.php" class="active">CONTACT</a></li>
          </ul>
        </div>
      </nav>
    </header>
  </div>

  <main class="site-main">
    <section class="contact-wrapper">
      <div class="grid-con">
        <div class="col-span-full contact-card-outer">
          <div class="contact-card-inner">
            <div class="contact-inner-outline"></div>

            <?php if (isset($_GET['success'])): ?>
              <div class="contact-thankyou">
                <h2 class="contact-thankyou-title">Thank you :)</h2>
                <p class="contact-thankyou-text">Your message has been sent successfully.</p>
              </div>
            <?php elseif (isset($_GET['error'])): ?>
              <div class="contact-error-box">
                <h2 class="contact-error-title">Oops…</h2>
                <p class="contact-error-text">Please fill in all required fields.</p>
              </div>
            <?php endif; ?>

            <div class="grid-con contact-grid">

              <div class="col-span-full m-col-span-5 l-col-span-5 contact-left">
                <h2 class="contact-heading">CONTACT ME</h2>

                <p class="contact-copy">
                  If you’d like to make an enquiry, please feel free to get in touch,
                  and I will respond as soon as possible.
                </p>

                <p class="contact-copy">
                  If you prefer to contact me directly, send your email to:<br>
                  ngjnathalie.ca@gmail.com
                </p>
              </div>

              <div class="col-span-full m-col-span-1 l-col-span-1 contact-divider"></div>

              <div class="col-span-full m-col-span-6 l-col-span-6 contact-right">
                <form action="includes/send.php" method="POST">
                  <div class="contact-field-group">
                    <label class="contact-label">NAME:<span>*</span></label>
                    <input class="contact-input" type="text" name="name" placeholder="Your Name" required>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">EMAIL:<span>*</span></label>
                    <input class="contact-input" type="email" name="email" placeholder="Your Email Address" required>
                  </div>

                  <div class="contact-field-group">
                    <div class="contact-message-row">
                      <label class="contact-label">MESSAGE:<span>*</span></label>
                      <span class="contact-char-note">(1000 Characters)</span>
                    </div>
                    <textarea class="contact-textarea" name="message" placeholder="Your Message" maxlength="1000" required></textarea>
                  </div>

                  <p class="contact-required-note">**Denotes a required field.</p>

                  <div class="contact-actions">
                    <button class="contact-submit" type="submit" name="submit">SEND</button>
                  </div>
                </form>
              </div>

            </div>
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
