<?php include __DIR__ . '/../header.php'; ?>

<?php if (!empty($user)): ?>
    <div>
        <h2>Редактировать комментарий:</h2>

        <form class="std" action="/articles/<?= $article->getId() ?>/comments/<?= $comment->getId() ?>/edit" method="POST">

            <p>
                <label for="">
                    Текст комментария: <br>
                    
                    <textarea name="text" id="" rows="10" placeholder="Введите текст нового комментария"><?= $comment->getText() ?></textarea>
                </label>
            </p>

           
            <br>
            <input type="submit">
        </form>
    </div>
  
<?php else: ?>
    <p>
        <strong>Вам нужно войти на сайт, чтобы редактировать комментарии!</strong>
    </p>

    <a href="/users/login" class="btn">Войдите на сайт</a>
<?php endif; ?>



<?php include __DIR__ . '/../footer.php'; ?>

