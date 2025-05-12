const fadeSpeed = 150;
$(window).on("load", () => {
	$("#forgot-pass").click(() => {
		$("#signForm").fadeOut(fadeSpeed, "swing", () => {
			$("#forgotForm").fadeIn(fadeSpeed, "swing");
		});
	});
	$("#cancelBtn").click(() => {
		$("#forgotForm").fadeOut(fadeSpeed, "swing", () => {
			$("#signForm").fadeIn(fadeSpeed, "swing");
		});
	});
});