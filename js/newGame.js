const gameOption = document.querySelector("select");
const newGameForm = document.querySelector("#new_game_form");
if (gameOption && newGameForm) {
  newGameForm.style.display = 'none';
  gameOption.addEventListener('input', toggleNewGame);
}
function toggleNewGame(e) {
  if(e.target.value == -1) {
    newGameForm.style.display = 'block';
  }
  else {
    newGameForm.style.display = 'none';
  }
}