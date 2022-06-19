const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'block';
    document.getElementById('aside-menu').classList.add('visible');
})

closeBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'none';
})