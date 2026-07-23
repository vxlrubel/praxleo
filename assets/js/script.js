document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('menu-toggle');
    const close = document.getElementById('menu-close');
    const menu = document.getElementById('offcanvas-menu');
    const overlay = document.getElementById('offcanvas-overlay');

    if (!toggle || !menu) return;

    const openMenu = ()=>{
        menu.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    const closeMenu = ()=>{
        menu.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    toggle.addEventListener('click', openMenu);
    close.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);


    // move menu indecator
    const imenu = document.querySelector("#menu-primacy-and-secondary");
    const indicator = document.querySelector(".menu-indicator");

    if (!imenu || !indicator) return;

    const items = imenu.querySelectorAll("li");

    function moveIndicator(item) {
        const menuRect = imenu.getBoundingClientRect();
        const rect = item.getBoundingClientRect();

        console.log(rect)

        indicator.style.width = `${rect.width}px`;
        indicator.style.height = `${rect.height}px`;
        indicator.style.left = `${rect.left - menuRect.left}px`;
        indicator.style.top = `${rect.top - menuRect.top}px`;
    }

    const activeItem =
        imenu.querySelector(".current-menu-item") ||
        imenu.querySelector(".current_page_item") ||
        items[0];

    moveIndicator(activeItem);

    items.forEach(item => {
        item.addEventListener("mouseenter", () => {
            moveIndicator(item);
        });
    });

    imenu.addEventListener("mouseleave", () => {
        moveIndicator(activeItem);
    });

    window.addEventListener("resize", () => {
        moveIndicator(activeItem);
    });
    
    
    
    
    
    
});