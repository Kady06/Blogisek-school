<section class="d-flex flex-column justify-content-center">
    <h1 class="text-center mt-4">Kategorie</h1>
    <button class="btn btn-primary align-self-center mt-2" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
        <i class="fas fa-plus me-2"></i>Vytvořit kategorii
    </button>
    <?php if(isset($errorMessage)): ?>
    <div class="alert alert-danger mt-4" role="alert">
        <?= $errorMessage ?>
    </div>
    <?php endif; ?>
    <?php if(isset($successMessage)): ?>
    <div class="alert alert-success mt-4" role="alert">
        <?= $successMessage ?>
    </div>
    <?php endif; ?>

    <div class="list-group mt-4">
        <?php foreach ($all_categories as $category) : ?>
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $category['name'] ?></h5>
                    <small><?= date('d.m.Y H:i', strtotime($category["created_at"])) ?></small>
                </div>
                <p class="mb-1"><?= $category['description'] ?></p>
                <div class="button-group" role="group">
                    <button type="button" class="btn btn-warning disabled">Upravit</button>
                    <button type="button" class="btn btn-danger disabled">Smazat</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="modal fade" ref="modal" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createCategoryModal">Vytvoření kategorie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <h2 class="fs-5">Název kategorie</h2>
                        <input type="text" class="form-control form-control-lg" id="categoryName" name="categoryName">
                    </div>
                    <div class="mb-3">
                        <h2 class="fs-5">Popis kategorie</h2>
                        <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#createCategoryModal">Zavřít</button>
                    <button type="submit" class="btn btn-primary">Vytvořit</button>
                </div>
            </form>
        </div>
    </div>
</div>