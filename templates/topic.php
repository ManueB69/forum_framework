<!-- topic -->
<?php

use App\Model\Topic;

?>


<div class="container">
    <div>
        <h1> <?= $topic->getTile() ?> </h1>
        <p> <?= 'Posté le ' . $topic->getDate() . ' à ' . $topic->getDate() . 'par ' .$messages[0]->get ?> </p>
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
    <div id="new_message">
        <form method="post">
            <textarea rows="3" name="mess_text" placeholder="Message" ></textarea>
            <button type="submit" class="btn btn-primary">Répondre au sujet</button>
        </form>
    </div>
</div>
