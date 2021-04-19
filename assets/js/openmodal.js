let modalRegister, modalLogin;

(() => {
	modalRegister = new bootstrap.Modal(
		document.getElementById("modal-register")
	);
	modalLogin = new bootstrap.Modal(document.getElementById("modal-login"));
})();
