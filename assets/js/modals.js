document.addEventListener('DOMContentLoaded', () => {
    // Open modal - any element with data-modal attribute
    document.querySelectorAll('[data-modal]').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const modalId = trigger.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    // Close modal - click close button
    document.querySelectorAll('.modal-close').forEach(btn => {
        btn.addEventListener('click', () => {
            const overlay = btn.closest('.modal-overlay');
            if (overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Close modal - click overlay background
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Close modal - Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(modal => {
                modal.classList.remove('active');
            });
            document.body.style.overflow = '';
        }
    });

    // Exit intent - show modal when mouse leaves viewport from top
    let exitIntentShown = false;
    document.addEventListener('mouseout', (e) => {
        if (!exitIntentShown && e.clientY <= 0 && !e.relatedTarget) {
            const exitModal = document.getElementById('modal-exit');
            if (exitModal && !document.querySelector('.modal-overlay.active')) {
                exitModal.classList.add('active');
                document.body.style.overflow = 'hidden';
                exitIntentShown = true;
            }
        }
    });
});
