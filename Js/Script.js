const formulario = document.getElementById("form");
const nombreUsuario = document.getElementById("nombreUsuario");
const claveUsuario = document.getElementById("claveUsuario");

formulario.addEventListener('submit', function(e){
  e.preventDefault();
  validateInputs();
});

const setSuccess = element => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector(".error");
  
  errorDisplay.innerText = '';
  inputControl.classList.add('success');
  inputControl.classList.remove('error');
};

const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');

  errorDisplay.innerText = message;
  inputControl.classList.add('error');
  inputControl.classList.remove('success');
};

const validateInputs = () => {
  const userNameValue = nombreUsuario.value.trim();
  const claveUsuarioValue = claveUsuario.value.trim();

  if (userNameValue === "") {
    setError(nombreUsuario, 'El usuario no puede estar vacio');
  }else{
    setSuccess(nombreUsuario);
  }

  if (claveUsuarioValue === "") {
    setError(claveUsuario, 'La clave no puede estar vacia');
  }else{
    setSuccess(claveUsuario);
  }
};
