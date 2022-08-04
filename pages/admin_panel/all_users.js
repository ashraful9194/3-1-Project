const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

//show sidebar
menuBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'block';
    document.getElementById('aside-menu').classList.add('visible');
})


//close sidebar
closeBtn.addEventListener('click',()=>{
    sideMenu.style.display = 'none';
})


//change theme
// themeToggler.addEventListener('click',()=>{
//     document.body.classList.toggle('dark-theme-variables');
//     themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
//     themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
// })


//nuruvai pro

//alert(localStorage.getItem('theme'))

if(localStorage.getItem('theme')=='dark'){
    document.body.classList.add('dark-theme-variables');
}else{
    document.body.classList.remove('dark-theme-variables');
}


themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');
    if(localStorage.getItem('theme')=='dark'){
        localStorage.setItem("theme", "light");
    }else{
        localStorage.setItem("theme", "dark");
    }
    
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

