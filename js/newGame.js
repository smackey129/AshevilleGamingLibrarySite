const gameOption = document.querySelector("select");
const newGameForm = document.querySelector("#new_game_form");
const newGameSelects = newGameForm.querySelectorAll("select");
const newGameName = newGameForm.querySelector("input");
console.log("test");
if (gameOption && newGameForm) {
  newGameForm.style.display = 'none';
  gameOption.addEventListener('input', toggleNewGame);
}

/**
 * Toggles whether or not the fieldset for submitting a new game is disabled
 *
 * @param   {[Event]}  e  The event being handled
 *
 */
function toggleNewGame(e) {
  if(e.target.value == -1) {
    newGameForm.style.display = 'block';
    newGameName.required = 'true';
    newGameSelects.forEach(element => {
      element.required = 'true';
    });
  }
  else {
    newGameForm.style.display = 'none';
    newGameName.removeAttribute("required");
    newGameSelects.forEach(element => {
      element.removeAttribute("required");
    });
  }
}