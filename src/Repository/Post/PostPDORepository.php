<?php


namespace App\Repository\Post;


use App\Model\Post;

class PostPDORepository
{
    private \PDO $pdo;

    /**
     * PDORepository constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById($id){
        $sql='select * from `posts` where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        $post = new Post();
        $post->setId($data['id']);
        $post->setTitle($data['title']);
        $post->setText($data['text']);
        $post->setCreatedAt($data['created_at']);
        $post->setUpdatedAt($data['updated_at']);
        return $post;

    }

    public function delete($id){
        $sql='delete from `posts` where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id' , $id);
        $stmt->execute();
    }

    public function seeAll()
    {
        $sql = 'select * from `posts`';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function create(Post $post)
    {
        $sql = 'insert into `posts` set title=:title, text=:text, created_at = now(), updated_at = now()';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $post->getTitle());
        $stmt->bindValue(':text', $post->getText());
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = 'update `posts` set title=:title, text=:text, updated_at = now() where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $data['title']);
        $stmt->bindValue(':text', $data['text']);
        $stmt->bindValue(':id', $data['id']);
        $stmt->execute();
    }
}
