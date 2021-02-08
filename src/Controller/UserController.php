<?php


namespace App\Controller;


use App\Model\User;
use App\Repository\User\PDORepository;
use App\servises\Connection;

class UserController
{

    private function makeRepository()
    {
        $connect = new Connection();
        return new PDORepository($connect->makeConnection());
    }

    public function findAction($id): object
    {
        $user = $this->makeRepository()->findById($id);
        return $user;
    }

    public function deleteAction($id)
    {
        $this->makeRepository()->delete($id);
        header('Location: http://blog.com/user/show');
    }

    public function showAction()
    {
        $data = $this->makeRepository()->seeAll();
        require_once 'config/twig.php';
        echo $twig->render('user/usersList.html.twig', ['users'=>$data]);
    }

    public function saveAction()
    {
        $name = htmlspecialchars($_POST['name']);
        $user = new User();
        $user->setName($name);
        $user->setPassword(md5($_POST['password']));
        $this->makeRepository()->create($user);
        header('Location: http://blog.com/user/show');

    }

    public function createAction()
    {
        require_once 'config/twig.php';
        echo $twig->render('user/createUser.html.twig');
    }

    public function editAction($id)
    {
        $user = $this->makeRepository()->findById($id);
        require_once 'config/twig.php';
        echo $twig->render('user/editUser.html.twig', ['user'=>$user]);

    }

    public function updateAction()
    {
        $data = $_POST;
        $this->makeRepository()->update($data);
        header('Location: http://blog.com/user/show');
    }

}
