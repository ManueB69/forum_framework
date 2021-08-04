<!-- header - nav bar -->

<header>
    <nav class="nav">
        <ul>
            <li>
                <a class="nav-link active" aria-current="page" href="/">Accueil</a>
            </li>
            
            <?php if (!isset($_SESSION['id_user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="/user">Créer un compte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/signin">Se connecter</a>
            </li>
            
            <?php else: ?> 
            <li class="nav-item">
                <a class="nav-link" href="/user">Modifier mon compte</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="/signout">Se déconnecter</a>
            </li>

            <?php endif; ?>
        </ul>
    </nav>
</header>