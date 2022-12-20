<?php

require 'connect.php';


function tt($value){
    echo '<pre>';
    print_r($value);
    echo'</pre>';    
}

//проверка запроса к бд
function dbcheckError($query){
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE){
     echo $errInfo[2];
     exit();
   }
   return true;
}
//Запрос на получение данных c одной таблицы
function selectALL($table, $params = []){
    global $pdo;
    
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" .$value. "'"; 

            }
            if ($i === 0){
                $sql = $sql . " WHERE $key => $value";
            }else{
               $sql = $sql .  " AND $key => $value";
            }
            $i++;
        }
       
   }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbcheckError($query);
    return $query->fetchAll();


}
//Запрос на получение данных одной строки с  таблицы
function selectOne($table, $params = []){
    global $pdo;
    
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" .$value. "'"; 

            }
            if ($i === 0){
                $sql = $sql . " WHERE $key => $value";
            }else{
               $sql = $sql .  " AND $key => $value";
            }
            $i++;
        }
       
   }
  
    $query = $pdo->prepare($sql);
    $query->execute();
    dbcheckError($query);
    return $query->fetch();


}
// запись в бд
function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value" . "'";
        }else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbcheckError($query);
    return $pdo->lastInsertId();
}
// Обновление строки в таблице
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbcheckError($query);

}

// Обновление строки в таблице
function delete($table, $id){
    global $pdo;
    //DELETE FROM `topics` WHERE id = 3
    $sql = "DELETE FROM $table WHERE id =". $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbcheckError($query);

}
// Выборка записей (posts) с автором в админку


// Считаем количество строк в таблице
function countRow($table){
global $pdo;
$sql = "SELECT Count(*) FROM $table";
$query = $pdo->prepare($sql);
$query->execute();
dbCheckError($query);
return $query->fetchColumn();
}

function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;
    $sql = "SELECT 
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.id_topic,
    t2.name
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_topic = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();

}

// Выборка записей (posts) с автором на главную
function selectAllFromPostsWithUsersOnIndex($table1, $table2, $limit, $offset){
global $pdo;
$sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";
$query = $pdo->prepare($sql);
$query->execute();
dbCheckError($query);
return $query->fetchAll();
}

// Выборка записей (posts) с автором на главную
function selectTopTopicFromPostsOnIndex($table1){
global $pdo;
$sql = "SELECT * FROM $table1 WHERE id_topic = 18";
$query = $pdo->prepare($sql);
$query->execute();
dbCheckError($query);
return $query->fetchAll();

}


// Поиск по заголовкам и содержимому (простой)
function seacrhInTitileAndContent($text, $table1, $table2){
$text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
global $pdo;
$sql = "SELECT 
    p.*, u.username 
    FROM $table1 AS p 
    JOIN $table2 AS u 
    ON p.id_user = u.id 
    WHERE p.status=1
    AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
$query = $pdo->prepare($sql);
$query->execute();
dbCheckError($query);
return $query->fetchAll();
}

// Выборка записи (posts) с автором для синг
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id){
global $pdo;
$sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
$query = $pdo->prepare($sql);
$query->execute();
dbCheckError($query);
return $query->fetch();
}


?>
