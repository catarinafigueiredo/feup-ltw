'use strict'
let comments_comments = document.querySelectorAll('.comment_button');
for(var i=0; i < comments_comments.length;i++){
    comments_comments[i].addEventListener('click',add_comment_comment_form);

}

var btnContainer= document.getElementById("orderDiv");
if(btnContainer)
    var btns= btnContainer.getElementsByClassName("order-button");
    
if(btns){
    for (var i =0; i< btns.length; i++) {
        btns[i].addEventListener("click",function(){
            var current= document.getElementsByClassName("active");
            current[0].className= current[0].className.replace(" active", "");
            this.className +=" active";
            console.log(this.className);
            let order = current[0].querySelector('p').innerHTML;
            let request = new XMLHttpRequest();
            request.open('POST','../api/orderPublications.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                let freshPublications= document.querySelector('div.ordered-publications');
                freshPublications.innerHTML=this.responseText;
            });
            request.send(encodeForAjax({ order: order }));
        
        
        });
        
        
    }
}


var btnContainerCorS= document.getElementById("chooseCorSDiv");
console.log(btnContainerCorS);
if(btnContainerCorS){
    var btnsCorS= btnContainerCorS.getElementsByClassName("chooseCorS-button");
    console.log(btnsCorS);
}
if(btnsCorS){
    for (var i =0; i< btnsCorS.length; i++) {
        btnsCorS[i].addEventListener("click",function(){
            var current= document.getElementsByClassName("active");
            current[0].className= current[0].className.replace(" active", "");
            this.className +=" active";
            console.log(this.className);
            let type = current[0].querySelector('p').innerHTML;
            let request = new XMLHttpRequest();
            request.open('POST','../api/story_comment.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                let storyPublications= document.querySelector('div.comments-storys');
                storyPublications.innerHTML=this.responseText;
            });
            request.send(encodeForAjax({ type: type }));
        
        
        });
        
        
    }
}




function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
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