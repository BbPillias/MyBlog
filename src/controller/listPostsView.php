<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon actualité</h1>
<p>Mes derniers articles</p>


<?php
while ($data = $posts->fetch()) {
?>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                        <h3>
                            <?= htmlspecialchars($data['title']) ?>
                            <?= $data['content'] ?>
                        </h3>
                    </a>

                    <p class="post-meta">
                        Posted by
                        <a href="home.html.twig">Bérengère</a>
                        le <?= $data['creation_date_fr'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
