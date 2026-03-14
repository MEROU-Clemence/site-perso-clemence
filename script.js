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

    // ****** Curseurs animation
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

    // Curseur musique
    function cursorMusic() {
        const musicCursor = document.querySelector(".cursor-follow-music");

        let lastX = 0;
        let lastY = 0;

        document.addEventListener("mousemove", (e) => {

        const dx = e.clientX - lastX;
        const dy = e.clientY - lastY;

        const distance = Math.sqrt(dx * dx + dy * dy);

        // seuil minimum de mouvement pour créer une note
        if(distance > 10){

            const note = document.createElement("div");
            note.classList.add("music-note");

            const notes = ["♪","♫","♩","♬"];
            note.textContent = notes[Math.floor(Math.random() * notes.length)];

            note.style.left = e.clientX + "px";
            note.style.top = e.clientY + "px";

            document.body.appendChild(note);

            setTimeout(() => {
            note.remove();
            }, 1000);

            lastX = e.clientX;
            lastY = e.clientY;
        }

        });
    }

    // ****** Initialisation des modules autres pages
    if ($('body').hasClass('page-music')) {
        cursorMusic();
    }

    // ****** Initialisation des modules
    openBurger();
    cursorFollow();
})