<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS PDO System</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    
    >
</head>
<body>
    <!-- Navigation Bar -->
    <?php require views_path('partials/home/navbar.php'); ?>

    <!-- Header Section -->
    <header class="bg-dark text-white py-5">
        <div class="container">
            <h1 class="display-4">Welcome to the CMS PDO System</h1>
            <p class="lead">
                Sharing insights, ideas, and stories.
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
      <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="text-muted mb-0">
                &copy; 2045 CMS PDO System. All rights reserved by Edwin Diaz from EdwinDiaz.com
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        
    ></script>
</body>
</html>
