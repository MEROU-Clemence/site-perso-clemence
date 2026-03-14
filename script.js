document.addEventListener('DOMContentLoaded', function () {
    // ****** Nav Mobile
    function openBurger() {
        var MobNav = $('.navbar-toggler');
        MobNav.on('click', function () {
            $('.navbar-toggler .btn-menu').toggleClass('d-none');
            $('.nav-mobile').toggleClass('nav-mobile-active');
            $('.first-nav').toggleClass('first-nav-active');
        });
    }

    // ****** Curseur animation
    function cursorFollow() {
        const cursor = document.querySelector(".cursor-follow");

        let mouseX = 0;
        let mouseY = 0;
        let posX = 0;
        let posY = 0;

        let started = false;
        let hideTimer;

        document.addEventListener("mousemove", (e) => {

        mouseX = e.clientX;
        mouseY = e.clientY;

        if(!started){
            posX = mouseX;
            posY = mouseY;
            started = true;
        }

        cursor.style.opacity = "1";

        clearTimeout(hideTimer);

        hideTimer = setTimeout(() => {
            cursor.style.opacity = "0";
        }, 300);

        });

        function animate(){

        if(started){
            posX += (mouseX - posX) * 0.1;
            posY += (mouseY - posY) * 0.1;

            cursor.style.left = posX + "px";
            cursor.style.top = posY + "px";
        }

        requestAnimationFrame(animate);
        }

        animate();
    }

    // ****** Initialisation des modules
    openBurger();
    cursorFollow();
})