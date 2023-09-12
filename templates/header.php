<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="UTF-8">

    <title>Мой блог</title>

    <link rel="stylesheet" href="/styles/styles.css">

</head>

<body>



    <table class="layout">

        <tr>

            <td colspan="2" class="header">

                Мой блог

            </td>

        </tr>

        <tr>

            <td colspan="2" style="text-align: right">
               
                    <?php if (!empty($user)): ?>
                        <p> Привет,  <?=  $user->getNickname() ?> </p>

                        <form  action="/users/logout" method="post">
                            <input type="submit" value="Log OUT">
                        </form>

                    <?php else: ?>
                        <p>Войдите на сайт</p>
                    <?php endif; ?>
                

                <!-- <?= !empty($user) ? 'Привет, ' . $user->getNickname() : 'Войдите на сайт' ?> -->

            </td>

        </tr>

        <tr>

            <td>