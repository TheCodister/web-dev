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
  <nav id="header" class="navbar navbar-expand-lg navbar-light bg-success p-4 gap-3">
    <h1 class="font-weight-bold text-white h1 mr-2" href="#">ActorWiki</h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=addactor">Add Actor</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" />
        </form>
        <div class="d-flex gap-3">
            <?php if (isset($_COOKIE['username'])): ?>
                <div class="avatar text-white rounded-circle d-flex align-items-center justify-content-center border border-white" style="cursor: pointer; width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                    <?= strtoupper(substr($_COOKIE['username'], 0, 1)) ?>
                </div>
                <a href="index.php?page=signout" class="btn btn-outline-light">Sign out</a>
            <?php else: ?>
                <a href="index.php?page=login" class="btn btn-outline-light">Login</a>
                <a href="index.php?page=signup" class="btn btn-outline-light">Sign up</a>
            <?php endif; ?>
        </div>
    </div>
</nav>


    <div
      class="container-fluid mt-3 mb-3 d-flex justify-content-center"
    >
      <main id="main-content" class="col-md-9 col-lg-10 row d-flex gap-5 mt-5 justify-content-center">
        <!-- Main content goes here -->
        <?php include 'controllers/RouteController.php'; ?>
      </main>
    </div>

    <!-- <footer id="footer" class="bg-success text-white text-center py-3">
      Footer
    </footer> -->
  </body>
</html>
