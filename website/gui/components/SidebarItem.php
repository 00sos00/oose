<?php
require_once "gui/GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	ob_start();
?>

	<a href="#" class="sidebar-item sidebar-item-selected">
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
		box-shadow: 0 8px 4px rgba(0, 0, 0, 0.2);
		text-decoration: none;
	}

	.sidebar-item:hover {
		background-color: rgba(255, 255, 255, 0.1);
	}

	.sidebar-item svg * {
		width: 24px;
		height: 24px;
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
			$(".sidebar-item").each((_, e2) => {
				e2.insertBefore(svg, e2.firstChild);
			});
			e1.remove();
		});
	});
</script>
<?php
$js = ob_get_clean();
$js = str_replace("<script>", "", $js);
$js = str_replace("</script>", "", $js);
$gui->addComponentJS($js);
