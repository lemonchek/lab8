<?php include 'views/layout/header.php'; ?>

<?php foreach ($posts as $post): ?>
    <h2><?= htmlspecialchars($post->title) ?></h2>
    <p><?= nl2br(htmlspecialchars($post->content)) ?></p>
    <small>Створено: <?= $post->created_at ?></small>
    <hr>
<?php endforeach; ?>

<?php include 'views/layout/footer.php'; ?>
