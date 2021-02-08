<?php


namespace App\Controller;


use App\Model\Post;
use App\Repository\Post\PostPDORepository;
use App\servises\Connection;

class PostController
{
    private function makeRepository()
    {
        $connect = new Connection();
        return new PostPDORepository($connect->makeConnection());
    }

    public function findAction($id): object
    {
        $post = $this->makeRepository()->findById($id);
        return $post;
    }

    public function deleteAction($id)
    {
        $this->makeRepository()->delete($id);
        header('Location: http://blog.com/post/show');
    }

    public function showAction()
    {
        $data = $this->makeRepository()->seeAll();
        require_once 'config/twig.php';
        echo $twig->render('post/postList.html.twig', ['posts'=>$data]);
    }

    public function saveAction()
    {
        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);
        $post = new Post();
        $post->setTitle($title);
        $post->setText($text);
        $this->makeRepository()->create($post);
        header('Location: http://blog.com/post/show');

    }

    public function createAction()
    {
        require_once 'config/twig.php';
        echo $twig->render('post/createPost.html.twig');
    }

    public function editAction($id)
    {
        $post = $this->makeRepository()->findById($id);
        require_once 'config/twig.php';
        echo $twig->render('post/editPost.html.twig', ['post'=>$post]);

    }

    public function updateAction()
    {
        $data = $_POST;
        $this->makeRepository()->update($data);
        header('Location: http://blog.com/post/show');
    }

}