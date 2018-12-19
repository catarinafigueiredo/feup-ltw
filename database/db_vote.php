<?php
include_once('../includes/database.php');

function checkIfvoteUp($username,$PostID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE username = ? and PostID=? and CommentID is null  and typeVote=? ');
    $stmt->execute(array($username,$PostID,'up'));
    $user= $stmt->fetch();
    return $user !== false ;

}
function checkIfvoteDown($username,$PostID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE username = ? and PostID = ? and CommentID is null and typeVote=?');
    $stmt->execute(array($username,$PostID,'down'));
    $user= $stmt->fetch();
    return $user !== false ;

}

function checkIfvote($username,$postID,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE username = ? and PostID = ?  and CommentID is null');
  
    $stmt->execute(array($username,$postID));
    $user= $stmt->fetch();
    
    return $user !== false ;

}

function createVoteUp($PostID,$username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Vote VALUES(NULL,?,?,NULL,?)');
    $stmt->execute(array($PostID,$username,'up'));

    $stmt = $db->prepare('UPDATE Post SET up = 1 + up WHERE PostID = ?');
    $stmt->execute(array($PostID));


}
function createVoteDown($PostID,$username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Vote VALUES(NULL,?,?,NULL,?)');
    $stmt->execute(array($PostID,$username,'down'));

    $stmt = $db->prepare('UPDATE Post SET down = 1 + down WHERE PostID = ? ');
    $stmt->execute(array($PostID));
    

}
/**
 * Deletes a certain vote from the database.
 */
function deleteVoteUp($storyid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and typeVote=? and CommentID is null');
    $stmt->execute(array($storyid,'up'));

    
    $stmts = $db->prepare('UPDATE Post SET up =up-1 WHERE PostID = ?');
    $stmts->execute(array($storyid));

}

function deleteVoteDown($storyid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and typeVote=?and CommentID is null');
    $stmt->execute(array($storyid,'down'));

    $stmts = $db->prepare('UPDATE Post SET down =  down - 1  WHERE PostID = ?');
    $stmts->execute(array($storyid));
}

function checkIfvoteUpComment($username,$PostID,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE username = ? and PostID=? and CommentID=? and typeVote=? ');
    $stmt->execute(array($username,$PostID,$CommentID,'up'));
    $user= $stmt->fetch();
    return $user !== false ;

}
function checkIfvoteDownComment($username,$PostID,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE username = ? and PostID = ? and CommentID=? and typeVote=?');
    $stmt->execute(array($username,$PostID,$CommentID,'down'));
    $user= $stmt->fetch();
    return $user !== false ;

}

function checkIfvoteComment($username,$postID,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE username = ? and PostID = ? and CommentID=? ');
    $stmt->execute(array($username,$postID,$CommentID));
    $user= $stmt->fetch();
    return $user !== false ;

}

function createVoteUpComment($PostID,$username,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Vote VALUES(NULL,?,?,?,?)');
    $stmt->execute(array($PostID,$username,$CommentID,'up'));

    $stmt = $db->prepare('UPDATE Comment SET up = 1 + up WHERE PostID = ? and CommentID=?');
    $stmt->execute(array($PostID,$CommentID));


}
function createVoteDownComment($PostID,$username,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('INSERT INTO Vote VALUES(NULL,?,?,?,?)');
    $stmt->execute(array($PostID,$username,$CommentID,'down'));

    $stmt = $db->prepare('UPDATE Comment SET down = 1 + down WHERE PostID = ?and CommentID=?');
    $stmt->execute(array($PostID,$CommentID));
    

}
/**
 * Deletes a certain vote from the database.
 */
function deleteVoteUpComment($storyid,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and typeVote=?and CommentID=?');
    $stmt->execute(array($storyid,'up',$CommentID));

    
    $stmts = $db->prepare('UPDATE Comment SET up =up-1 WHERE PostID = ?and CommentID=?');
    $stmts->execute(array($storyid,$CommentID));

}

function deleteVoteDownComment($storyid,$CommentID){
    $db= Database::instance()->db();
    $stmt= $db->prepare('DELETE FROM Vote WHERE PostID = ? and typeVote=?and CommentID=?');
    $stmt->execute(array($storyid,'down',$CommentID));

    $stmts = $db->prepare('UPDATE Comment SET down =  down - 1  WHERE PostID = ?and CommentID=?');
    $stmts->execute(array($storyid,$CommentID));
}



function getUpVotes($storyid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT up FROM Post WHERE  PostID=? ');
    $stmt->execute(array($storyid));
    $user= $stmt->fetch();
    return $user;
}
function getDownVotes($storyid){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT down FROM Post WHERE  PostID=? ');
    $stmt->execute(array($storyid));
    $user= $stmt->fetch();
    return $user;
}

function getUpVotesComment($comment_id){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT up FROM Comment WHERE  CommentID=? ');
    $stmt->execute(array($comment_id));
    $user= $stmt->fetch();
    return $user;
}
function getDownVotesComment($comment_id){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT down FROM Comment WHERE  CommentID=? ');
    $stmt->execute(array($comment_id));
    $user= $stmt->fetch();
    return $user;
}

function voteUp($storyid,$username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE  CommentID is Null and PostID =? and username=? and typeVote=?');
    $stmt->execute(array($storyid,$username,'up'));
    $user= $stmt->fetch();
    if( empty($user)){
           return false;
       }else{   
            return true;
       }
}
function voteDown($storyid,$username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE  CommentID is Null and PostID =? and username=? and typeVote=?');
    $stmt->execute(array($storyid,$username,'down'));
    $user= $stmt->fetch();
    if( empty($user)){
           return false;
       }else{ 
            return true;
       }
}
function voteUpComment($commentid,$storyid,$username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE  CommentID=? and PostID =? and username=? and typeVote=?');
    $stmt->execute(array($commentid,$storyid,$username,'up'));
    $user= $stmt->fetch();
    if( empty($user)){
           return false;
       }else{   
            return true;
       }
}
function voteDownComment($commentid,$storyid,$username){
    $db= Database::instance()->db();
    $stmt= $db->prepare('SELECT * FROM Vote WHERE  CommentID = ? and PostID =? and username=? and typeVote=?');
    $stmt->execute(array($commentid,$storyid,$username,'down'));
    $user= $stmt->fetch();
    if( empty($user)){
           return false;
       }else{ 
            return true;
       }
}

?>