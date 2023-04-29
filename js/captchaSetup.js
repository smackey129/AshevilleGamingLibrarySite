captchaSetup();

/**
 * Sets up captcha by disabling the submit button
 */
function captchaSetup() {
  const submitButton = document.getElementById("submit-button");
  submitButton.setAttribute('disabled', '');
}

/**
 * Enables submit button once the captcha is completed
 *
 */
function callback() {
  const submitButton = document.getElementById("submit-button");
  submitButton.removeAttribute("disabled");
}
