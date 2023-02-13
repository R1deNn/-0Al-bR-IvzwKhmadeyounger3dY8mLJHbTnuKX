'use strict';
brg_menu.addEventListener('click', () =>{
    var show = true;
    br_menu_show.style.display = 'block';
    let bodyscr = document.querySelector('body');

    bodyscr.style.overflowY = 'hidden';
    console.log(show)
    close_br_menu.addEventListener('click', (show) => {
        br_menu_show.style.display = 'none';
        bodyscr.style.overflowY = 'scroll';
        show=false;
    });
});



bodyscr.addEventListener('click', (show) =>{
    if(show==true){
        br_menu_show.style.display = 'none';
        bodyscr.style.overflowY = 'scroll';
        show=false;
        console.log(show);
    }
});





// ЧЕРЕЗ КЛАССЫ ПРОВЕРКА - ДЛЯ МЕНЮ ЗАКРЫТИЕ ЧЕРЕЗ БОДИ