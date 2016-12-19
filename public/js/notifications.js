$(document).ready(function() {

	$.notify.addStyle('eventSuccess', {
		html: "<div><span data-notify-text/></div>",
		classes: {
			base: {
				"background-color": "#dff0d8",
				"padding": "5px",
				"margin": "15px",
				"border": "1px solid transparent",
				"border-radius": "5px",
				"font-size": "22px",
				"font-weight": "700"
			}
		}
	});

	$.notify.defaults({position: "top center", globalPosition: "top center"});

});