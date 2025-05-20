<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../GUI.php";

$gui = GUI::getInstance();

// This file is a component of the GUI framework.
// It defines a table component that can be used to display data in a tabular format.
// The table component is designed to be flexible and customizable, allowing for different column names and data.
// The component also supports an action column, which can be used to display action icons for each row of data.
// The component is defined using a render function, which generates the HTML for the table based on the provided properties.
$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
	if (!isset($props["object"])) return;
	ob_start();
?>
<!-- This is the HTML structure for the table component. -->
	<div class="table-container">
		<table>
			<tr>
				<?php
				// Loop through the column names provided in $props["columns"] and render table headers.
				foreach ($props["columns"] as $columnName) {
					echo "<th class='table-cell'>$columnName</th>";
				}

                // If the "hasActionColumn" property is set, add an "Action" column header.
				if (isset($props["hasActionColumn"])) {
					echo "<th class='table-cell action-cell'>Action</th>";
				}
				?>
			</tr>
			<?php

			// Loop through the data provided in $props["object"] and render table rows.
			// The data is expected to be an array of associative arrays, where each associative array represents a row of data.
			foreach ($props["object"] as $obj) {
				// Loop through each row of data and render table cells.
				// The row is an associative array, so we can use a foreach loop to iterate through its values.
				// The $_ variable is used to ignore the key of the associative array.
				echo "<tr>";
				foreach ($props["columns"] as $columnName) {
					// Use the getter method to get the value of the cell.
					$getter = $props["getterMap"][$columnName];
					echo "<td class='table-cell'>" . htmlspecialchars($obj->$getter()) . "</td>";
				}
					

				// If the "hasActionColumn" property is set, add action icons for each row.
				// The action icons are represented as SVG objects.
				// The "data" attribute of the object tag is set to the path of the SVG file.
				// The "type" attribute is set to "image/svg+xml" to indicate that the object is an SVG image.
				if (isset($props["hasActionColumn"])) {
					echo "<td class='table-cell action-cell'>";
					echo "<object type='image/svg+xml' data='../assets/pen-icon.svg'></object>";
					echo "<object type='image/svg+xml' data='../assets/trash-icon.svg'></object>";
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
		border-radius: 4px;
	}

	.table-container tr:not(:first-child):hover {
		background-color: rgba(255, 255, 255, 0.1);
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
		font-size: clamp(0.4rem, 2vw, 1rem);
		font-family: Roboto;
		font-weight: 600;
		color: var(--primary);
		border-bottom: 2px solid var(--primary);
		white-space: nowrap; /* Prevents text from wrapping */
		text-overflow: ellipsis;
	}

	.table-container td {
		font-size: clamp(0.2rem, 2vw, 0.875rem);
		font-family: Roboto;
		color: rgba(255, 255, 255, 0.75);
		white-space: nowrap; /* Prevents text from wrapping */
		text-overflow: ellipsis;
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
