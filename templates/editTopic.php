<!-- edit topic -->

<div class="container">
    <div id="new_topic">
        <form method="post" action="/<?= $topic->getId() ?>">
            <input type="text" name="title" value="<?= $topic->getTitle() ?>" />
            <button type="submit" class="btn btn-primary">Modifier le sujet</button>
        </form>
    </div>
</div>

