captchaSetup();

function captchaSetup() {
  const submitButton = document.getElementById("submit-button");
  submitButton.setAttribute('disabled', '');
}

function callback() {
  const submitButton = document.getElementById("submit-button");
  submitButton.removeAttribute("disabled");
}
