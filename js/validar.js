/**
 * Valida el campo usuario
 * @param {string} login Cadena login
 * @returns true si valida, false si no
 */
export function validarLogin(login) {
  let patron = /^[0-9A-Za-z-_.]+$/;

  if (patron.test(login)) {
    return true;
  } else if (login.length == 0) {
    alert("El usuario no puede estar vacío.");
    return false;
  } else {
    alert("El formato del usuario es incorrecto.");
    return false;
  }
}

/**
 * Valida el campo correo electrónico
 * @param {string} email Cadena email
 * @returns true si valida, false si no
 */
export function validarEmail(email) {
  console.log(email);
  let patron = /^[0-9a-z-_.]+[@][a-z0-9-_.]+[.][a-z]+$/;

  if (patron.test(email)) {
    return true;
  } else if (email.length == 0) {
    alert("El correo electrónico no puede estar vacío.");
    return false;
  } else {
    alert("El formato del correo electrónico es incorrecto.");
    return false;
  }
}

/**
 * Valida el campo contraseña y confirmar contraseña
 * @param {string} pwd Cadena pwd
 * @param {string} pwd_conf Cadena pwd_conf
 * @returns true si valida, false si no
 */
export function validarPwd(pwd, pwd_conf) {
  let patron = /^[0-9A-Za-z-_.]+$/;

  if (patron.test(pwd)) {
    if (pwd == pwd_conf) {
      return true;
    } else {
      alert("La confirmación de contraseña no coincide con la contraseña.");
    }
  } else if (pwd.length == 0) {
    alert("La contraseña no puede estar vacía.");
    return false;
  } else {
    alert("El formato de la contraseña es incorrecto.");
    return false;
  }
}

/**
 * Valida el campo nombre
 * @param {string} nombre Cadena nombre
 * @returns true si valida, false si no
 */
export function validarNombre(nombre) {
  let patron = /^[0-9A-Za-z-.\s\"\']+$/;

  if (patron.test(nombre)) {
    return true;
  } else if (nombre.length == 0) {
    alert("El nombre no puede estar vacío.");
    return false;
  } else {
    alert("El formato del nombre es incorrecto.");
    return false;
  }
}

/**
 * Valida el checkbox para aceptar términos y condiciones
 * @param {boolean} tcp Valor del checkbox
 * @returns true si valida, false si no
 */
export function validarTCP(tcp) {
  if (tcp) {
    return true;
  } else {
    alert(
      "No se han aceptado los Términos y Condiciones de Uso y la Política de Privacidad."
    );
    return false;
  }
}

/**
 * Valida si el archivo subido es una imagen
 * @param {string} nombre_archivo Nombre del archivo subido
 * @returns true si valida, false si no
 */
export function validarFoto(nombre_archivo) {
  var extensiones_permitidas = ["jpg", "png"];
  var extension = nombre_archivo.split(".").pop().toLowerCase();

  for (let i = 0; i < extensiones_permitidas.length; i++) {
    if (extensiones_permitidas[i] == extension) {
      return true;
    }
  }
  return false;
}

/**
 * Valida el contenido de un post
 * @param {string} contenido Contenido del post
 * @returns true si valida, false si no
 */
export function validarContenido(contenido) {
  if (contenido.length < 500) {
    return true;
  } else {
    alert("El contenido no puede superar los 500 caracteres.");
    return false;
  }
}

/**
 * Valida el comentario de un post
 * @param {string} comentario Nombre del archivo subido
 * @returns true si valida, false si no
 */
export function validarComentario(comentario) {
  if (comentario.length < 255) {
    return true;
  } else {
    alert("El comentario no puede superar los 255 caracteres.");
    return false;
  }
}
