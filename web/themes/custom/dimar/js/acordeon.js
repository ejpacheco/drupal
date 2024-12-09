document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const isExpanded = header.getAttribute('aria-expanded') === 'true';
      document.querySelectorAll('.accordion-header').forEach(h => {
        h.setAttribute('aria-expanded', 'false');
        h.nextElementSibling.style.maxHeight = '0';
        h.nextElementSibling.style.padding = '0 15px';
      });
      if (!isExpanded) {
        header.setAttribute('aria-expanded', 'true');
        header.nextElementSibling.style.maxHeight = header.nextElementSibling.scrollHeight + 'px';
        header.nextElementSibling.style.padding = '15px';
      }
    });
  });