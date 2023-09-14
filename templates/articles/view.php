<?php include __DIR__ . '/../header.php'; ?>

    <h1><?= $article->getName() ?></h1>

    <p><?= $article->getText() ?></p>

    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

    <?php foreach ($comments as $comment): ?>

        <h2>Author ID: 
            <?= $comment->getAuthor() ?>
        </h2>

        <p>
            <?= $comment->getText() ?>
        </p>

        <a href="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/edit">Редактировать</a>

        <hr>

    <?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>