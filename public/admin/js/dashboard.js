// Выбор файлов и изменение текста
let inputfile = document.querySelectorAll('.inputfile'),
    fileText = document.querySelectorAll('.file-text');

if (inputfile.length > 0) {

  for (let i = 0; i < inputfile.length; i++) {
    inputfile[i].onchange = function() {
      let filesName = '';
      for (let j = 0; j < this.files.length; j++) {
        filesName += this.files[j].name + ' ';
      }
      fileText[i].innerHTML = filesName;
    }
  }

}

// air-datepicker
let datepickerHere = document.querySelectorAll('.datepicker-here');

if (datepickerHere) {
  datepickerHere.forEach(function (item) {
    const datepicker = new AirDatepicker(item, {
      autoClose: true
    });
  });
}

// air-datepicker-year
let datepickerYear = document.querySelector('.datepicker-year');

if (datepickerYear) {
  const datepicker = new AirDatepicker('.datepicker-year', {
    view: 'years',
    minView: 'years',
    dateFormat: 'yyyy',
    autoClose: true
  });
}

// air-datepicker-date-and-time
let dateAndTimepicker = document.querySelector('.date-and-timepicker');

if (dateAndTimepicker) {
  const datepicker = new AirDatepicker('.date-and-timepicker', {
    timepicker: true,
    minHours: 6,
    minutesStep: 5,
  });
}

// Только цифры в поле Прайс
let inputDigitsOnly = document.querySelector('.js-digits-only');
if (inputDigitsOnly) {
  inputDigitsOnly.oninput = function() {
    this.value = this.value.replace(/[^0-9\.]/g, '');
  }
}

// Маска ввода телефона
let phone = document.querySelector('#phone');
if (phone) {
  let maskOptionsPhone = {
    mask: '8 (0000) 00-00-00'
  };
  let mask = IMask(phone, maskOptionsPhone);
}

// Замена контента в tinymce страница Преподавателям Списки студентов
let spiskiStudentovForm = document.querySelector('.prepodavatelyam-spiski-studentov-form');

if (spiskiStudentovForm) {
  let formSelect = document.querySelector('.form-select'),
      textItems = document.querySelectorAll('.hidden-text .item');

  formSelect.addEventListener('change', function() {
    let index = formSelect.selectedIndex;
    tinyMCE.activeEditor.setContent(textItems[index].innerHTML);
  })
}

// Замена контента страница Абитуриенту Направления подготовки
/*
let napravleniyaPodgotovkiForm = document.querySelector('.abiturientu-napravleniya-podgotovki-form');

if (napravleniyaPodgotovkiForm) {
  let formSelect = document.querySelector('.form-select'),
      textItems = document.querySelectorAll('.hidden-text .item');

  formSelect.addEventListener('change', function() {
    let index = formSelect.selectedIndex,
        inputId = document.querySelector('#inputId'),
        inputChairman = document.querySelector('#inputChairman'),
        inputTeachers = document.querySelector('#inputTeachers'),
        imageLinkWrapper = document.querySelector('#image-link-wrapper'),
        inputDiploma = document.querySelector('#inputDiploma');

    inputId.value = textItems[index].querySelector('.id').innerHTML;
    inputChairman.value = textItems[index].querySelector('.chairman').innerHTML;
    inputTeachers.value = textItems[index].querySelector('.teachers').innerHTML;
    imageLinkWrapper.innerHTML = textItems[index].querySelector('.gallery').innerHTML;
    inputDiploma.value = textItems[index].querySelector('.diploma').innerHTML;
    tinyMCE.activeEditor.setContent(textItems[index].querySelector('.text').innerHTML);
  })
}
*/


// Замена контента страница Студентам Расписание
let studentamRaspisanieForm = document.querySelector('.studentam-raspisanie-form');

if (studentamRaspisanieForm) {
  let formSelect = document.querySelector('.form-select'),
      textItems = document.querySelectorAll('.hidden-text .item');

  formSelect.addEventListener('change', function() {
    let index = formSelect.selectedIndex,
        inputId = document.querySelector('#inputId'),
        sheduleLinkWrapper = document.querySelector('#shedule-link-wrapper'),
        attestationLinkWrapper = document.querySelector('#attestation-link-wrapper');

    inputId.value = textItems[index].querySelector('.shedule').innerHTML;
    sheduleLinkWrapper.innerHTML = textItems[index].querySelector('.shedule').innerHTML;
    attestationLinkWrapper.innerHTML = textItems[index].querySelector('.attestation').innerHTML;
  })
}

// Fade out success message
let alertSuccess = document.querySelector('.alert-success');

if (alertSuccess) {
  fadeOut(alertSuccess, 3000);
}

function fadeOut (el, timeout) {
  el.style.opacity = 1;
  el.style.transition = `opacity ${timeout}ms`;
  el.style.opacity = 0;

  setTimeout(() => {
    el.style.display = 'none';
  }, timeout);

  return false;
};