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
            <?php foreach($topics as $topic): ?>
            <div id="topic_line">
                <input type="hidden" name="id" classe="btnx" value="<?= $topic->getId() ?>" />
                <button class="btn btn-link btnx" name="title"><?= $topic->getTitle() ?></button>
                <button type="submit" class="btn btn-primary btnx">Modifier</button>
                <button type="submit" class="btn btn-danger btnx">Supprimer</button>
            </div>
            <?php endforeach; ?>
        </form>
    </div>
</div>
