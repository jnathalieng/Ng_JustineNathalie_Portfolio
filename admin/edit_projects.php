<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../includes/Database.php';

$database = new \Portfolio\Database();

$error = '';
$isEdit = false;

$id = (int)($_GET['id'] ?? 0);

$project = [
    'project_id' => 0,
    'title' => '',
    'description' => '',
    'date' => '',
    'category' => '',
    'page_link' => '',
    'image_path' => '',
    'About' => '',
    'Brand-Concept' => '',
    'LogoDev' => '',
    'Brand-Identity' => '',
    'Packaging' => '',
    'In-Context' => ''
];

if ($id > 0) {
    $results = $database->query(
        'SELECT * FROM projects WHERE project_id = :id',
        ['id' => $id]
    );

    $found = $results[0] ?? null;

    if (!$found) {
        header('Location: dashboard.php');
        exit;
    }

    $project = $found;
    $isEdit = true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $postedId = (int)($_POST['project_id'] ?? 0);

    $data = [
        'title' => trim($_POST['title'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'date' => trim($_POST['date'] ?? ''),
        'category' => trim($_POST['category'] ?? ''),
        'page_link' => trim($_POST['page_link'] ?? ''),
        'image_path' => trim($_POST['image_path'] ?? ''),
        'About' => trim($_POST['About'] ?? ''),
        'BrandConcept' => trim($_POST['BrandConcept'] ?? ''),
        'LogoDev' => trim($_POST['LogoDev'] ?? ''),
        'BrandIdentity' => trim($_POST['BrandIdentity'] ?? ''),
        'Packaging' => trim($_POST['Packaging'] ?? ''),
        'InContext' => trim($_POST['InContext'] ?? '')
    ];

    if ($data['title'] === '' || $data['description'] === '') {
        $error = 'Title and description are required.';
    } else {

        if ($postedId > 0) {
            $database->query(
                'UPDATE projects
                 SET title = :title,
                     description = :description,
                     date = :date,
                     category = :category,
                     page_link = :page_link,
                     image_path = :image_path,
                     About = :About,
                     `Brand-Concept` = :BrandConcept,
                     LogoDev = :LogoDev,
                     `Brand-Identity` = :BrandIdentity,
                     Packaging = :Packaging,
                     `In-Context` = :InContext
                 WHERE project_id = :id',
                $data + ['id' => $postedId]
            );
        } else {
            $database->query(
                'INSERT INTO projects
                 (title, description, date, category, page_link, image_path, About,
                  `Brand-Concept`, LogoDev, `Brand-Identity`, Packaging, `In-Context`)
                 VALUES
                 (:title, :description, :date, :category, :page_link, :image_path, :About,
                  :BrandConcept, :LogoDev, :BrandIdentity, :Packaging, :InContext)',
                $data
            );
        }

        header('Location: dashboard.php');
        exit;
    }
    
    $project['project_id'] = $postedId;
    $project['title'] = $data['title'];
    $project['description'] = $data['description'];
    $project['date'] = $data['date'];
    $project['category'] = $data['category'];
    $project['page_link'] = $data['page_link'];
    $project['image_path'] = $data['image_path'];
    $project['About'] = $data['About'];
    $project['Brand-Concept'] = $data['BrandConcept'];
    $project['LogoDev'] = $data['LogoDev'];
    $project['Brand-Identity'] = $data['BrandIdentity'];
    $project['Packaging'] = $data['Packaging'];
    $project['In-Context'] = $data['InContext'];

    $isEdit = ($postedId > 0);
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
  <main class="site-main">
    <section class="contact-wrapper">
      <div class="grid-con">
        <div class="col-span-full contact-card-outer">
          <div class="contact-card-inner">
            <div class="contact-inner-outline"></div>

            <div class="contact-thankyou">
              <h2 class="contact-thankyou-title"><?php echo $isEdit ? 'Edit Project' : 'Add Project'; ?></h2>
              <p class="contact-thankyou-text">
                <?php echo $isEdit ? htmlspecialchars($project['title'] ?? '') : 'Create a new project.'; ?>
              </p>
            </div>

            <div class="grid-con contact-grid">

              <div class="col-span-full m-col-span-5 l-col-span-5 contact-left">
                <h2 class="contact-heading"><?php echo $isEdit ? 'EDIT DETAILS' : 'NEW PROJECT'; ?></h2>

                <div class="contact-actions" style="display:flex; gap:12px; flex-wrap:wrap; margin-top:16px;">
                  <button class="contact-submit" type="button" onclick="window.location.href='dashboard.php'">
                    BACK TO DASHBOARD
                  </button>
                </div>
              </div>

              <div class="col-span-full m-col-span-1 l-col-span-1 contact-divider"></div>

              <div class="col-span-full m-col-span-6 l-col-span-6 contact-right">

                <?php if ($error !== '') : ?>
                  <p class="contact-required-note"><?php echo $error; ?></p>
                <?php endif; ?>

                <form method="POST">
                  <input type="hidden" name="project_id" value="<?php echo (int)($project['project_id'] ?? 0); ?>">

                  <div class="contact-field-group">
                    <label class="contact-label">TITLE:<span>*</span></label>
                    <input class="contact-input" type="text" name="title" required value="<?php echo htmlspecialchars($project['title'] ?? ''); ?>">
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">DESCRIPTION:<span>*</span></label>
                    <textarea class="contact-textarea" name="description" required><?php echo htmlspecialchars($project['description'] ?? ''); ?></textarea>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">DATE:</label>
                    <input class="contact-input" type="date" name="date" value="<?php echo htmlspecialchars($project['date'] ?? ''); ?>">
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">CATEGORY:</label>
                    <input class="contact-input" type="text" name="category" value="<?php echo htmlspecialchars($project['category'] ?? ''); ?>">
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">PAGE LINK:</label>
                    <input class="contact-input" type="text" name="page_link" value="<?php echo htmlspecialchars($project['page_link'] ?? ''); ?>" placeholder="seven.php">
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">IMAGE PATH:</label>
                    <input class="contact-input" type="text" name="image_path" value="<?php echo htmlspecialchars($project['image_path'] ?? ''); ?>" placeholder="images/Seven_Cover.png">
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">ABOUT:</label>
                    <textarea class="contact-textarea" name="About"><?php echo htmlspecialchars($project['About'] ?? ''); ?></textarea>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">BRAND CONCEPT:</label>
                    <textarea class="contact-textarea" name="BrandConcept"><?php echo htmlspecialchars($project['Brand-Concept'] ?? ''); ?></textarea>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">LOGO DEV:</label>
                    <textarea class="contact-textarea" name="LogoDev"><?php echo htmlspecialchars($project['LogoDev'] ?? ''); ?></textarea>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">BRAND IDENTITY:</label>
                    <textarea class="contact-textarea" name="BrandIdentity"><?php echo htmlspecialchars($project['Brand-Identity'] ?? ''); ?></textarea>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">PACKAGING:</label>
                    <textarea class="contact-textarea" name="Packaging"><?php echo htmlspecialchars($project['Packaging'] ?? ''); ?></textarea>
                  </div>

                  <div class="contact-field-group">
                    <label class="contact-label">IN CONTEXT:</label>
                    <textarea class="contact-textarea" name="InContext"><?php echo htmlspecialchars($project['In-Context'] ?? ''); ?></textarea>
                  </div>

                  <p class="contact-required-note">**Denotes a required field.</p>

                  <div class="contact-actions" style="display:flex; gap:12px; flex-wrap:wrap;">
                    <button class="contact-submit" type="submit"><?php echo $isEdit ? 'UPDATE' : 'ADD'; ?></button>

                    <button class="contact-submit" type="button" onclick="window.location.href='dashboard.php'">
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