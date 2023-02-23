const show = document.querySelector('.show');
const hideEye = show.querySelector('.hide-eye');
const showEye = show.querySelector('.show-eye');
let password = document.querySelector('#password');


hideEye.addEventListener("click",() =>{
    password.type="password";
    showEye.classList.add("active");
    hideEye.classList.remove("active");
    //console.log(password.type)
})

showEye.addEventListener("click",() =>{
    password.type="text";
    hideEye.classList.add("active");
    showEye.classList.remove("active");
    //console.log(password.type)
})