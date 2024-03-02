const fadeout=()=>{
    const loader=document.querySelector(".preloader");
    loader.classList.remove("preloader")
}
window.addEventListener("load",fadeout);