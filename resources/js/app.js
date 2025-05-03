import './bootstrap';
import 'tw-elements';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
document.addEventListener('DOMContentLoaded', () => {
    const scrollElements = document.querySelectorAll('.scroll-animation');
  
    const elementInView = (el, percentageScroll = 100) => {
      const elementTop = el.getBoundingClientRect().top;
  
      return (
        elementTop <= 
        (window.innerHeight || document.documentElement.clientHeight) * (percentageScroll / 100)
      );
    };
  
    const displayScrollElement = (element) => {
      element.classList.add('opacity-100', 'translate-y-0'); // Ubah opacity dan posisi
    };
  
    const hideScrollElement = (element) => {
      element.classList.remove('opacity-100', 'translate-y-0');
    };
  
    const handleScrollAnimation = () => {
      scrollElements.forEach((el) => {
        if (elementInView(el, 100)) {
          displayScrollElement(el);
        } else {
          hideScrollElement(el);
        }
      });
    };
  
    window.addEventListener('scroll', () => { 
      handleScrollAnimation();
    });
  });
  