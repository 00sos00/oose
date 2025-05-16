<?php
$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	if (!isset($props["queryResult"])) return;
	ob_start();
?>

	<div class="table-container">
		<table>
			<tr>
				<?php
				foreach ($props["columns"] as $columnName) {
					echo "<th class='table-cell'>$columnName</th>";
				}
				if (isset($props["hasActionColumn"])) {
					echo "<th class='table-cell action-cell'>Action</th>";
				}
				?>
			</tr>
			<?php
			while ($row = $props["queryResult"]->fetch_assoc()) {
				echo "<tr>";
				foreach ($row as $_ => $cellValue) {
					echo "<td class='table-cell'>$cellValue</td>";
				}
				if (isset($props["hasActionColumn"])) {
					echo "<td class='table-cell action-cell'>";
					echo "<object type='image/svg+xml' data='/assets/pen-icon.svg'></object>";
					echo "<object type='image/svg+xml' data='/assets/trash-icon.svg'></object>";
					echo "</td>";
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
		padding: 16px;
		border-radius: 16px;
		background-color: var(--lighter-dark);
		text-align: left;
		overflow-y: hidden;
		box-shadow: 0 16px 24px rgba(0, 0, 0, 0.2);
	}

	.table-container table {
		width: 100%;
	}

	.table-container tr {
		width: 100%;
		display: flex;
		margin-bottom: 16px;
<<<<<<< HEAD
=======
		border-radius: 4px;
	}

	.table-container tr:not(:first-child):hover {
		background-color: rgba(255, 255, 255, 0.1);
>>>>>>> 901977368236855927dbb952b9f4069f12046f02
	}

	.table-cell {
		flex: 1;
		padding: 8px 16px;
		vertical-align: middle;
	}

	.action-cell {
		display: flex;
		gap: 12px;
		flex: 0;
	}

	.action-cell svg {
		cursor: pointer;
	}

	.action-cell svg:hover {
		opacity: 0.75;
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
