<!-- home -->

<div class="container">
    <div id="new_topic">
        <form method="post">
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
                    <th> <a href="/<?= $topic->getId() ?>/show"><?= $topic->getTitle() ?></a> </th>
                    <th> <a href="/<?= $topic->getId() ?>/edit" class="btn btn-primary">Modifier</a> </th>
                    <th> <a href="/<?= $topic->getId() ?>/delete" class="btn btn-danger">Supprimer</a> </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
