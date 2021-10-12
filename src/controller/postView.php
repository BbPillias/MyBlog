<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </p>
                <a href="http://spaceipsum.com/">Space Ipsum</a>
                &middot; Images by
                <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                </p>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Les commentaires</p>
            </div>
            <p><a href="index.php">Liste des articles</a></p>
        </div>
    </div>
</article>


<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch()) {
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>

    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?>
        <a href="index.php?action=showComment&amp;post_id=<?= $comment['post_id'] ?>&amp;id=<?= $comment['id'] ?>">(modifier)</a>
    </p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>