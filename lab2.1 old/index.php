<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Website Layout</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="index.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <nav
      id="header"
      class="navbar navbar-expand-lg navbar-light bg-success p-4 gap-3"
    >
      <h1 class="font-weight-bold text-white h1 mr-2" href="#">ActorWiki</h1>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=home">Home</a>
            </li>
            <li class="dropdown">
            <button type="button" class="btn text-white" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Bottom popover">
              Products
            </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Shirt</a></li>
                    <li><a class="dropdown-item" href="#">Movies</a></li>
                    <li><a class="dropdown-item" href="#">Actor's sign</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=detail">Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=review">Review</a>
            </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" />
        </form>
        <div class="d-flex gap-3">
          <a href="#" class="btn btn-outline-light">Login</a>
          <a href="#" class="btn btn-outline-light">Sign up</a>
        </div>
      </div>
    </nav>

    <div
      class="container-fluid mt-3 mb-3 row d-flex justify-content-center align-items-center h-100"
    >
      <main id="main-content" class="col-md-9 col-lg-10 row d-flex">
        <!-- Main content goes here -->
        <?php
// Check if the 'page' parameter exists in the URL
          $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default to 'home' if no page is set

          // Define the base path for your pages folder
          $base_path = 'pages/';

          // Determine the file to include based on the page
          switch ($page) {
                case 'about':
                    $file_path = $base_path . 'about/about.php';
                    break;
                case 'contact':
                    $file_path = $base_path . 'contact/contact.php';
                    break;
                case 'detail':
                    $file_path = $base_path . 'detail/detail.php';
                    break;
                case 'review':
                    $file_path = $base_path . 'review/review.php';
                      break;
                default:
                    $file_path = $base_path . 'home/home.php';
                    break;
        }

          // Check if the file exists before including it
          if (file_exists($file_path)) {
              include $file_path;
          } else {
              // Display a user-friendly error message if the file is missing
              echo "<h2>404 - Page not found</h2>";
              echo "<p>The page you are looking for does not exist.</p>";
          }
          ?>
      </main>
    </div>

    <footer id="footer" class="bg-success text-white text-center py-3">
      Footer
    </footer>

    <script src="index.js"></script>
  </body>
</html>
