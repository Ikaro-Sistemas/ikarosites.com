/**
 * Ikaro Sistemas - Script Principal
 * Responsável por inicializar animações, menus e carrosséis.
 */

document.addEventListener('DOMContentLoaded', function () {
  
  // --- Inicialização da Biblioteca AOS (Animate On Scroll) ---
  if (typeof AOS !== 'undefined') {
    AOS.init({ once: true, duration: 800 });
  }

  // --- Lógica do Menu Circular ---
  const menuBtn = document.getElementById('menu-icone');
  const submenu = document.getElementById('submenu-circular');
  let submenuTimeout;

  function showSubmenu() {
    clearTimeout(submenuTimeout);
    if(submenu) submenu.classList.add('active');
  }
  
  function hideSubmenu() {
    submenuTimeout = setTimeout(() => {
      if(submenu) submenu.classList.remove('active');
    }, 200);
  }

  if (menuBtn && submenu) {
    menuBtn.addEventListener('mouseenter', showSubmenu);
    menuBtn.addEventListener('mouseleave', hideSubmenu);
    submenu.addEventListener('mouseenter', showSubmenu);
    submenu.addEventListener('mouseleave', hideSubmenu);

    // Acessibilidade via teclado
    menuBtn.addEventListener('focus', showSubmenu);
    menuBtn.addEventListener('blur', hideSubmenu);
  }

  // --- Controle dos Carrosséis (Referências e Depoimentos) ---
  
  function setupCarousel(containerId, prevBtnId, nextBtnId) {
    const container = document.getElementById(containerId);
    const prevBtn = document.getElementById(prevBtnId);
    const nextBtn = document.getElementById(nextBtnId);
    
    if (!container || !prevBtn || !nextBtn) return;

    let scrollAmount = 0;
    const scrollStep = 340; // Quantidade de pixels para rolar

    prevBtn.onclick = () => {
      scrollAmount = Math.max(scrollAmount - scrollStep, 0);
      container.scrollTo({ left: scrollAmount, behavior: 'smooth' });
    };

    nextBtn.onclick = () => {
      // Garante que não role além do conteúdo
      const maxScroll = container.scrollWidth - container.clientWidth;
      scrollAmount = Math.min(scrollAmount + scrollStep, maxScroll);
      container.scrollTo({ left: scrollAmount, behavior: 'smooth' });
    };
  }

  // Inicializa os carrosséis
  setupCarousel('referencias-carousel', 'ref-prev', 'ref-next');
  setupCarousel('depoimentos-carousel', 'dep-prev', 'dep-next');

  // --- Banner de Cookies (LGPD) ---
  const cookieBanner = document.getElementById('cookie-banner');
  const acceptCookies = document.getElementById('accept-cookies');

  if (cookieBanner && !localStorage.getItem('cookiesAccepted')) {
    setTimeout(() => {
      cookieBanner.classList.add('show');
    }, 2000);
  }

  if (acceptCookies) {
    acceptCookies.addEventListener('click', () => {
      localStorage.setItem('cookiesAccepted', 'true');
      cookieBanner.classList.remove('show');
    });
  }

  // --- Accordion FAQ (Para sub-páginas) ---
  const faqItems = document.querySelectorAll('.faq-item h3');
  faqItems.forEach(item => {
    item.addEventListener('click', () => {
      const content = item.nextElementSibling;
      content.classList.toggle('hidden');
      item.querySelector('span').textContent = content.classList.contains('hidden') ? '+' : '-';
    });
  });
});