<section class="d-flex flex-column justify-content-center">
    <h1 class="text-center mt-4">Příspěvky</h1>
    <button class="btn btn-primary align-self-center mt-2" data-bs-toggle="modal" data-bs-target="#createPostModal">
        <i class="fas fa-plus me-2"></i>Přidat příspěvek
    </button>
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger mt-4" role="alert">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
    <?php if (isset($successMessage)) : ?>
        <div class="alert alert-success mt-4" role="alert">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>

    <div class="list-group mt-4">
        <?php foreach ($posts as $value) : ?>
            <div class="card m-2 post">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <h3 class="card-title post-title"><?= $value["title"] ?></h3>
                        <p class="card-text"><?= date('d.m.Y H:i', strtotime($value["created_at"])) ?></p>
                    </div>

                    <h4 class="d-none post-id"><?= $value['id'] ?></h4>
                    <h4 class="d-none post-category-id"><?= $value['category_id'] ?></h4>

                    <h4 class="card-subtitle mb-2 text-muted post-category-name"><?= $value["category_name"] ?></h4>

                    <h5 class="card-text post-author"><?= $value["author"] ?></h5>

                    <p class="card-text post-content"><?= $value["content"] ?></p>
                    <div class="button-group" role="group">
                        <button type="button" class="btn btn-warning edit-post">Upravit</button>
                        <button type="button" class="btn btn-danger disabled">Smazat</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="modal fade" ref="modal" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createPostModal">Tvorba příspěvku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <h2 class="fs-5">Kategorie</h2>
                        <select class="form-select form-select-lg" id="category" name="category" required>
                            <option value="" selected disabled>Vyber kategorii</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <h2 class="fs-5">Titulek</h2>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <h2 class="fs-5">Autor</h2>
                        <input type="text" class="form-control form-control-lg" id="author" name="author" required>
                    </div>
                    <div class="mb-3">
                        <h2 class="fs-5">Obsah</h2>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#createPostModal">Zavřít</button>
                    <button type="submit" class="btn btn-primary">Vytvořit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" ref="modal" id="EditPostModal" tabindex="-1" aria-labelledby="EditPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="EditPostModalLabel">Tvorba příspěvku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" class="post-edit-form">
                <div class="modal-body">
                    <div class="mb-3">
                        <h2 class="fs-5">Kategorie</h2>
                        <select class="form-select form-select-lg" id="category" name="category" required>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <h2 class="fs-5">Titulek</h2>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <h2 class="fs-5">Autor</h2>
                        <input type="text" class="form-control form-control-lg" id="author" name="author" required>
                    </div>
                    <div class="mb-3">
                        <h2 class="fs-5">Obsah</h2>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>
                    <input type="hidden" id="type-edit" name="type-edit">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#EditPostModal">Zavřít</button>
                    <button type="submit" class="btn btn-primary">Upravit</button>
                </div>
            </form>
        </div>
    </div>
</div>