import * as v from "/js/validar.js";

document.getElementById("enviar").addEventListener("click", (e) => {
  const form = document.forms[0];

  let login = form.elements["login"];

  if (!v.validarLogin(login)) {
    e.preventDefault();
  }
});
