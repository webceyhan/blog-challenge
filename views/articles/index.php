<!-- articles index -->
<section>
    <header class="d-flex justify-content-between align-items-center mb-3">
        <h1>Articles</h1>
        <a href="/articles/create" class="btn btn-sm btn-primary rounded-5">Create Article</a>
    </header>

    <div class="list-group">
        <?php

        use App\Models\User;

        foreach ($articles as $article) : ?>
            <a href="/articles/show?id=<?= $article['id'] ?>" class="list-group-item list-group-item-action p-3">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-1">
                        <?= $article['title'] ?>
                    </h5>
                    <small>
                        <?= $article['created_at'] ?>
                    </small>
                </div>

                <small class="text-muted">
                    written by <?= User::find($article['author_id'])['name'] ?>
                </small>
            </a>
        <?php endforeach; ?>

    </div>
</section>