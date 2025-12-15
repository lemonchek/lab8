<?php

require_once 'controllers/BlogController.php';

$controller = new BlogController();

$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'create':
        $controller->createPost();
        break;

    case 'edit':
        $controller->editPost();
        break;

    case 'delete':
        $controller->deletePost();
        break;

    default:
        $controller->showAllPosts();
}
