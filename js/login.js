// this is used for sliding panel
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('popup');

signUpButton.addEventListener('click', () => {
  container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
  container.classList.remove('right-panel-active');
});

// this toggles the blur effect
function toggle(){
  var blur = document.getElementById('blur');
  blur.classList.toggle('active');

  var popup = document.getElementById('popup');
  popup.classList.toggle('active');
}
