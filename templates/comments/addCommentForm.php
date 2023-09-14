<?php if (!empty($user)): ?>
    <div>
        <h2>Добавить комментарий:</h2>
        <form class="std" action="/articles/<?= $id ?>/comments" method="POST">

            <textarea name="" id="" rows="10" placeholder="Введите текст нового комментария"></textarea>
            <br>
            <input type="submit">
        </form>
    </div>
  
<?php else: ?>
    <p>
        <strong>Вам нужно войти на сайт, чтобы оставлять комментарии!</strong>
    </p>
<?php endif; ?>





