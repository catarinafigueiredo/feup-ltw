'use strict'
let comments_comments = document.querySelectorAll('.comment_button');
for(var i=0; i < comments_comments.length;i++){
    comments_comments[i].addEventListener('click',add_comment_comment_form);

}
function  add_comment_comment_form(){
    var comment_comment = this.parentElement.querySelector('.comment_comment');
    
    if(comment_comment.style.display === "none")
        comment_comment.style.display = "block";

    else comment_comment.style.display = "none";
}