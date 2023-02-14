'use strict';

let menu_active = document.querySelector(".menu_active");
let bg_menu = document.querySelector(".bg_menu");
let bodyscr = document.querySelector('body');
brg_menu.addEventListener('click', () =>{
    br_menu_show.style.display = 'block';
    // br_menu_show.style.transform = 'translateX(0)';
    // br_menu_show.classList.add('menu_active');
    bodyscr.style.overflowY = 'hidden';
    bg_menu.style.display = 'block';
});
close_br_menu.addEventListener('click', () => {
    // br_menu_show.style.transform = 'translateX(100%)';
    // br_menu_show.classList.remove('menu_active');
    bg_menu.style.display = 'none';
    br_menu_show.style.display = 'none';
    bodyscr.style.overflowY = 'scroll';
});
window.onclick = function(event) {
    if (event.target == bg_menu){
        bg_menu.style.display = "none";
        bodyscr.style.overflowY = 'scroll';
    }
}





// ЧЕРЕЗ КЛАССЫ ПРОВЕРКА - ДЛЯ МЕНЮ ЗАКРЫТИЕ ЧЕРЕЗ БОДИ