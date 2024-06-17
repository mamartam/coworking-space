const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
        else {
            entry.target.classList.remove('show');
        }
    });
});
const hiddenElements = document.querySelectorAll('.hidden, .hidden-2');
hiddenElements.forEach((el) => observer.observe(el));






const parentContainer = document.querySelector('.informationAboutCreator');

parentContainer.addEventListener('click', event => {
    const current = event.target;

    const isReadMoreBtn = current.classList.contains('read-more-btn');

    if (!isReadMoreBtn) return;

    const currentText = current.parentNode.querySelector('.read-more-text');
    currentText.classList.toggle('read-more-text--show');

    current.textContent = currentText.classList.contains('read-more-text--show') ?
        "Читати менше..." : "Читати більше...";
});






$(document).ready(function () {
    $('#rate-1').change(function () {
        if ($(this).is(':checked')) {
            $('form header').prepend('<span>I do not like it</span>');
        }
    });
});

const btn = document.querySelector('button');
const text = document.querySelector(".text");
const widget = document.querySelector(".star-widget");
const editBtn = document.querySelector(".edit");

btn.addEventListener('click', (event) => {
    event.preventDefault();
    widget.style.display = "none";
    text.style.display = "block";
});

editBtn.addEventListener('click', (event) => {
    event.preventDefault();
    widget.style.display = "block";
    text.style.display = "none";
});



function gotoLink(link) {
    console.log(link.value);
    location.href = link.value;
    // window.open(link.value); // закоментовано або видалено
}

// document.addEventListener('DOMContentLoaded', () => {
//     const buttonCallMe = document.getElementById('buttonCallMe');
//     const poppup = document.getElementById('poppup');
//     const closeBtn = document.getElementById('closeBtn');

//     showPopupBtn.addEventListener('click', () => {
//         popup.classList.add('showPoppup');
//     });

//     closePopupBtn.addEventListener('click', () => {
//         popup.classList.remove('showPoppup');
//     });

//     // Optional: Close the popup when clicking outside of it
//     window.addEventListener('click', (event) => {
//         if (event.target === popup) {
//             popup.classList.remove('showPoppup');
//         }
//     });
// });





