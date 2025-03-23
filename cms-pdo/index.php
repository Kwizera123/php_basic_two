<?php 
require_once "partials/header.php";
include base_path("partials/navbar.php");
include base_path("partials/hero.php");

$artcle = new Article();
$artcles = $artcle->get_all();

?>


   <!-- Main Content -->
   <main class="container my-5">
    <?php if(!empty($artcles)): ?>
        <?php foreach($artcles as $articleItem): ?>
        <!-- Blog Post 1 -->
        <div class="row mb-4">
            <div class="col-md-4">
                <?php if(!empty($articleItem->image)): ?>

                    <a href="<?php echo base_url("article.php?id=$articleItem->id"); ?>">  <img
                    src="<?php echo htmlspecialchars($articleItem->image); ?>"
                    class="img-fluid"
                    alt="Blog Post Image"
                    style="width: 350px; height: 200px;"
                    ></a>
                <?php else: ?>
                    <a href="<?php echo base_url("article.php?id=$articleItem->id"); ?>">  <img
                    src="https://placehold.jp/350x200.png"
                    class="img-fluid"
                    alt="Blog Post Image"></a>
                    <?php endif; ?>
                
            </div>
            <div class="col-md-8">
                <h2><?php echo htmlspecialchars($articleItem->title); ?></h2>
                <p>
                    <?php echo htmlspecialchars($artcle->getExcerpt($articleItem->content,90)); ?>
                </p>
                <a href="article.php?id=<?php echo $articleItem->id; ?>" class="btn btn-primary">Read More</a>
            </div>
        </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </main>



<?php 
include "partials/footer.php";
?>