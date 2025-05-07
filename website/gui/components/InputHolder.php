<?php
require_once "gui/GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	ob_start();
?>

	<div class="input-holder">
		<label for=<?= $props["input-name"] ?>><?= $props["label"] ?></label>
		<input name=<?= $props["input-name"] ?> type=<?= $props["input-type"] ?>>
	</div>

<?php
	$html = ob_get_clean();
	return $html;
});

$gui->addComponentCSS("
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
");
