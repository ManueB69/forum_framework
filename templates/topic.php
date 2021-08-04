<!-- topic -->
<?php

use App\Model\Topic;
use App\Model\User;
use App\Model\Message;

$user=$messages[0]->getUser();
$topicUser = $user[0]->getUserName();

?>


<div class="container">
    <div id="topic">
        <h1> <?= $topic->getTitle() ?> </h1>
        <p> <?= 'Posté le ' . $topic->getDate()->format('d/m/Y') . ' à ' . $topic->getDate()->format('H:i') . ' par ' . $topicUser ?> </p>
    </div>
    <?php foreach($messages as $message): 
            $users= $message->getUser();
            $user= $users[0] ?>
            <div classe="message_line">
                <h2><?= 'Par ' . $user->getUserName() . ', le ' . $message->getDate()->format('d/m/Y') . ' à ' . $message->getDate()->format('H:i') ?></h2>
                <p> <?= $message->getText() ?> </p>
            </div>
    <?php endforeach; ?>
    <div id="new_message">
        <form method="post">
            <textarea rows="3" name="mess_text" placeholder="Message" ></textarea>
            <button type="submit" class="btn btn-primary">Répondre au sujet</button>
        </form>
    </div>
</div>
