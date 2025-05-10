<?php
require_once "gui/GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	$selectedClass = (isset($props["selected"]) && $props["selected"] ? " sidebar-item-selected" : "");
	ob_start();
?>

	<a href=<?= $props["href"] ?> class="<?= "sidebar-item" . $selectedClass ?>">
		<object type="image/svg+xml" data=<?= "assets/" . $props["icon-name"] . ".svg" ?>></object>
		<p><?= $props["item-text"] ?></p>
	</a>

<?php
	$html = ob_get_clean();
	return $html;
});

ob_start();
?>
<style>
	.sidebar-item {
		display: flex;
		align-items: center;
		gap: 24px;
		padding: 0 16px;
		height: 48px;
		margin-bottom: 8px;
		text-decoration: none;
	}

	.sidebar-item:hover {
		background-color: rgba(255, 255, 255, 0.1);
		box-shadow: 0 8px 4px rgba(0, 0, 0, 0.2);
	}

	.sidebar-item svg {
		width: 24px;
		height: 24px;
	}

	.sidebar-item svg * {
		fill: rgba(255, 255, 255, 0.5);
	}

	.sidebar-item p {
		font-family: Roboto;
		font-weight: 600;
		font-size: 1.25rem;
		color: rgba(255, 255, 255, 0.5);
	}

	.sidebar-item-selected {
		background-color: rgba(255, 255, 255, 0.1);
		border-left: 4px solid var(--primary);
		box-shadow: 0 8px 4px rgba(0, 0, 0, 0.2);
		pointer-events: none;
	}

	.sidebar-item-selected p {
		color: var(--primary);
	}

	.sidebar-item-selected svg * {
		width: 24px;
		height: 24px;
		fill: var(--primary);
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
		$(".sidebar-item object").each((_, e1) => {
			const svgDoc = e1.contentDocument;
			const svg = svgDoc.getElementsByTagName("svg")[0];
			e1.parentElement.insertBefore(svg, e1.parentElement.firstChild);
			e1.remove();
		});
	});
</script>
<?php
$js = ob_get_clean();
$js = str_replace("<script>", "", $js);
$js = str_replace("</script>", "", $js);
$gui->addComponentJS($js);
