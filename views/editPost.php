<?php include 'views/layout/header.php'; ?>

<h2>Редагувати пост</h2>

<form method="post">
    <input type="text" name="title" value="<?= htmlspecialchars($post->title) ?>" required><br><br>
    <textarea name="content" required><?= htmlspecialchars($post->content) ?></textarea><br><br>
    <button type="submit">Оновити</button>
</form>

<?php include 'views/layout/footer.php'; ?>
