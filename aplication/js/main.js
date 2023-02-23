const userList = document.querySelector('.user-list');
const postArea = document.querySelector('.post-area');
let searchInput = document.querySelector('.search-input');

searchInput.addEventListener('keyup', () =>{
    let search = searchInput.value; 
    if(search != ""){
        searchInput.classList.add("active");
    }else{
        searchInput.classList.remove("active");
    }
    fetch('./php/search.php',{
        method: 'post',
        body: 'searchTerm=' + search,
        headers: {
            'Content-type': "application/x-www-form-urlencoded",
        }
    })
    .then(response => response.text())
    .then(data => userList.innerHTML = data)
})

setInterval(() => {
    fetch('./php/data.php')
    .then(response => response.text())
    .then(data => () =>{
        if(!searchInput.classList.contains("active")){
            userList.innerHTML = data;
        }
    })
},500)


setInterval(() => {
    fetch('./php/post-data.php')
    .then(response => response.text())
    .then(data => data)
    .catch(error => console.log(error))
},500)