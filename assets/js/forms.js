document.addEventListener('DOMContentLoaded', () => {
    // Handle all forms with data-form-name attribute
    document.querySelectorAll('form[data-form-name]').forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.textContent : '';

            // Validate phone
            const phoneInput = form.querySelector('input[name="phone"]');
            if (phoneInput && phoneInput.value.replace(/\D/g, '').length < 7) {
                phoneInput.style.borderColor = 'red';
                phoneInput.focus();
                return;
            }

            // Validate privacy checkbox
            const privacyCheck = form.querySelector('.form-privacy input[type="checkbox"]');
            if (privacyCheck && !privacyCheck.checked) {
                const privacyLabel = privacyCheck.closest('.form-privacy');
                privacyLabel.style.color = 'red';
                privacyLabel.classList.remove('shake');
                void privacyLabel.offsetWidth; // trigger reflow
                privacyLabel.classList.add('shake');
                return;
            }

            // Show loading
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Отправка...';
            }

            // Collect form data
            const formData = new FormData();
            formData.append('action', 'betonnye_submit_form');
            formData.append('nonce', (typeof betonnye_ajax !== 'undefined') ? betonnye_ajax.nonce : '');
            formData.append('form_name', form.getAttribute('data-form-name'));
            formData.append('phone', phoneInput ? phoneInput.value : '');

            // Collect select values
            const select = form.querySelector('select');
            if (select) {
                formData.append('messenger', select.value);
            }

            // Collect email if visible
            const emailInput = form.querySelector('input[name="email"]');
            if (emailInput && emailInput.style.display !== 'none') {
                formData.append('email', emailInput.value);
            }

            // Collect quiz answers if present
            const quizForm = form.closest('.quiz-form');
            if (quizForm) {
                quizForm.querySelectorAll('input[type="radio"]:checked').forEach(radio => {
                    formData.append(radio.name, radio.value);
                });
            }

            // AJAX URL
            const ajaxUrl = (typeof betonnye_ajax !== 'undefined') ? betonnye_ajax.url : '/wp-admin/admin-ajax.php';

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    form.innerHTML = '<div class="form-success"><p>Спасибо! Мы свяжемся с вами в ближайшее время.</p></div>';

                    // Close modal after 2 seconds
                    const modal = form.closest('.modal-overlay');
                    if (modal) {
                        setTimeout(() => {
                            modal.classList.remove('active');
                            document.body.style.overflow = '';
                        }, 2000);
                    }
                } else {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = originalText;
                    }
                    // Show inline error
                    let errorEl = form.querySelector('.form-error');
                    if (!errorEl) {
                        errorEl = document.createElement('p');
                        errorEl.className = 'form-error';
                        errorEl.style.color = 'red';
                        errorEl.style.fontSize = '14px';
                        errorEl.style.marginTop = '10px';
                        form.appendChild(errorEl);
                    }
                    errorEl.textContent = data.data || 'Произошла ошибка. Попробуйте снова.';
                }
            })
            .catch(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                }
            });
        });
    });

    // Reset phone border on input
    document.querySelectorAll('input[name="phone"]').forEach(input => {
        input.addEventListener('input', () => {
            input.style.borderColor = '';
        });
    });
});
