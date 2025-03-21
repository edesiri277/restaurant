/**
   * Preloader
   */
const preloader = document.querySelector('#preloader');
if (preloader) {
  window.addEventListener('load', () => {
    preloader.remove();
  });
}
/**
 *  Nav Bar
 */
const header = document.querySelector('.header');
function fixedNavbar(){
  header.classList.toggle('scroll', window.pageYOffset > 0)
}  
fixedNavbar();
  window.addEventListener('scroll', fixedNavbar);

  let menu = document.querySelector('#menu-btn');
  let userBtn = document.querySelector('#user-btn');

  menu.addEventListener('click', function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
  })
  userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
  })



let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');

/**
   * Scroll top button
   */
const scrollTop = document.querySelector('.scroll-top');
if (scrollTop) {
  const togglescrollTop = function() {
    window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
  }
  window.addEventListener('load', togglescrollTop);
  document.addEventListener('scroll', togglescrollTop);
  scrollTop.addEventListener('click', window.scrollTo({
    top: 0,
    behavior: 'smooth'
  }));
}

/**
   * Initiate gallery lightbox 
   */
const galleryLightbox = GLightbox({
  selector: '.gallery-lightbox'
});

/**
   * Animate the skills items on reveal
   */
let skillsAnimation = document.querySelectorAll('.skills-animation');
skillsAnimation.forEach((item) => {
  new Waypoint({
    element: item,
    offset: '80%',
    handler: function(direction) {
      let progress = item.querySelectorAll('.progress .progress-bar');
      progress.forEach(el => {
        el.style.width = el.getAttribute('aria-valuenow') + '%';
      });
    }
  });
});
