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
                <form method="post" action="show_topic"  classe="btnx">
                    <button type="submit" class="btn btn-link btnx" name="id_topic" value="<?= $topic->getId() ?>"><?= $topic->getTitle() ?></button>
                </form>
                <form method="post" action="edit_topic"  classe="btnx">
                    <input type="hidden" name="id_topic" value="<?= $topic->getId() ?>" />
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                <form method="post" action="/<?= $topic->getId() ?>" classe="btnx">
                    <input type="hidden" name="id_topic" value="<?= $topic->getId() ?>" />
                    <button type="submit" class="btn btn-danger" name="delete_topic" value="1">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
