document.addEventListener('DOMContentLoaded', function () {
  "use strict";

  const ajaxUrl =
    typeof questimeData !== "undefined"
      ? questimeData.ajaxUrl
      : "/wp-admin/admin-ajax.php";

  const nonce = typeof questimeData !== "undefined" ? questimeData.nonce : "";

  const forms = document.querySelectorAll(".js-contact-form");

  if (!forms.length) return;

  forms.forEach((form) => {
    form.addEventListener("submit", async function (event) {
      event.preventDefault();

      clearMessages(form);

      const submitButton = form.querySelector('button[type="submit"]');

      if (!submitButton) return;

      const originalButtonText = submitButton.innerHTML;

      submitButton.disabled = true;
      submitButton.innerHTML = "Sending...";

      try {
        const formData = new FormData(form);

        formData.append("action", "questime_form");
        formData.append("nonce", nonce);

        const response = await fetch(ajaxUrl, {
          method: "POST",
          body: formData,
        });

        const result = await response.json();

        if (result.success) {
          showSuccess(form, result.data.message);

          form.reset();

          return;
        }

        if (result.data && result.data.errors) {
          showErrors(form, result.data.errors);

          return;
        }

        if (result.data && result.data.error) {
          showFormError(form, result.data.error);

          return;
        }

        showFormError(form, "Something went wrong. Please try again.");
      } catch (error) {
        console.error(error);

        showFormError(form, "Connection error. Please try again.");
      } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = originalButtonText;
      }
    });
  });

  function showErrors(form, errors) {
    Object.entries(errors).forEach(([fieldName, message]) => {
      const field = form.querySelector(`[name="${fieldName}"]`);

      if (!field) return;
      field.classList.add("is-error");
      let errorElement = field.parentNode.querySelector(".form-error");

      if (!errorElement) {
        errorElement = document.createElement("div");
        errorElement.className = "form-error";
        field.parentNode.appendChild(errorElement);
      }
      errorElement.textContent = message;
    });
  }

function showSuccess(form) {
  const successElement =
    form.parentElement.querySelector(".js-form-success");
  if (!successElement) return;
  form.reset();
  const formType = form.dataset.formType;

  // DEFAULT FORM
  if (formType === "default") {
    const elementsToHide = form.querySelectorAll(`
      .contact-form__content,
      .contact-form__fields,
      .contact-form__textarea,
      .contact-form__actions
    `);
    elementsToHide.forEach((element) => {
      element.classList.add("is-hidden");
    });
    successElement.hidden = false;

    setTimeout(() => {
      elementsToHide.forEach((element) => {
        element.classList.remove("is-hidden");
      });
      successElement.hidden = true;
    }, 5000);
  }

  // GAMIFIED FORM
  if (formType === "gamified") {
    form.classList.add("is-hidden");
    successElement.hidden = false;

    setTimeout(() => {
      form.classList.remove("is-hidden");
      successElement.hidden = true;
    }, 5000);
  }
}

  function showFormError(form, message) {
    const errorElement = createFormMessage(
      form,
      "form-error form-error--general",
    );
    errorElement.textContent = message;
  }

  function createFormMessage(form, className) {
    const messageElement = document.createElement("div");
    messageElement.className = className;
    form.appendChild(messageElement);

    return messageElement;
  }

  function clearMessages(form) {
    const messages = form.querySelectorAll(".form-error, .form-success");

    messages.forEach((message) => {
      message.remove();
    });

    const errorFields = form.querySelectorAll(".is-error");

    errorFields.forEach((field) => {
      field.classList.remove("is-error");
    });
  }
});
