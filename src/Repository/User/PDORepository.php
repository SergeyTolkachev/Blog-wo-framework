<?php


namespace App\Repository\User;


use App\Model\User;

class PDORepository
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
        $sql='select * from `users` where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        $user = new User();
        $user->setId($data['id']);
        $user->setName($data['name']);
        $user->setPassword($data['password']);
        $user->setCreatedAt($data['created_at']);
        $user->setUpdatedAt($data['updated_at']);
        return $user;

    }

    public function delete($id){
        $sql='delete from `users` where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id' , $id);
        $stmt->execute();
    }

    public function seeAll()
    {
        $sql = 'select * from `users`';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function create(User $user)
    {
        $sql = 'insert into `users` set name=:name, password=:password, created_at = now(), updated_at = now()';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->execute();
    }

    public function update($data)
    {
        $sql = 'update `users` set name=:name, updated_at = now() where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':id', $data['id']);
        $stmt->execute();
    }
}
