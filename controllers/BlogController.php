<?php

require_once 'models/Post.php';

class BlogController
{
    public function showAllPosts()
    {
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        if ($search !== '') {
            $posts = Post::search($search);
        } else {
            $posts = Post::getAll();
        }

        // Пагінація
        $perPage = 3;
        $totalPages = max(1, ceil(count($posts) / $perPage));

        $page = isset($_GET['page']) 
            ? max(1, min((int) $_GET['page'], $totalPages)) 
            : 1;

        $offset = ($page - 1) * $perPage;
        $posts = array_slice($posts, $offset, $perPage);

        include 'views/postsView.php';
    }

    public function createPost()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if ($title !== '' && $content !== '') {
            Post::create($title, $content);
        }

        header('Location: index.php');
        exit;
    }

    include 'views/createPost.php';
}

public function editPost()
{
    $id = (int)($_GET['id'] ?? 0);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        Post::update($id, $title, $content);

        header('Location: index.php');
        exit;
    }

    $post = Post::find($id);
    include 'views/editPost.php';
}

public function deletePost()
{
    $id = (int)($_GET['id'] ?? 0);
    Post::delete($id);

    header('Location: index.php');
    exit;
}


}
