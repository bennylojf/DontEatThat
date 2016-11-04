/* Script used to import navbar */
$(document).ready(function() {
    $("#header").load("header.html");
});

/* Script used to import footer */
$(document).ready(function() {
    $("#footer").load("footer.html");
});

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