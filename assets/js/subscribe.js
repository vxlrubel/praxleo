/**
 * Praxleo Newsletter Subscription
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('praxleo-subscribe-form');
        if (!form) return;

        const emailInput = form.querySelector('input[type="email"]');
        const submitBtn = form.querySelector('button[type="submit"]');
        const successMsg = form.querySelector('.subscribe-success');
        const errorMsg = form.querySelector('.subscribe-error');
        let isSubmitting = false;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            if (isSubmitting) return;

            const email = emailInput.value.trim();

            if (!email || !isValidEmail(email)) {
                showError('Please enter a valid email address.');
                return;
            }

            isSubmitting = true;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Subscribing...';
            hideMessages();

            fetch(praxleoSubscribe.restUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': praxleoSubscribe.nonce,
                },
                body: JSON.stringify({ email: email }),
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    if (data.success) {
                        showSuccess(data.message);
                        emailInput.value = '';
                    } else {
                        showError(data.message);
                    }
                })
                .catch(function () {
                    showError('Something went wrong. Please try again later.');
                })
                .finally(function () {
                    isSubmitting = false;
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Subscribe';
                });
        });

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function showSuccess(msg) {
            if (successMsg) {
                successMsg.textContent = msg;
                successMsg.classList.remove('hidden');
            }
            if (errorMsg) errorMsg.classList.add('hidden');
        }

        function showError(msg) {
            if (errorMsg) {
                errorMsg.textContent = msg;
                errorMsg.classList.remove('hidden');
            }
            if (successMsg) successMsg.classList.add('hidden');
        }

        function hideMessages() {
            if (successMsg) successMsg.classList.add('hidden');
            if (errorMsg) errorMsg.classList.add('hidden');
        }
    });
})();
