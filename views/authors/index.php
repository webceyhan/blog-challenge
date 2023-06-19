<!-- authors index -->
<section>
    <header class="d-flex justify-content-between align-items-center mb-3">
        <h1>Authors</h1>
    </header>

    <div class="list-group">
        <?php

        use App\Models\Article;

        foreach ($users as $user) : ?>

            <a href="/articles?author_id=<?= $user['id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3">
                <?= $user['name'] ?>
                <span class="badge bg-secondary rounded-pill">
                    <?= count(Article::findByAuthor($user['id'])) ?>
                    articles
                </span>
            </a>

        <?php endforeach; ?>
    </div>
</section>