<!-- edit article -->
<section>
    <header class="d-flex justify-content-between align-items-center mb-3">
        <?php if (isset($article['id'])) : ?>
            <h1>Edit Article #<?= $article['id'] ?></h1>
        <?php else : ?>
            <h1>Create Article</h1>
        <?php endif; ?>
    </header>

    <div class="card">
        <form method="post" action="/articles/store">
            <div class="card-body">
                <input name="id" type="hidden" value="<?= $article['id']??'' ?>" />

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="<?= $article['title'] ?? '' ?>" />
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $article['content'] ?? '' ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>

                <?php if (isset($article['id'])) : ?>
                    <a href="/articles/show?id=<?= $article['id'] ?>" class="btn btn-secondary">Cancel</a>
                <?php else : ?>
                    <a href="/articles" class="btn btn-secondary">Cancel</a>
                <?php endif; ?>

            </div>
        </form>
    </div>
</section>