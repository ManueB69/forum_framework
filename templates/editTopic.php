<!-- edit topic -->

<div class="container">
    <div id="new_topic">
        <!-- TODO remplacer 1 par l'id user en cours dans l'action du form -->
        <form method="post"  action="/1/<?= $topic->getId() ?>/show">
            <input type="text" name="title" value="<?= $topic->getTitle() ?>" />
            <button type="submit" class="btn btn-primary">Modifier le sujet</button>
        </form>
    </div>
</div>

