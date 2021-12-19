function loginGoogle(usuario) {
  let perfil = usuario.getBasicProfile();

  const userName = prompt('Informe seu nome de usuario');
  const password = prompt('Informe sua senha');

  $.ajax({
    url: 'https://sisp-integrador.herokuapp.com/login/store',
    method: 'post',
    data: {
      loginType: 'google',
      email: perfil.getEmail(),
      name: perfil.getName(),
      password,
      userName,
    },
  }).done(function (dados) {
    window.location.href = 'https://sisp-integrador.herokuapp.com/';
  });
}
