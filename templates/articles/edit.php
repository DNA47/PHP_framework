<?php include __DIR__ . '/../header.php'; ?>

<form class="editPost" action="/articles/update" method="POST">
    <h1>Edit article -
        <?= $article->getName() ?> (id:
        <?= $article->getId() ?>)
    </h1>


    <p>
        <label for="">
            ID: <br>
            <input readonly type="text" name='id' value='<?= $article->getId() ?>' >
        </label>
    </p>
    <p>
        <label for="">
            Название статьи: <br>
            <input type="text" value="<?= $article->getName() ?>" name="name" placeholder="Название статьи">
        </label>
    </p>

    <p>
        <label for="">
            Текст статьи: <br>
            <textarea name="text" id="" cols="30" rows="10"
                placeholder="Текст статьи"><?= $article->getText() ?></textarea>
        </label>
    </p>

    <p>Автор:
        <?= $article->getAuthor()->getNickname() ?>
    </p>

   

    <input type="submit">
</form>

<?php include __DIR__ . '/../footer.php'; ?>