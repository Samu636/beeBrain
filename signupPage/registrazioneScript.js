function ValidaForm() {
  if (document.registrazione.username.value == "") {
    alert("Inserisci username");
    return false;
  }
  if (document.registrazione.email.value == "") {
    alert("Inserisci email");
    return false;
  }
  if (document.registrazione.password.value == "") {
    alert("Inserisci password");
    return false;
  }
  if (document.registrazione.confermapassword.value == "") {
    alert("Conferma password");
    return false;
  }
  if (document.registrazione.password.value.length < 6) {
    alert("La password deve contenere almeno 6 caratteri");
    return false;
  }
  if (
    document.registrazione.password.value !=
    document.registrazione.confermapassword.value
  ) {
    alert("La password non coincide");
    return false;
  }
}
