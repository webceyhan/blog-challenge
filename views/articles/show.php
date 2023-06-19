<!-- article detail -->
<section>
    <header class="d-flex justify-content-between align-items-center mb-3">
        <h1>Article #<?= $article['id'] ?></h1>
        <div>
            <a href="/articles/edit?id=<?= $article['id'] ?>" class="btn btn-sm btn-primary rounded-5">Edit</a>
            <a href="/articles/delete?id=<?= $article['id'] ?>" class="btn btn-sm btn-danger rounded-5">Delete</a>
        </div>
    </header>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?= $article['title'] ?></h3>

            <h6 class="card-subtitle mb-2 text-body-secondary">
                updated on <?= $article['created_at'] ?>
            </h6>
            <br />

            <p class="card-text">
                <?= $article['content'] ?>
            </p>

        </div>
    </div>
</section>