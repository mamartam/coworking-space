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


// const hiddenElementssecond = document.querySelectorAll('.hidden-2');
// hiddenElements.forEach((el) => observer.observe(el));