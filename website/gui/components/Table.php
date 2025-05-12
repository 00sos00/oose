<?php
require_once "gui/GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	if (!isset($props["query-result"])) return;
	ob_start();
?>

	<div class="table-container">
		<table>
			<tr>
				<?php
				foreach ($props["query-result"]->fetch_assoc() as $columnName => $_) {
					echo "<th class='table-cell'>$columnName</th>";
				}
				?>
			</tr>
			<?php
			while ($row = $props["query-result"]->fetch_assoc()) {
				echo "<tr>";
				foreach ($row as $_ => $cellValue) {
					echo "<td class='table-cell'>$cellValue</td>";
				}
				echo "</tr>";
			}
			?>
		</table>
	</div>

<?php
	$html = ob_get_clean();
	return $html;
});

ob_start();
?>
<style>
	.table-container {
		box-sizing: border-box;
		width: 100%;
		height: 80%;
		padding: 16px;
		margin: 100px;
		border-radius: 16px;
		background-color: var(--lighter-dark);
		text-align: left;
		overflow-y: scroll;
	}

	.table-container table {
		width: 100%;
	}

	.table-container tr {
		width: 100%;
		display: flex;
		margin-bottom: 16px;
	}

	.table-cell {
		flex: 1;
		padding: 8px 0;
		vertical-align: middle;
	}

	.table-container th {
		font-size: 1rem;
		font-family: Roboto;
		font-weight: 600;
		color: var(--primary);
		border-bottom: 2px solid var(--primary);
	}

	.table-container td {
		font-size: 0.875rem;
		font-family: Roboto;
		color: rgba(255, 255, 255, 0.75);
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
