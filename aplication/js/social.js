const likeBtn = document.querySelectorAll('.like');
const disLike = document.querySelectorAll('.dislike');
let disCounter = document.querySelector('.dis-counter');
let likeCounter = document.querySelector('.like-counter');


let action = "";

likeBtn.forEach(btn =>{
    btn.addEventListener('click',(e) =>{
        getVote('like',e);
    })
})

disLike.forEach(btn =>{
    btn.addEventListener('click',(e) =>{
        getVote('dislike',e);
    })
})



function getVote(action,e){
    e.preventDefault();
    let currentPost = e.target.parentElement.parentElement.parentElement;
    let postID = currentPost.querySelector('.post_id').value;
    let formdata = new FormData();
    formdata.append('action',action);
    formdata.append('post_id',postID);

    fetch('./php/updateOpinions.php',{
        method: 'post',
        body: formdata
    })
    .then(response => response.text())
    .then(data => data)
    .catch(error => error)

    window.location.reload();
}