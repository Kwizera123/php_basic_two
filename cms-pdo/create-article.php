<?php
  include "partials/admin/header.php";
  include "partials/admin/navbar.php";

  if(isPostRequest()){
    var_dump('Ok');
  }
 ?>


    <!-- Main Content -->
    <main class="container my-5">
        <h2>Create New Article</h2>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Article Title *</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Enter article title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author *</label>
                <input name="author" type="text" class="form-control" id="author" placeholder="Enter author name" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Published Date *</label>
                <input name="date" type="date" class="form-control" id="date" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content *</label>
                <textarea name="content" class="form-control" id="content" rows="10" placeholder="Enter article content" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Featured Image URL</label>
                <input name="" type="url" class="form-control" id="image" placeholder="Enter image URL">
            </div>
            <button type="submit" class="btn btn-success">Publish Article</button>
            <a href="admin.php" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </main>

    <?php
  include "partials/admin/footer.php";
 ?>