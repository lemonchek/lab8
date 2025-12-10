<?php

require_once __DIR__ . '/../config/db.php';

class Post
{
    public int $id;
    public string $title;
    public string $content;
    public string $created_at;

    public function __construct(int $id, string $title, string $content, string $created_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->created_at = $created_at;
    }

    public static function getAll(): array
    {
        $conn = getDbConnection();
        $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = new Post(
                (int)$row['id'],
                $row['title'],
                $row['content'],
                $row['created_at']
            );
        }

        return $posts;
    }

    public static function search(string $query): array
    {
        $conn = getDbConnection();

        $sql = "SELECT * FROM posts 
                WHERE title LIKE ? OR content LIKE ?
                ORDER BY created_at DESC";

        $stmt = $conn->prepare($sql);

        $like = "%$query%";
        $stmt->bind_param('ss', $like, $like);
        $stmt->execute();

        $result = $stmt->get_result();
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = new Post(
                (int)$row['id'],
                $row['title'],
                $row['content'],
                $row['created_at']
            );
        }

        return $posts;
    }
}
