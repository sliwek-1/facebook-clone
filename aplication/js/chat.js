const btn = document.querySelector('.submit');
const chatForm = document.querySelector('.chat');
let chatArea = document.querySelector('.chat-area');
const inputField = document.querySelector('.message');

chatForm.addEventListener('submit',(e) =>{
    e.preventDefault();
})



btn.addEventListener('click',() =>{
    let formData = new FormData(chatForm);
    fetch('./php/insert-chat.php',{
        method: 'post',
        body: formData
    })
    .then(response => response.text())
    .then(data => data)
    inputField.value = "";
})


setInterval(() =>{
    let formData = new FormData(chatForm);
    fetch('./php/get-chat.php',{
        method: 'post',
        body: formData
    })
    .then(response => response.text())
    .then(data => chatArea.innerHTML = data)
},500)