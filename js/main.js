'use strict'
let comments_comments = document.querySelectorAll('.comment_button');
for(var i=0; i < comments_comments.length;i++){
    comments_comments[i].addEventListener('click',add_comment_comment_form);

}

/*let edit_profile=document.querySelectorAll('.edit profile');
for(var i=0; i <edit_profile.length;i++){
    edit_profile[i].addEventListener('click',)

}

<div class="edit profile">
<p>Edit profile</p>
</div>*/

function  add_comment_comment_form(){
    var comment_comment = this.parentElement.querySelector('.comment_comment');
    
    if(comment_comment.style.display === "none")
        comment_comment.style.display = "block";

    else comment_comment.style.display = "none";
}