<!-- edit topic -->
<?php
    if(isset($_POST['title'])) {
        $topic->setTitle($_POST['title']);
        $topic->save();
    }
?>

<div id="new_topic">
    <form method="post"  action="/<?= $topic->getId() ?>/edit">
        <input type="text" name="title" value="<?= $topic->getTitle() ?>" />
        <button type="submit" class="btn btn-primary">Modifier le sujet</button>
    </form>
</div>

