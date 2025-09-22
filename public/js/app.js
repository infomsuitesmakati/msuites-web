document.addEventListener('DOMContentLoaded', () => {
  // Mobile menu
  const toggle = document.getElementById('mobile-toggle');
  const menu = document.getElementById('mobile-menu');
  if (toggle && menu) {
    toggle.addEventListener('click', () => menu.classList.toggle('hidden'));
  }

  // Booking modal
  const modal = document.getElementById('booking-modal');
  const subject = document.getElementById('booking-subject');
  const closeBtn = modal ? modal.querySelector('.modal-close') : null;
  const backdrop = modal ? modal.querySelector('.modal-backdrop') : null;

  // open
  document.querySelectorAll('.book-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      if (!modal) return;
      const room = btn.getAttribute('data-room') || 'Room';
      subject.value = `Booking Request: ${room}`;
      modal.classList.remove('hidden');
    });
  });

  // close
  [closeBtn, backdrop].forEach(el => {
    if (!el) return;
    el.addEventListener('click', () => modal.classList.add('hidden'));
  });
});
