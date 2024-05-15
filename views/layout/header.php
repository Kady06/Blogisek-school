<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blogísek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current == "home") echo "active" ?>" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current == "administration") echo "active" ?>" href="/administration">Administrace</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Login</a>
                    </li> -->
                </ul>
                <?php if ($current == "home") : ?>
                    <form class="d-flex" role="search" method="get" action="">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php if(isset($search)) echo $search; ?>">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>