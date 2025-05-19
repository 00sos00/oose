<?php
$loadComponent = function ($gui) {
	$strippedFileName = basename(__FILE__, ".php");
	$gui->addComponentRenderFunction($strippedFileName, function ($props) {
		$name = str_replace(" ", "-", strtolower($props["label"]));
		ob_start();
	?>

		<div class="input-holder">
			<label for=<?= $name ?>><?= $props["label"] ?></label>
			<input name=<?= $name ?> type=<?= $props["input-type"] ?> required>
		</div>

	<?php
		$html = ob_get_clean();
		return $html;
	});

	ob_start();
	?>
	<style>
		.input-holder {
			display: flex;
			flex-direction: column;
		}

		.input-holder label {
			color: var(--light);
			font-family: Roboto;
			margin-bottom: 8px;
		}

		.input-holder input {
			border-radius: 4px;
			height: 40px;
			font-size: 1rem;
			outline: none;
			border: none;
			padding-left: 12px;
			color: var(--dark);
			background-color: var(--light);
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

	</script>
	<?php
	$js = ob_get_clean();
	$js = str_replace("<script>", "", $js);
	$js = str_replace("</script>", "", $js);
	$gui->addComponentJS($js);
};
