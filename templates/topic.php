<!-- topic -->
<?php

use App\Model\Topic;
$topic = $messages[0]->getTopic();
$topic_user = $messages[0]->getUser()->getUserName();

?>


<div class="container">
    <div id="topic">
        <h1> <?= $topic->getTile() ?> </h1>
        <p> <?= 'Posté le ' . $topic->getDate()->format('d/m/Y') . ' à ' . $topic->getDate()->format('H:i') . 'par ' .$topic_user ?> </p>
    </div>
    <div id="message_list">
        <?php foreach($messages as $message): ?>
        <div id="message_line">
            <h2><?= 'Par ' . $message->getUser()->getUserName . ', le ' . $message->getDate()->format('d/m/Y') . ' à ' . $message->getDate()->format('H:i') ?></h2>
            <p> <?= $message->getText() ?> </p>
        </div>
        <?php endforeach; ?>
    </div>
    <div id="new_message">
        <form method="post">
            <textarea rows="3" name="mess_text" placeholder="Message" ></textarea>
            <button type="submit" class="btn btn-primary">Répondre au sujet</button>
        </form>
    </div>
</div>
