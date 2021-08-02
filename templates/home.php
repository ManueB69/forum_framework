<!-- home -->
<?php

use App\Model\Topic;

?>

<div class="container">
    <div id="new_topic">
        <form method="post">
            <input type="text" name="title" placeholder="Titre" />
            <textarea rows="3" name="mess_text" placeholder="Message" ></textarea>
            <button type="submit" class="btn btn-primary">Ajouter un nouveau sujet</button>
        </form>
    </div>
    <div id="topic_list">
        <form method="post" id="form_list">
            <input type="hidden" name="id" value="idDuSujet" />
            <button id="moi" class="btn btn-link" name="title" value="TitreDuSujet">Titre du sujet</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
