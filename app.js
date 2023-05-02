$(document).ready(function () {
    $(window).scroll(function () {
        // barra de navegação aderente no script de rolagem
        if (this.scrollY > 20) {
            $('.navbar').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
        }

        //botão de rolagem para cima mostrar / ocultar script
        if (this.scrollY > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // script slide-up
    $('.scroll-up-btn').click(function () {
        $('html').animate({ scrollTop: 0 });
        //removendo a rolagem suave no clique do botão deslizante
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function () {
        // aplicando novamente a rolagem suave nos itens do menu, clique
        $('html').css("scrollBehavior", "smooth");
    });

    // menu de alternância / script da barra de navegação
    $('.menu-btn').click(function () {
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // digitando script de animação de texto
    var typed = new Typed(".typing", {
        strings: ["Developer", "Designer Web", "Freelancer", "Front End", "Back End"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    var typed = new Typed(".typing-2", {
        strings: ["Developer", "Designer Web", "Freelancer", "Front End", "Back End"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    // script de carrossel de coruja
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeOut: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });
});