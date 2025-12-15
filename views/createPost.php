<?php include 'views/layout/header.php'; ?>

<h2>Додати новий пост</h2>

<form method="post">
    <input type="text" name="title" placeholder="Заголовок" required><br><br>
    <textarea name="content" placeholder="Текст поста" required></textarea><br><br>
    <button type="submit">Зберегти</button>
</form>

<?php include 'views/layout/footer.php'; ?>
