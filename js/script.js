const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click',()=>
    {
        //asta activeaza clasa din css ca sa se poata apasa butonul burger
        nav.classList.toggle('nav-active');

        //asta am pus-o ca links din meniu sa faca fade frumos chiar daca nu dai refresh la pagina
        navLinks.forEach((link, index) => {
            if(link.style.animation) 
            {
                link.style.animation = "";
            }
            else
            {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index/2 + 1.5}s`;
            }
          });

          // asta transforma burgerul in X
          burger.classList.toggle('toggle');
    });

}

navSlide();