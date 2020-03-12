<?php
class Post{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts(){
        $this->db->query('SELECT *,
                            posts.id as postId,
                            posts.created_at as postCreatedAt,
                            users.id as userId ,
                            users.created_at as userCreatedAt
                          FROM posts
                          INNER JOIN users
                          ON  posts.user_id = users.id
                          ORDER BY posts.created_at DESC
                          ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data){
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
        // enlazamos parametros
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        
        //ejecución
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        //enlazo parametro
        $this->db->bind(':id', $id);
        $post = $this->db->single();
        // retornamos a post       
        return $post;
        
    }
    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        // enlazamos parametros
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        //ejecución
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // enlazamos parametros
        $this->db->bind(':id', $id);        
        //ejecución
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
