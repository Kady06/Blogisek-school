<main>
    <ul class="nav nav-pills nav-pill justify-content-center gap-3">
        <li class="nav-item">
            <a class="nav-link <?php if($sub_current == "categories") echo "active" ?>" href="/administration/categories">Kategorie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($sub_current == "posts") echo "active" ?>" href="/administration/posts">Příspěvky</a>
        </li>
    </ul>