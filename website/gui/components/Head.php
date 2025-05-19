<?php
$loadComponent = function ($gui) {
	$strippedFileName = basename(__FILE__, ".php");
	$gui->addComponentRenderFunction($strippedFileName, function ($props) use ($gui) {
		ob_start();
	?>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $props["page-title"] ?></title>
		<link rel="icon" href="/assets/favicon.ico" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wdth,wght@62.5..100,100..900&family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<style>
			<?php
			$gui->getAllCSSText();
			?>
		</style>
		<script>
			<?php
			$gui->getAllJSText();
			?>
		</script>

	<?php
		$html = ob_get_clean();
		return $html;
	});

	ob_start();
	?>
	<style>
		:root {
			--primary: #E3B04B;
			--light: rgba(255, 255, 255, 0.75);
			--dark: #161613;
			--lighter-dark: #1D1D1B;
			--green: #439D61;
			--red: #9D4343;
		}

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100vw;
			height: 100vh;
			overflow: hidden;
			margin: 0;
			background-color: var(--dark);
		}

		.overlay {
			z-index: 1;
			display: none;
			pointer-events: auto;
			position: absolute;
			width: 100vw;
			height: 100vh;
			background-color: rgba(0, 0, 0, 0.5);
			backdrop-filter: blur(2px);
		}

		.widget-dropshadow {
			box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
		}
	</style>
	<?php
	$css = ob_get_clean();
	$css = str_replace("<style>", "", $css);
	$css = str_replace("</style>", "", $css);
	$gui->addComponentCSS($css);

	ob_start();
	?>
	<script>
		$(window).on("load", () => {
			$("object").each((_, e1) => {
				const svgDoc = e1.contentDocument;
				const svg = svgDoc.getElementsByTagName("svg")[0];
				e1.parentElement.insertBefore(svg, e1);
				e1.remove();
			});

			$(".overlay").on("click", () => {
				closeOverlay();
				closeCreateForm();
				closeModifyForm();
				// TODO: Close all other types of possible popups
			});
		});

		function openOverlay() {
			$(".overlay").fadeIn(150, "swing");
		}

		function closeOverlay() {
			$(".overlay").fadeOut(150, "swing");
		}
	</script>
	<?php
	$js = ob_get_clean();
	$js = str_replace("<script>", "", $js);
	$js = str_replace("</script>", "", $js);
	$gui->addComponentJS($js);
};
