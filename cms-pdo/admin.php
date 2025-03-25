<?php
  include "partials/admin/header.php";
  include "partials/admin/navbar.php";

  $user = new User();

 

  $artcle = new Article();
  $userId = $_SESSION['user_id'];
  $userArticles = $artcle->getArticlesByUser($userId);




 ?>


    <!-- Main Content -->
    <main class="container my-5">
        <h2 class="mb-4">Welcome <?php echo $_SESSION['username']; ?> to your Admin Dashboard</h2>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <form class="d-flex align-items-center" action="<?php echo base_url('create-dumm-articles.php') ?>" method="post">
                <label class="form-label me-2" for="articleCount">Number of Articles</label>
                <input id="articleCount" min="1" style="width: 100px;" class="form-control me-2" name="article_count" type="number">
                <button id="articleCount" class="btn btn-primary" type="submit">Generate Articles</button>
            </form>

            <form action="<?php echo base_url('reorder-articles.php') ?>" method="post">
                <button name="reorder_articles" class="btn btn-warning" type="submit">Reorder Article ID's</button>
            </form>

            <button id="deleteSelectedBtn" class="btn btn-danger">Delete Selected Articles</button>

        </div>

        <!-- Articles Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Excerpt</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>AJAX Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($userArticles)): ?>

                        <?php foreach($userArticles as $articleItem): ?>
                    <!-- Example Article Row -->
                    <tr>
                        <td><input type="checkbox" class="articleCheckbox" value="<?php echo $articleItem->id; ?>"></td>
                        <td><?php echo $articleItem->id; ?></td>
                        <td><?php echo $articleItem->title; ?></td>
                        <td><?php echo $_SESSION['username']; ?></td>
                        <td><?php echo $artcle->formatCreatedAt($articleItem->created_at); ?></td>
                        <td>
                        <?php echo $artcle->getExcerpt($articleItem->content); ?>
                        </td>
                        <td>
                            <a href="edit-article.php?id=<?php echo $articleItem->id; ?>" class="btn btn-sm btn-primary me-1">Edit</a>
                        </td>
                        <td>
                        <form onsubmit="confirmDelete(<?php echo $articleItem->id; ?>)" method="POST" action="<?php echo base_url("deleted_article.php"); ?>">
                                <input name="id" value="<?php echo $articleItem->id; ?>" type="hidden">
                            <!-- <button class="btn btn-sm btn-danger" onclick="confirmDelete(1)">Delete</button> -->
                            <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        <td> <button data-id="<?php echo $articleItem->id; ?>" class="btn btn-sm btn-danger delete-single">Ajax delete</button> </td>
                    </tr>
                    <?php endforeach ?>
                 <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>

        // Select or Deselect all checkboxes
        document.getElementById('selectAll').onclick = function(){
            let checkboxes = document.querySelectorAll('.articleCheckbox');

            for (let checkbox of checkboxes){
                checkbox.checked = this.checked;
            }
        };

        document.getElementById('deleteSelectedBtn').onclick =function(){
            let selectIds = [];
            let checkboxes = document.querySelectorAll('.articleCheckbox:checked');

            checkboxes.forEach((checkbox) => {
                selectIds.push(checkbox.value)
            });

            if(selectIds.length === 0){
                alert("Hey! SELECT 1 At Least...");
                return;
            }
                if(confirm("Are you sure you want to delete this artcle ?")){
                    sendDeleteRequest(selectIds)
                }

            }


                document.querySelectorAll('.delete-single').forEach((button) =>{
                    button.onclick = function(){

                        let articleId = this.getAttribute('data-id');
                        if(confirm("Are you sure you want to delete this artcle " + articleId + ' ?')){
                        sendDeleteRequest([articleId])
                     }
                    }
                })

                function sendDeleteRequest(articleIds){
                    
                }

        
    </script>

    <?php
  include "partials/admin/footer.php";
 ?>