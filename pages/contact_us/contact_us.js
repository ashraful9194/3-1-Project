
// const themeToggler = document.querySelector(".theme-toggler");



// //nuruvai pro

// //alert(localStorage.getItem('theme'))

// if(localStorage.getItem('theme')=='dark'){
//     document.body.classList.add('dark-theme-variables');
// }else{
//     document.body.classList.remove('dark-theme-variables');
// }


// themeToggler.addEventListener('click', () => {
//     document.body.classList.toggle('dark-theme-variables');
//     if(localStorage.getItem('theme')=='dark'){
//         localStorage.setItem("theme", "light");
//     }else{
//         localStorage.setItem("theme", "dark");
//     }
    
//     themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
//     themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
// })


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