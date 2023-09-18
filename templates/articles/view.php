<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= $article->getName() ?></h1>

    <p><?= $article->getText() ?></p>

    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>   
   
    <hr>

    <?php 

        $view = new \MyProject\View\View(__DIR__ . '../../comments');

        $view->renderHtml('addCommentForm.php', [ 
            'id' => $article->getId(),
            'author' => $article->getAuthor(),
            'user' => $user,
            
        ]);
    
    ?>
    
    <hr>

    <?php foreach ($comments as $comment): ?>

        <a name="comment-<?= $comment->getId() ?>"></a>
        <h2>Author: 
            <?= $comment->getAuthor()->getNickname() ?>
        </h2>

        <p>
            <?= $comment->getText() ?>
        </p>

        <a href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/edit">Редактировать</a>

        <hr>

    <?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>