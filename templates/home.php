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
        <?php foreach($topics as $topic): ?>
            <div id="topic_line">
                <form method="post" action="/<?= $topic->getId() ?>/show" classe="btnx">
                    <button type="submit" class="btn btn-link btnx" name="id_topic" value="<?= $topic->getId() ?>"><?= $topic->getTitle() ?></button>
                </form>
                <form method="post" action="/<?= $topic->getId() ?>/edit" classe="btnx">
                    <input type="hidden" classe="btnx" name="id_topic" value="<?= $topic->getId() ?>" />
                    <button type="submit" class="btn btn-primary btnx">Modifier</button>
                </form>
                <form method="post" action="/<?= $topic->getId() ?>/delete" classe="btnx">
                    <input type="hidden" classe="btnx" name="id_topic" value="<?= $topic->getId() ?>" />
                    <button type="submit" class="btn btn-danger btnx">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
