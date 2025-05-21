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
?>)
<?php if(isset($props["Header"]))echo "<div class='header'>" . $props["Header"] . "</div>"; ?>
<!-- This is the HTML structure for the table component. -->
	<div class="table-container">
		<table>
			<tr>
				<?php
				// Render the table header with the provided header name.
				foreach ($props["columns"] as $columnName) {
					echo "<th class='table-cell'>$columnName</th>";
				}

				// If the "statusMap" property is set, add a "Status" column header.
				if (isset($props["statusMap"])) {
					echo "<th class='table-cell'>Status</th>";
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
					if (isset($props["addUnits"]))
					{
						if ($columnName == "Price" || $columnName == "My Cut")
						{
							require_once __DIR__ . "/../../Model/ManipulationFunctions.php";
							// Use the humanize_number function to format the price.
							$humanizedPrice = humanize_number($obj->$getter());
							// If the "addUnits" property is set, add "/month" to the price.
							if($obj->getFor() == "Rent")
							{
								if($columnName == "Price")
									echo "<td class='table-cell'>" . htmlspecialchars($humanizedPrice) . " EGP/month" . "</td>";
								else
									echo "<td class='table-cell'>" . htmlspecialchars($humanizedPrice) . " EGP" . "</td>";
							}
							else
							{
								echo "<td class='table-cell'>" . htmlspecialchars($humanizedPrice) . " EGP</td>";
							}
						}else if($columnName == "Backyard Area"){
							echo "<td class='table-cell'>" . htmlspecialchars($obj->$getter()) . " m<sup>2</sup></td>";
						}else{
							echo "<td class='table-cell'>" . htmlspecialchars($obj->$getter()) . "</td>";
						}
					}else{
						echo "<td class='table-cell'>" . htmlspecialchars($obj->$getter()) . "</td>";
					}
				}
					
				// If the "statusMap" property is set, add a status cell.
				// The status is obtained from the object using the "getStatus" method.
				// The status color is obtained from the "statusMap" property using the status as the key.
				if(isset($props["statusMap"])) {
					// If the "statusMap" property is set, add a status cell.
					$status = $obj->getStatus();
					$statusColor = $props["statusMap"][$status];
					echo "<td class='table-cell' style='color: $statusColor;'>$status</td>";
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
	.header {
		font-size: clamp(0.4rem, 2vw, 1.2rem);
		font-family: Roboto;
		font-weight: 600;
		color: var(--primary);
		text-align: left;
		margin-left: 1%;
	}

	.table-container {
		display: flex;
		justify-content: center;
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
		border-spacing: 0 12px; /* vertical gap between rows */
		border-collapse: separate;
	}

	.table-container tr {
		width: 100%;
		
		margin-bottom: 16px;
		border-radius: 4px;
	}

	.table-container tr:not(:first-child):hover {
		background-color: rgba(255, 255, 255, 0.1);
	}

	.table-cell {
		
		padding: 8px 16px;
		vertical-align: middle;
	}

	.action-cell {
		display: flex;
		gap: 12px;
		
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
		text-align: left;
	}

	.table-container td {
		font-size: clamp(0.2rem, 2vw, 0.875rem);
		font-family: Roboto;
		color: rgba(255, 255, 255, 0.75);
		white-space: nowrap; /* Prevents text from wrapping */
		text-overflow: ellipsis;
		text-align: left;
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
