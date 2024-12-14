// Open/Close dropdown
const dropdown = document.getElementById('dropdown');
const openMenu = () => dropdown.classList.add('open');
const closeMenu = () => dropdown.classList.remove('open');


// Prefetch pages in nav on load
window.onload = () => {
    const links = document.querySelectorAll('nav a');
    const prefetchedUrls = new Set();

    links.forEach(link => {
        const url = link.href;

        if (!prefetchedUrls.has(url)) {
            prefetchedUrls.add(url);

            if (!document.querySelector(`link[rel="prefetch"][href="${url}"]`)) {
                const prefetchLink = document.createElement('link');
                prefetchLink.rel = 'prefetch';
                prefetchLink.href = url;
                document.head.appendChild(prefetchLink);
            }
        }
    });
};


// Sub-menu toggle for mobile view
document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.submenu-toggle');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const parentLi = button.closest('li');
            const subMenu = parentLi.querySelector('.sub-menu');

            if (subMenu) {
                parentLi.classList.toggle('active');
            }
        });
    });
});
