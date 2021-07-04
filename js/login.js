$(document).ready(function() {
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	removeErrorOnFocus("#inputEmail", "#errorEmail");
	removeErrorOnFocus("#inputPassword", "#errorPassword");
	removeErrorOnFocus("#inputUsername", "#errorUsername");
	removeErrorOnFocus("#inputPassword1", "#errorPassword1");
	removeErrorOnFocus("#inputPassword2", "#errorPassword2");
});

function removeErrorOnFocus(IDInputError, IDMsgError) {
	$(IDInputError).focus(function () {
		$(IDInputError).removeClass("border-error");
		$(IDMsgError).empty();
	});
}