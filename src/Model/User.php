<?php
namespace App\Model;
class User{
    private int $id;
    private string $name;
    private string $password;
    private  $createdAt;
    private  $updatedAt;

//    /**
//     * User constructor.
//     * @param string $name
//     * @param string $password
//     * @param  $createdAt
//     * @param  $updatedAt
//     */
//    public function __construct(string $name, string $password, ?string $createdAt, ?string $updatedAt)
//    {
//        $this->name = $name;
//        $this->password = $password;
//        $this->createdAt = $createdAt;
//        $this->updatedAt = $updatedAt;
//    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param  $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

//    public function passwordHash(): string
//    {
//        return md5($this->password);
//    }
}