'use strict'
window.onscroll= function(){
    functionCroll()
};
var header= document.getElementById("headerFixo");

var sticky= header.offsetTop;

function functionCroll(){
    if(window.pageYOffset>sticky){
        header.classList.add("sticky");
    }else{
        header.classList.remove("sticky");
    }
}



//INICIO TRATAR VOTOS STORYS
let votes= document.querySelectorAll("div.vote-toggle");
console.log(votes);
if(votes)
    votes.forEach((vote)=> vote.addEventListener('click',submitVote));

    function submitVote(event){
        if(event.target.closest("a[id=voto]"))
        {
            let votes= event.target.closest('div.vote-toggle');
            let parent= event.target.parentElement;
            console.log(parent);
            let story_id= parent.querySelector('input[name=story_id]').value;
            let type= parent.querySelector('input[name=type]').value;
            let request= new XMLHttpRequest();
            request.open('POST','../api/vote.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                votes.innerHTML=this.responseText;
            });
            request.send(encodeForAjax({
                story_id: story_id,
                type: type
            }));

        }
        
    }

//FIM TRATAR VOTOS COMMENTS

console.log(votes);
let votes_comment= document.querySelectorAll("div.vote-toggle-comment");
if(votes_comment)
    votes_comment.forEach((vote_comment)=> vote_comment.addEventListener('click',submitVote_comment));

    function submitVote_comment(event){
        if(event.target.closest("a[id=voto-comment]"))
        {
            let votes_comment= event.target.closest('div.vote-comment');
            let votes_comment_comment= event.target.closest('div.vote-toggle-comment');
            let parent= event.target.parentElement;
            console.log(parent);
            let story_id= parent.querySelector('input[name=story_id]').value;
            let type= parent.querySelector('input[name=type]').value;
            let comment_id= parent.querySelector('input[name=comment_id').value;
            let request= new XMLHttpRequest();
            request.open('POST','../api/vote_comment.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                votes_comment_comment.innerHTML=this.responseText;
            });
            request.send(encodeForAjax({
                story_id: story_id,
                type: type,
                comment_id: comment_id 
            }));

        }
        
    }

//FIM TRATAR VOTOS COMMENTS

// DELETE STORY-INICIO
let trash_cans= document.querySelectorAll("div.trash-can");
console.log(trash_cans);
if(trash_cans)
trash_cans.forEach((trash_can)=> trash_can.addEventListener('click',deleteStory));

    function deleteStory(event){
        
        if(event.target.closest("a[id=delete-story]"))
        {
            let iss= document.querySelector("button.order-button.active");
            
            let order;
            if(iss != null){
                console.log(iss);
              order = iss.getElementsByTagName('p')[0].innerHTML;
            }else{
                order="UserStorys";
            }
            
           
            let parent= event.target.parentElement;

            let story_id= parent.querySelector('input[name=story_id]').value;
            let type=order;
            let request= new XMLHttpRequest();
            request.open('POST','../api/delete_story.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
     
                let Storys= document.querySelector('div.ordered-publications');
                let Storys1= document.querySelector('div.comments-storys');
               console.log(Storys);
               if(Storys !=null){
                Storys.innerHTML=this.responseText;
               }else{
                Storys1.innerHTML=this.responseText;
               }
            });
            request.send(encodeForAjax({
                story_id: story_id,
                type: type
               
            }));
            event.preventDefault();

        }
        
    }
//DELETE STORY -END
var btnSubsContainer= document.getElementById("Subscribe_cat");
if(btnSubsContainer)
    var btnsSubs= btnSubsContainer.getElementsByClassName("button_subscribe");
    
if(btnsSubs){
    for (var i =0; i< btnsSubs.length; i++) {
        btnsSubs[i].addEventListener("click",function(){
            var current= document.getElementsByClassName("active");
            let order = current[0].querySelector('p').innerHTML;
            console.log(order);
            let request = new XMLHttpRequest();
            request.open('POST','../api/subscribeCategory.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                
                let Subsbutton= document.querySelector('div.Subscribe_cat');
                Subsbutton.innerHTML=this.responseText;
                
             

            });
            request.send(encodeForAjax({ order: order }));
        
        
        });
        
        
    }
}



let comments_comments = document.querySelectorAll('.comment_button');
for(var i=0; i < comments_comments.length;i++){
    comments_comments[i].addEventListener('click',add_comment_comment_form);

}
function checkIfValidOrder($order){
    var categories = getAllCategory();
    console.log(categories);
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
            let order = current[0].querySelector('p').innerHTML;
            console.log(this.className);
            var x = document.getElementById("Subscribe_cat");
            if (order=="Subscribed" ) {
                x.style.display = "flex";
            } else {
               x.style.display = "none";
            }
              
            
            let request = new XMLHttpRequest();
            request.open('POST','../api/orderPublications.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                let Storys= document.querySelector('div.ordered-publications');
                Storys.innerHTML=this.responseText;
                let votes= document.querySelectorAll("div.vote-toggle");
                if(votes) votes.forEach((vote)=> vote.addEventListener('click',submitVote));
                let trash_cans= document.querySelectorAll("div.trash-can");
                if(trash_cans) trash_cans.forEach((trash_can)=> trash_can.addEventListener('click',deleteStory));

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
            /*if(event.target.closest("a[id=voto]"))
        {
            let votes= event.target.closest('div.vote-toggle');
            let parent= event.target.parentElement;
            console.log(parent);
            let story_id= parent.querySelector('input[name=story_id]').value;*/ 
            var isso= document.getElementById("issoo");
            
            let username= isso.querySelector('input[name=username]').value;
            console.log(username);

            let type = current[0].querySelector('p').innerHTML;
            let request = new XMLHttpRequest();
            request.open('POST','../api/story_comment.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                let storyPublications= document.querySelector('div.comments-storys');
                storyPublications.innerHTML=this.responseText;
                let votes_comment= document.querySelectorAll("div.vote-toggle-comment");
                if(votes_comment)
                votes_comment.forEach((vote_comment)=> vote_comment.addEventListener('click',submitVote_comment));  
                let votes= document.querySelectorAll("div.vote-toggle");
                if(votes) votes.forEach((vote)=> vote.addEventListener('click',submitVote));
                let trash_cans= document.querySelectorAll("div.trash-can");
                if(trash_cans)
                trash_cans.forEach((trash_can)=> trash_can.addEventListener('click',deleteStory));
            });
            request.send(encodeForAjax({ type: type,
            username: username }));
        
        
        });
        
        
    }
}


// DELETE comment-INICIO
let trash_cans_comment= document.querySelectorAll("div.trash-can-comment");
console.log(trash_cans_comment);

if(trash_cans_comment)
trash_cans_comment.forEach((trash_can_comment)=> trash_can_comment.addEventListener('click',deleteComment));

    function deleteComment(event){
        
        if(event.target.closest("a[id=trash-can-comment]"))
        {
         
      
            let parent= event.target.parentElement;
            //console.log(parent);
            let story_id= parent.querySelector('input[name=story_id]').value;
            let comment_id= parent.querySelector('input[name=comment_id]').value;
            console.log(comment_id);
            let type="StoryPage";
            let request= new XMLHttpRequest();
            request.open('POST','../api/delete_comment.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                 // console.log(document.getElementsByClassName("order-button active").innerText);
                
                //let order= isso.querySelector('p').value;
                
               
                let Storys= document.querySelector('div.TrycommentsTeste');
               /* let Storys1= document.querySelector('div.comments-storys');
               console.log(Storys);
               if(Storys !=null){
                Storys.innerHTML=this.responseText;
               }else{
                Storys1.innerHTML=this.responseText;
               }*/
               Storys.innerHTML=this.responseText;
            });
            request.send(encodeForAjax({
                story_id: story_id,
                comment_id: comment_id,
                type: type
               
            }));
            event.preventDefault();

        }
        
    }
//DELETE comment -END



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
