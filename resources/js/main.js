// Общие переменные
let body = document.querySelector('body'),
    homePage = document.querySelector('.home-page'),
    podatDokumentyPage = document.querySelector('.podat-dokumenty-page'),
    spiskiStudentovPage = document.querySelector('.spiski-studentov-page'),
    singlePage = document.querySelector('.single-page');

if (homePage) {
  // Слайдер Новости
  const promoSlider = new Swiper('.main-slider', {
    loop: true,
    pagination: {
      el: '.main-slider-wrapper .swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.main-swiper-navigation .swiper-button-next',
      prevEl: '.main-swiper-navigation .swiper-button-prev',
    },
  });
  
}



if (podatDokumentyPage) {

  // Только буквы в полях Фамилия, Имя, Отчество
  let inputLettersOnly = document.querySelectorAll('.letters-only');
  for (let i = 0; i < inputLettersOnly.length; i++) {
    inputLettersOnly[i].oninput = function() {
      this.value = this.value.replace(/[^a-zA-ZА-Яа-яЁё ]+$/gi,'');
    }
  } 

  // air-datepicker
  let datepickerHere = document.querySelector('.datepicker-here');

  if (datepickerHere) {
    const datepicker = new AirDatepicker('.datepicker-here', {
      autoClose: true
    });
  }

  // Выбор файла Документ PDF
  let inputfile = document.querySelectorAll('.inputfile'),
      pdfFileText = document.querySelectorAll('.pdf-file-text');

  for (let i = 0; i < inputfile.length; i++) {
    inputfile[i].onchange = function() {
      pdfFileText[i].innerHTML = this.files[0].name;
    }
  }

}

if (spiskiStudentovPage) {
  // Переключение курсов
  let courseItems = document.querySelectorAll('.select-course .item');
  courseItems.forEach(function (item, i) {
    item.addEventListener('click', () => {
      let courseActive = document.querySelector('.select-course .course-active'),
          texts = document.querySelectorAll('.text'),
          textActive = document.querySelector('.text-active');
      courseActive.classList.remove('course-active');
      item.classList.add('course-active');
      textActive.classList.remove('text-active');
      texts[i].classList.add('text-active');
    });
  })
}


if (singlePage) {
  // Photoswipe selector
  let gallery = document.querySelector('.gallery');
  if (gallery) {
    initPhotoSwipeFromDOM('.gallery');
  }
  

}

// mobile menu
let burgerMenuWrapper = document.querySelector('.burger-menu-wrapper'),
    mobileMenu = document.querySelector('.mobile-menu'),
    burgerMenuText = document.querySelector('.burger-menu__text');

burgerMenuWrapper.onclick = function () {
  body.classList.toggle('overflow-hidden');
  mobileMenu.classList.toggle('down');
  if (burgerMenuText.innerText == 'Открыть меню') {
    burgerMenuText.innerText = 'Закрыть меню';
  } else {
    burgerMenuText.innerText = 'Открыть меню';
  }
  burgerMenuText.classList.toggle('active');
  burgerMenuWrapper.classList.toggle('active');
}

let listParentClick = document.querySelectorAll('.mobile-menu li.menu-item a');
for (let i=0; i < listParentClick.length; i++) {
  listParentClick[i].onclick = closeMenu;
}

function closeMenu (event) {
  event.preventDefault();
  burgerMenuWrapper.classList.remove('active');
  burgerMenuText.innerText = 'Открыть меню';
  burgerMenuText.classList.remove('active');
  mobileMenu.classList.remove('down');
  body.classList.remove('overflow-hidden');
  let hrefClick = this.href;
  setTimeout(function() {location.href = hrefClick}, 500);
}

let menuItemHasChildren = document.querySelectorAll('.menu-item-has-children');

menuItemHasChildren.forEach(function (item) {
  item.addEventListener('click', () => {
    let active = document.querySelector('.menu-item.active');
    if (active) {
      active.classList.remove('active');
    }
    if (item == active) {
      item.classList.remove('active');
    } else {
      item.classList.add('active');
    }   
  });
});


// Input mask
function inputPhoneMask() {
  const elementPhone = document.querySelectorAll('.js-input-phone-mask');

  const maskOptionsPhone = {
    mask: '+{7}(000)000-00-00'
  };

  elementPhone.forEach((item) => {
    const mask = IMask(item, maskOptionsPhone);
  });
}

inputPhoneMask();


//  Версия для слабовидящих
new isvek.Bvi();

