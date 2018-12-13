<?php 
include_once('../includes/database.php'); 

function insertComment($username,$content,$storyid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Comment VALUES(?,NULL,NULL,?,?,?,?)');
    $stmt->execute(array($content,$storyid,$username,0,0));

   
}
function deleteComment($storyid,$commentid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and CommentID=? and FatherCommentID is NULL');
    $stmt->execute(array($storyid,$commentid));
    //ainda não elimina os comentarios de todos os filho
    //TODO: eliminar comentarios dos filhos todos
    //DIFICIL

    //$stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and CommentID=? and FatherCommentID =?');
    //$stmt->execute(array($storyid,$commentid));


    $stmt= $db->prepare('DELETE FROM Comment WHERE PostID = ?and CommentID=? ');
    $stmt->execute(array($storyid,$commentid));    

}

function deleteCommentComment($storyid,$commentidFather,$commentid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and CommentID=? and FatherCommentID=? ');
    $stmt->execute(array($storyid,$commentid,$commentidFather));

    $stmt= $db->prepare('DELETE FROM Comment WHERE PostID = ? and CommentID=? and FatherCommentID=? ');
    $stmt->execute(array($storyid,$commentid,$commentidFather));    

}


function insertCommentComment($username,$content,$storyid,$commentid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Comment VALUES(?,NULL,?,?,?,?,?)');
    $stmt->execute(array($content,$commentid,$storyid,$username,0,0));

   
}

/*function getAllComments($storyid){
    $db=Database::instance()->db();
    $stmt = $db->prepare();
    $stmt->execute(array());

}*/

?>