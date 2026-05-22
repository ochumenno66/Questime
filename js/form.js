(function () {
  'use strict';

  const ajaxUrl =
    typeof questimeData !== 'undefined'
      ? questimeData.ajaxUrl
      : '/wp-admin/admin-ajax.php';

  const nonce =
    typeof questimeData !== 'undefined'
      ? questimeData.nonce
      : '';

  const forms = document.querySelectorAll('.js-contact-form');

  if (!forms.length) return;

  forms.forEach((form) => {

    form.addEventListener('submit', async function (event) {

      event.preventDefault();

      clearErrors(form);

      const submitButton = form.querySelector('button[type="submit"]');

      const originalButtonText = submitButton.innerHTML;

      submitButton.disabled = true;
      submitButton.innerHTML = 'Sending...';

      try {

        const formData = new FormData(form);

        formData.append('action', 'questime_form');
        formData.append('nonce', nonce);

        const response = await fetch(ajaxUrl, {
          method: 'POST',
          body: formData,
        });

        const result = await response.json();

        if (result.success) {

          showSuccess(form, result.data.message);

          form.reset();

        } else {

          if (result.data.errors) {

            showErrors(form, result.data.errors);

          } else if (result.data.error) {

            alert(result.data.error);

          }
        }

      } catch (error) {

        console.error(error);

        alert('Connection error. Please try again.');

      } finally {

        submitButton.disabled = false;
        submitButton.innerHTML = originalButtonText;
      }
    });
  });

  // Ошибки
  function showErrors(form, errors) {

    Object.entries(errors).forEach(([fieldName, message]) => {

      const field = form.querySelector(`[name="${fieldName}"]`);

      if (!field) return;

      field.classList.add('is-error');

      let errorElement = field.parentNode.querySelector('.form-error');

      if (!errorElement) {

        errorElement = document.createElement('div');

        errorElement.className = 'form-error';

        field.parentNode.appendChild(errorElement);
      }

      errorElement.textContent = message;
    });
  }

  // Очистка ошибок
  function clearErrors(form) {

    const errors = form.querySelectorAll('.form-error');

    errors.forEach((error) => error.remove());

    const fields = form.querySelectorAll('.is-error');

    fields.forEach((field) => {
      field.classList.remove('is-error');
    });
  }

  // Success сообщение
  function showSuccess(form, message) {

    let successElement = form.querySelector('.form-success');

    if (!successElement) {

      successElement = document.createElement('div');

      successElement.className = 'form-success';

      form.appendChild(successElement);
    }

    successElement.textContent = message;

    successElement.style.display = 'block';

    setTimeout(() => {
      successElement.style.display = 'none';
    }, 5000);
  }

})();