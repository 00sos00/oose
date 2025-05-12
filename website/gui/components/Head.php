<?php
require_once "gui/GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	ob_start();
?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $props["page-title"] ?></title>
	<link rel="stylesheet" href="index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wdth,wght@62.5..100,100..900&family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap" rel="stylesheet">
	<script src="jquery-3.7.1.js"></script>
	<script src="index.js"></script>
	<style>
		<?php
		require_once "gui/GUI.php";
		GUI::getInstance()->getAllCSSText();
		?>
	</style>
	<script>
		<?php
		GUI::getInstance()->getAllJSText();
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
	}

	body {
		width: 100vw;
		height: 100vh;
		display: flex;
		justify-content: left;
		align-items: center;
		overflow: hidden;
		margin: 0;
		background-color: var(--dark);
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
