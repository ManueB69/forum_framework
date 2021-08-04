<!-- home -->
<?php

use App\Model\Topic;

?>


<div class="container">
    <div id="new_topic">
    <!-- TODO remplacer 1 par l'id user en cours dans l'action du form + href du tableau-->
        <form method="post" action="/1">
            <input type="text" name="title" placeholder="Titre" />
            <textarea rows="3" name="mess_text" placeholder="Message" ></textarea>
            <button type="submit" class="btn btn-primary">Ajouter un nouveau sujet</button>
        </form>
    </div>
    <div id="topic_list">
        <table>
            <tbody>
            <?php foreach($topics as $topic): ?>
                <tr>
                    <th> <a href="/1/<?= $topic->getId() ?>/show"><?= $topic->getTitle() ?></a> </th>
                    <th> <a href="/1/<?= $topic->getId() ?>/edit" class="btn btn-primary">Modifier</a> </th>
                    <th> <a href="/1/<?= $topic->getId() ?>/delete" class="btn btn-danger">Supprimer</a> </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
