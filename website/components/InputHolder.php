<?php
require_once "GUIComponent.php";

function RenderInputHolder($props)
{
	ob_start();
?>

	<div class="input-holder">
		<label for=<?php echo $props["input-name"] ?>><?php echo $props["label"] ?></label>
		<input name=<?php echo $props["input-name"] ?> type=<?php echo $props["input-type"] ?>>
	</div>

<?php
	$html = ob_get_clean();

	$component = new GUIComponent($html);
	$component->render();
}

$css = "
.input-holder {
	display: flex;
	flex-direction: column;
}

label {
	color: var(--light);
	font-family: Roboto;
	margin-bottom: 8px;
}

input {
	border-radius: 4px;
	height: 40px;
	font-size: 1rem;
	outline: none;
	border: none;
	padding-left: 12px;
	color: var(--dark);
	background-color: var(--light);
}
";
addCSS($css);
