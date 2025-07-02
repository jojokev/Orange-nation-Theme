import { createApp }  from 'vue';
import api from '../src/main.vue' ; 
import api2 from '../src/app.vue' ; 
import Swiper from 'swiper';
import 'swiper/css/swiper.css';
import 'fslightbox';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import 'bootstrap';
import { Tooltip } from 'bootstrap';
// poppers

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
tooltipTriggerList.forEach(el => new Tooltip(el));

const app = createApp (api);
app.mount('#app');

const app2 = createApp (api2);
app2.mount('#package');

document.addEventListener("DOMContentLoaded", function() {
  var swiper = new Swiper("#certificados", {
    slidesPerView: 5,
    spaceBetween: 15,
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
    },
    breakpoints: {
        350: {
            slidesPerView: 2,
        },
        640: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 4,
        },
        1024: {
          slidesPerView: 6,
        },
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  });
  var swiper2 = new Swiper(".destination", {
    spaceBetween: 15,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      350: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });
  var swiper3 = new Swiper(".swiperTour", {
    slidesPerView: 3,
    spaceBetween: 15,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      350: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      767: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });
});

const menuItems = document.querySelectorAll(".normal_menu, .mega_menu");

for (const item of menuItems) {
    item.addEventListener("click", function () {
        menuItems.forEach(i => i.classList.remove("active"));
        item.classList.add("active");
    });
}




// ------------- Funcion agregar estado activo para tabs ----------------------- //
const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')


tabs.forEach(tab => {
    
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)
    
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('js-active')
    })
    tabs.forEach(tab => {
      tab.classList.remove('js-active')
    })
    tab.classList.add('js-active');
    target.classList.add('js-active');
    
    
  })
});
function openCity(cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  document.querySelector(`button[data-city="${cityName}"]`).className += " active";
}

var tablinks = document.querySelectorAll(".tablinks");
tablinks.forEach(function(button) {
  button.addEventListener("click", function() {
    var cityName = this.getAttribute("data-city");
    openCity(cityName);
  });
});

if (tablinks.length > 0) {
  tablinks[0].click();
}

var btnMenu =  document.querySelector('.btn_menu');
var contMenu =  document.querySelector('.menu_content nav');
var body =  document.querySelector('body');
btnMenu.addEventListener("click", function() {
  if (contMenu.classList.contains('active')) {
    contMenu.classList.remove('active');
    body.style.overflow = '';
    btnMenu.classList.remove('active');
  } else {
    contMenu.classList.add('active');
    body.style.overflow = 'hidden';
    btnMenu.classList.add('active');
  }
});
var btnReservarElements = document.querySelectorAll('.btn_reservar');

btnReservarElements.forEach(function(btnReservar) {
    btnReservar.addEventListener("click", function() {
        var title = btnReservar.getAttribute('data-title');
        localStorage.setItem('tour', title);
        var url = window.location.origin + '/booking' ;
        window.location.href = url;
    });
});

var navbar = document.getElementById("navsingle");
var sticky = navbar ? navbar.offsetTop : 0;
var additionalOffset = 500;

function myFunction() {
  if (navbar) {
    if (window.pageYOffset >= sticky + additionalOffset) {
        navbar.classList.add("active");
    } else {
        navbar.classList.remove("active");
    }
  }
}
window.onscroll = function() {
  myFunction();
};

var btnContact = document.querySelector('.btn_contact');
if(btnContact){
  btnContact.addEventListener("click", function() {
    var formData = new FormData(document.getElementById("contact_form"));
  
    var nombre = formData.get('nombre').trim();
    var apellidos = formData.get('apellidos').trim();
    var email = formData.get('email').trim();
    var telefono = formData.get('telefono').trim();
    var mensaje = formData.get('mensaje').trim();
  
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    if (nombre === "" || email === "" || telefono === "" || apellidos === "" || mensaje === "") {
        alert("Please complete all the fields of the form.");
        return;
    } else if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }
    var mensajeCargando = document.querySelector(".loader_msg");
    mensajeCargando.classList.add("active");
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/wp-content/themes/neworange/email/src/contacto.php", true);
  
    xhr.onload = function () {
        mensajeCargando.classList.remove("active");
  
        if (xhr.status === 200) {
            alert("Message sent correctly, we will contact you as soon as possible");
            document.getElementById("contact_form").reset();
        } else {
            alert("Error sending message.");
        }
    };
    xhr.send(formData);
  });
}
 
// ------------- Funcionalidad de la pagina de blogs ----------------------- //

// Usar IntersectionObserver para animar la entrada de items(.animacionEntrada)
const options = {
    threshold: 0.15,
};

const intersectionCallback = (entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("visible");
        }
    });
};

const activarObservador = (classDiv) => {
    const targets = document.querySelectorAll(classDiv);
    targets.forEach((target) => {
        observer.observe(target);
    });
};

const observer = new IntersectionObserver(intersectionCallback, options);

activarObservador(".animacionEntrada");

document.addEventListener("DOMContentLoaded", function() {
  // Cargar mas blogs en la pagina de blogs
  const $buttonMoreBlogs = document.getElementById('more_blogs');
  const $loadBlogs = document.getElementById('load-file');

  if ($buttonMoreBlogs && $loadBlogs) {
    let countBlogs = 8;
    let ajaxURL = $buttonMoreBlogs.getAttribute('ajax-url');
    let tagID = $buttonMoreBlogs.getAttribute('tag');
    let searchKey = $buttonMoreBlogs.getAttribute('search');

    $buttonMoreBlogs.addEventListener('click', function() {
        $loadBlogs.style.display = "flex";
        fetch(ajaxURL + '?action=cargar_mas_posts&count=' + countBlogs + '&tag=' + tagID + '&search=' + searchKey)
        .then(response => response.text())
        .then(data => {
            document.getElementById("content_blogs").insertAdjacentHTML("beforeend", data);
            countBlogs += 8;
            activarObservador(".animacionEntrada");
            if (data.trim() === "") {
                $buttonMoreBlogs.style.display = "none";
            }
        })
        .catch(error => console.error('Error fetching blogs:', error))
        .finally(() => {
            $loadBlogs.style.display = "none";
        });
    });
  }
});

//
// ------------- Crear boton para subir una pagina de blog ----------------------- //
//
const $topButtonBlog = document.getElementById('top_button');
if($topButtonBlog){
  $topButtonBlog.addEventListener('click',()=>{
      window.scrollTo({
          top: 0,
          behavior: 'smooth'
      });
  });
}
