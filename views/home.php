<main class="d-flex flex-column justify-content-center align-items-center">
    <select class="form-select form-select-lg mb-3" id="categorySelect" aria-label="Large select example">
        <option value="all" selected>Všechny kategorie</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>" <?php if ($category['id'] == $curr_category) echo "selected" ?>><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <?php if (isset($search)) : ?>
        <h1 class="test-center">Výsledky hledání: <strong><?= $search ?></strong></h1>
    <?php endif; ?>
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger mt-4" role="alert">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
    <div class="d-flex flex-column align-items-center justify-content-start w-75">
        <?php foreach ($posts as $value) : ?>
            <div class="card m-2 w-100">
                <div class="card-body">
                    <h3 class="card-title"><?= $value["title"] ?></h3>
                    <h4 class="card-subtitle mb-2 text-muted"><?= $value["category_name"] ?></h4>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <h5 class="card-text"><?= $value["author"] ?></h5>
                        <p class="card-text"><?= date('d.m.Y H:i', strtotime($value["created_at"])) ?></p>
                    </div>
                    <p class="card-text" style="white-space: pre-wrap;"><?= htmlspecialchars($value["content"]); ?></p>
                    <div class="btn-group justify-content-right align-content-right w-100" role="group">
                        <button type="button" class="btn btn-success disabled">To se mi líbí</button>
                        <button type="button" class="btn btn-primary disabled">Komentovat</button>
                        <button type="button" class="btn btn-danger disabled">Nahlásit</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>