<!-- header - nav bar -->
<header>
    <nav class="nav">
        <ul>
            <li>
                <a class="nav-link active" aria-current="page" href="/">Accueil</a>
            </li>
            
            <?php if (empty($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="/user">Créer un compte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/signin">Se connecter</a>
            </li>
            
            <?php else: ?> 
            <li class="nav-item">
                <a class="nav-link" href="/user/">Modifier mon compte</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="/">Se dconnecter</a>
            </li>

            <?php endif; ?>
        </ul>
    </nav>
</header>