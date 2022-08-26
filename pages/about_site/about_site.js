// const sideMenu = document.querySelector("aside");
// const menuBtn = document.querySelector("#menu-btn");
// const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// //show sidebar
// menuBtn.addEventListener('click', () => {
//     sideMenu.style.display = 'block';
//     document.getElementById('aside-menu').classList.add('visible');
// // })


// //close sidebar
// closeBtn.addEventListener('click', () => {
//     sideMenu.style.display = 'none';
// })


//change theme
// if(!sessionStorage.contains('span')){
//     sessionStorage.setItem('span','span1');
// }

// var span1=themeToggler.querySelector('span:nth-child(1)').classList;
// var span2=themeToggler.querySelector('span:nth-child(2)').classList;
// if(sessionStorage.getItem('span')=='span1'){
//     span2.remove('active');
//     span1.add('active');
//     document.body.classList.remove('dark-theme-variables');
// }
// else if(sessionStorage.getItem('span')=='span2'){
//     span1.remove('active');
//     span2.add('active');
//     document.body.classList.add('dark-theme-variables');
// }



// themeToggler.addEventListener('click', () => {
//     if(!sessionStorage.contains('span')){
//         sessionStorage.setItem('span','span2');
//     }
    
//     var span1=themeToggler.querySelector('span:nth-child(1)').classList;
//     var span2=themeToggler.querySelector('span:nth-child(2)').classList;
    
        
    
//     if(sessionStorage.getItem('span')=='span1'){
//         span1.remove('active');
//         span2.add('active');
//         document.body.classList.add('dark-theme-variables');

//         sessionStorage.removeItem('span');
//         sessionStorage.setItem('span','span2');
//         var x= sessionStorage.getItem('span');
//         alert(x);
//     }
//     else if(sessionStorage.getItem('span')=='span2'){
//         span2.remove('active');
//         span1.add('active');
//         document.body.classList.remove('dark-theme-variables');

//         sessionStorage.removeItem('span');
//         sessionStorage.setItem('span','span1');
//         var x= sessionStorage.getItem('span');
//         alert(x);
//     }

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


//card animation
const txts=document.querySelector(".animate-txt").children,
txtsLen=txts.length;
let index=0;
function animateText(params) {
for(let i=0; i<txtsLen;i++)
{
  txts[i].classList.remove("text-in");
}
txts[index].classList.add("text-in");
if(index == txtsLen-1)
{
  index=0;
}
else{
  index++;
}
setTimeout(animateText,2000)
}
window.onload=animateText;