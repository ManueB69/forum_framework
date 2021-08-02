<!-- home -->
<?php

use App\Model\Topic;

?>

<div class="container">
    <div id="new_topic">
        <form method="post">
            <input type="text" name="title" placeholder="Titre" />
            <input type="text-area" name="mess_text" placeholder="Message" />
            <button type="submit" class="btn btn-primary">Ajouter un nouveau sujet</button>
        </form>
    </div>
    <div id="topic_list">
        <form method="post">
            <input type="hidden" name="id" value="idDuSujet" />
            <button class="btn btn-link" name="title" value="TitreDuSujet"></button>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
