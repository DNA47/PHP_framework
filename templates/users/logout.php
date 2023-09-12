<?php include __DIR__ . '/../header.php'; ?>

    <div style="text-align: center;">

        <h1>Выход</h1>

        <?php if (!empty($error)): ?>

            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>

        <?php endif; ?>


    </div>

<?php include __DIR__ . '/../footer.php'; ?>