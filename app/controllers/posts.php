<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION){
    header('location: ' . BASE_URL . 'log.php');
}

$errMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('products');
$postsAdm = selectAllFromPostsWithUsers('products', 'topics');

// Код для формы создания записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\images\posts\\" . $imgName;


        if (strpos($fileType, 'image') === false) {
            $errMsg = "Подгружаемый файл не является изображением!";
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result){
                $_POST['img'] = $imgName;
            }else{
                $errMsg = "Ошибка загрузки изображения на сервер";
            }
        }
    }else{
        $errMsg = "Ошибка получения картинки";
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    


    if($title === '' || $content === '' || $topic === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF8') < 7){
        $errMsg = "Название статьи должно быть более 7-ми символов";
    }else{
        $post = [
            
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'id_topic' => $topic
        ];

        $post = insert('products', $post);
        $post = selectOne('products', ['id' => $id] );
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
}else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}


 // АПДЕЙТ СТАТЬИ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $post = selectOne('products', ['id' => $_GET['id']]);

    $id =  $post['id'];
    $title =  $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){
    $id =  $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;


        if (strpos($fileType, 'image') === false) {
            $errMsg = "Подгружаемый файл не является изображением!";
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result){
                $_POST['img'] = $imgName;
            }else{
                $errMsg = "Ошибка загрузки изображения на сервер";
            }
        }
    }else{
        $errMsg = "Ошибка получения картинки";
    }

    
    if($title === '' || $content === '' || $topic === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF8') < 7){
        $errMsg = "Название статьи должно быть более 7-ми символов";
    }else{
        $post = [
            
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            
            'id_topic' => $topic
        ];

        $post = update('products', $id, $post);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
}else{
   /*  $title = $_POST['title'];
    $content = $_POST['content'];
    
    $topic = $_POST['id_topic']; */
}

 
// Удаление статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('products', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}