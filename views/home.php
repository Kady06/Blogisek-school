<main class="d-flex flex-row align-items-center justify-content-start flex-wrap">
    <?php foreach ($posts as $value) : ?>
        <div class="card m-2" style="width: 32rem;">
            <div class="card-body">
                <h3 class="card-title"><?= $value["title"] ?></h3>
                <h4 class="card-subtitle mb-2 text-muted"><?= $value["category_name"] ?></h4>
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h5 class="card-text"><?= $value["author"] ?></h5>
                    <p class="card-text"><?= date('d.m.Y H:i', strtotime($value["created_at"])) ?></p>
                </div>
                <p class="card-text"><?= $value["content"] ?></p>
                <a href="#" class="btn btn-primary disabled">To se mi líbí</a>
            </div>
        </div>
    <?php endforeach; ?>
</main>