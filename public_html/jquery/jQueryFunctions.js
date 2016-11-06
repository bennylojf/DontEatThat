/* Script used to validate food form */
$(document).ready(function() {
	$("#food-submit").click(function(event) {
		var item1 = $("#item1").val();
		var item2 = $("#item2").val();
		var isNum = /[0-9]+/; // test if user entered any numbers => invalid input

		$("#foodFormError0").removeClass("show-form-error").addClass("form-error");
		$("#foodFormError1").removeClass("show-form-error").addClass("form-error");

		if (item1 == null || item1 == "" || item2 == null || item2 == "" ||
			isNum.test(item1) || isNum.test(item2)) {
			$("#foodFormError0").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		} else if (item1 == item2) {
			$("#foodFormError1").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}
	});
});

/* Script used to validate contact form */
$(document).ready(function() {
	$("#contact-submit").click(function(event) {
		var name = $("#form_name").val();
		var surname = $("#form_lastname").val();
		var email = $("#form_email").val();
		var message = $("#form_message").val();
		var regex_name = /[a-zA-Z]+/;
		var regex_lastname = /[a-zA-Z]+/;
		var regex_email = /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+/;
		var regex_message = /\w+/;

		$("#contactFormError0").removeClass("show-form-error").addClass("form-error");

		if (!regex_name.test(name)) {
			$("#contactFormError0").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}

		$("#contactFormError1").removeClass("show-form-error").addClass("form-error");

		if (!regex_lastname.test(surname)) {
			$("#contactFormError1").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}

		$("#contactFormError2").removeClass("show-form-error").addClass("form-error");

		if (!regex_email.test(email)) {
			$("#contactFormError2").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}

		$("#contactFormError3").removeClass("show-form-error").addClass("form-error");

		if (!regex_message.test(message)) {
			$("#contactFormError3").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}
	});
});

/* Script to validate login form */
$(document).ready(function() {
	$(document).on("click", "#login_button", function(event) {
		var username = $("#loginName").val();
		var password = $("#loginPass").val();
		var errorCount = 0;

		$("#loginError0").removeClass("show-form-error").addClass("form-error");
		$("#loginError1").removeClass("show-form-error").addClass("form-error");

		if (username == null || username == "") {
			$("#loginError0").removeClass("form-error").addClass("show-form-error");
			errorCount++;
		}

		if (password == null || password == "") {
			$("#loginError1").removeClass("form-error").addClass("show-form-error");
			errorCount++;
		}

		if (errorCount > 0)
			event.preventDefault();
	});
});

/* Script used to validate registration form */
$(document).ready(function() {
	$("#register-button").click(function(event) {
		var name = $("#signup-name").val();
		var username = $("#signup-username").val();
		var password = $("#signup-password").val();
		var regex_name = /^[a-zA-Z ]+/;
		var regex_username = /\w{3,}/;
		var regex_password = /\w{6,}/; // may need a safer pattern
		
		$("#signupFormError0").removeClass("show-form-error").addClass("form-error");

		if (!regex_name.test(name)) {
			$("#signupFormError0").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}

		$("#signupFormError1").removeClass("show-form-error").addClass("form-error");

		if (!regex_username.test(username)) {
			$("#signupFormError1").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}

		$("#signupFormError2").removeClass("show-form-error").addClass("form-error");

		if (!regex_password.test(password)) {
			$("#signupFormError2").removeClass("form-error").addClass("show-form-error");
			event.preventDefault();
		}
	});
});