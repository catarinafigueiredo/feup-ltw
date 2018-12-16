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



//INICIO TRATAR VOTOS
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


//FIM TRATAR VOTOS

// DELETE STORY-INICIO
let trash_cans= document.querySelectorAll("div.trash-can");
console.log(trash_cans);
if(trash_cans)
trash_cans.forEach((trash_can)=> trash_can.addEventListener('click',deleteStory));

    function deleteStory(event){
        

        if(event.target.closest("a[id=delete-story]"))
        {
            let iss= document.querySelector("button.order-button.active");
            let order= iss.getElementsByTagName('p')[0].innerHTML;
            let votes= event.target.closest('div.trash-can');
            let parent= event.target.parentElement;
            //console.log(parent);
            let story_id= parent.querySelector('input[name=story_id]').value;
            let type=order;
            let request= new XMLHttpRequest();
            request.open('POST','../api/delete_story.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
               
               
               // console.log(document.getElementsByClassName("order-button active").innerText);
                
                //let order= isso.querySelector('p').value;
                
                //console.log(order);
                let Storys= document.querySelector('div.ordered-publications');
               console.log(Storys);
                Storys.innerHTML=this.responseText;
            });
            request.send(encodeForAjax({
                story_id: story_id,
                type: type
               
            }));
            event.preventDefault();

        }
        
    }
//DELETE STORY -END


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
            let type = current[0].querySelector('p').innerHTML;
            let request = new XMLHttpRequest();
            request.open('POST','../api/story_comment.php',true);
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            request.addEventListener('load',function(){
                let storyPublications= document.querySelector('div.comments-storys');
                storyPublications.innerHTML=this.responseText;
                let votes= document.querySelectorAll("div.vote-toggle");
                if(votes) votes.forEach((vote)=> vote.addEventListener('click',submitVote));
                let trash_cans= document.querySelectorAll("div.trash-can");
                if(trash_cans)
                trash_cans.forEach((trash_can)=> trash_can.addEventListener('click',deleteStory));
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