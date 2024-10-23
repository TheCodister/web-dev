<?php
// Check if the 'page' parameter exists in the URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Default to 'home' if no page is set

          // Define the base path for your pages folder
          $base_path = __DIR__ . '/../views/';

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
                case 'signup':
                    $file_path = $base_path . 'signup/signup.php';
                      break;
                case 'login':
                    $file_path = $base_path . 'login/login.php';
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