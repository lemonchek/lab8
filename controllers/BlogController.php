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
}
