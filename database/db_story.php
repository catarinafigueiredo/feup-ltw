<?php
include_once('../includes/database.php');

function getUserStories($username){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post WHERE username= ? ');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
}

function getAllStories(){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post ');
    $stmt->execute(array());
    return $stmt->fetchAll();

}

function get_stories_by_name($information){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post WHERE Title LIKE ?');
    $stmt->execute(array($information));
    return $stmt->fetchAll();
}



function getStory($postID){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Post WHERE postID=? ');
    $stmt->execute(array($postID));
    return $stmt->fetchAll();
}

function getAllComments($postID){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Comment WHERE PostID=? ');
    $stmt->execute(array($postID));
    return $stmt->fetchAll();

}

function getAllCategories(){
    $db=Database::instance()->db();
    $stmt=$db->prepare('SELECT * FROM Category');
    $stmt->execute(array());
    return $stmt->fetchAll();
}
function deleteStory($storyid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? ');
    $stmt->execute(array($storyid));

    $stmt= $db->prepare('DELETE FROM Comment WHERE PostID = ? ');
    $stmt->execute(array($storyid));    

  
    $stmt= $db->prepare('DELETE FROM Post WHERE PostID = ? ');
    $stmt->execute(array($storyid));

    

}

function insertStory($username,$title,$content,$category,$date){

    $date1 = new DateTime(); //this returns the current date time
    $result = $date1->format('Y-m-d-H-i-s');  


    $db=Database::instance()->db();
    
   
    
    $stmt=$db->prepare('INSERT INTO Post VALUES(?,?,NULL,?,?,0,0,?)');

    $stmt->execute(array($title,$content,$category,$username,$result));
    $Story=$stmt->fetchAll();
    $dd="insere na bd";
    if(!checkIfSubscribed($username,$category)){
        

        $stmt=$db->prepare('INSERT INTO SubscribeCategory VALUES(?,?)');
        $stmt->execute(array($username,$category));
        echo $dd;
   }
   return $Story;
}

function checkIfSubscribed($username,$category){
    $db=Database::instance()->db();
    $stmt= $db->prepare('SELECT CategoryName  FROM SubscribeCategory  WHERE username= ? and CategoryName=?');
    $stmt->execute(array($username,$category));
    $isso="nao existe ainda";
    $isso1="ja existe";
    $user=$stmt->fetchAll();
    print_r(reset($user));

   if( empty(reset($user))){
    echo $isso;
       return false;

   }else{ 
    echo $isso1;
      
        return true;
   }

  

    /*$categoriesUser= $stmt->fetchAll();

    foreach($categoriesUser as $categoryUser){
        if($categoryUser === $category){
            return true;
        }else{
            return false;
        }
    }*/
}

?>


