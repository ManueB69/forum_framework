<!-- header - nav bar -->
<header>
    <nav class="nav">
        <ul>
            <li>
                <a class="nav-link active" aria-current="page" href="home.php">Accueil</a>
            </li>
            
            <?php if (empty($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="signUp.php">Créer un compte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signIn.php">Se connecter</a>
            </li>
            
            <?php else: ?> 
            <li class="nav-item">
                <a class="nav-link" href="modifyUser.php">Modifier mon compte</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="signOut.php">Se dconnecter</a>
            </li>

            <?php endif; ?>
        </ul>
    </nav>
</header>