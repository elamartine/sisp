function loginGoogle(usuario){
  alert('oi');
  let perfil =  usuario.getBasicProfile();
  $.ajax({
      url: "https://sisp-integrador.herokuapp.com/login/store",
      method: "post",
      data: {
          tipo_login: "api",
          login: perfil.getEmail(),
          name: perfil.getName()
      }
  }).done(function(dados){
      window.location.href="https://sisp-integrador.herokuapp.com/";
  });
}