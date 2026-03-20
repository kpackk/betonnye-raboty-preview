document.addEventListener('DOMContentLoaded', () => {
    const quizForm = document.querySelector('.quiz-form');
    if (!quizForm) return;

    const steps = quizForm.querySelectorAll('.quiz-step');
    const progressBar = quizForm.querySelector('.quiz-progress-bar');
    const totalSteps = steps.length;
    let currentStep = 0;

    function showStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle('active', i === index);
        });
        // Update progress bar (25%, 50%, 75%, 100%)
        const progress = Math.round(((index + 1) / totalSteps) * 100);
        if (progressBar) progressBar.style.width = progress + '%';
        const pctEl = quizForm.querySelector('.quiz-progress-pct');
        if (pctEl) pctEl.textContent = progress;
        currentStep = index;
    }

    // Handle radio selection - enable Next button, add selected class
    quizForm.querySelectorAll('.quiz-option').forEach(option => {
        option.addEventListener('click', () => {
            const radio = option.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                // Remove selected from siblings
                const parent = option.closest('.quiz-options');
                parent.querySelectorAll('.quiz-option').forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                // Enable Next button
                const nextBtn = option.closest('.quiz-step').querySelector('.quiz-btn-next');
                if (nextBtn) nextBtn.disabled = false;
                // Hide hint
                const hint = option.closest('.quiz-step').querySelector('.quiz-hint');
                if (hint) hint.style.display = 'none';
            }
        });
    });

    // Next button
    quizForm.querySelectorAll('.quiz-btn-next').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep < totalSteps - 1) {
                showStep(currentStep + 1);
            }
        });
    });

    // Back button
    quizForm.querySelectorAll('.quiz-btn-back').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 0) {
                showStep(currentStep - 1);
            }
        });
    });

    // Messenger selection toggles email/phone visibility
    quizForm.querySelectorAll('input[name="quiz_messenger"]').forEach(radio => {
        radio.addEventListener('change', () => {
            const phoneInput = quizForm.querySelector('.quiz-contact-form input[name="phone"]');
            const emailInput = quizForm.querySelector('.quiz-contact-form input[name="email"]');
            if (radio.value === 'E-mail') {
                if (emailInput) emailInput.style.display = 'block';
                if (phoneInput) phoneInput.placeholder = 'Ваш номер телефона';
            } else {
                if (emailInput) emailInput.style.display = 'none';
                if (phoneInput) phoneInput.placeholder = 'Ваш номер ' + radio.value;
            }
        });
    });

    // Update sidebar text based on current step
    // (sidebar messages change per step on original site)
});
