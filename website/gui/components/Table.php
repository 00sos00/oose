<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function penIconSVG() {
	return "
	<svg class='pen-icon' xmlns='http://www.w3.org/2000/svg' width='17' height='16' fill='none' viewBox='0 0 17 16'>
		<g clip-path='url(#a)'>
			<path fill='#E3B04B' fill-opacity='.75' d='m11.906.604-1.512 1.512 4.062 4.063 1.513-1.513a2 2 0 0 0 0-2.828L14.737.604a2 2 0 0 0-2.828 0h-.003ZM9.687 2.822 2.403 10.11a2.771 2.771 0 0 0-.694 1.168l-1.106 3.76a.75.75 0 0 0 .928.934l3.76-1.106a2.77 2.77 0 0 0 1.168-.694l7.29-7.287-4.062-4.063Z'/>
		</g>
		<defs>
			<clipPath id='a'>
				<path fill='#fff' d='M.571 0h16v16h-16z'/>
			</clipPath>
		</defs>
	</svg>
	";
}

function trashIconSVG() {
	return "
	<svg class='trash-icon' xmlns='http://www.w3.org/2000/svg' width='17' height='16' fill='none' viewBox='0 0 17 16'>
		<path fill='#E3B04B' fill-opacity='.75' d='M5.796.553A.996.996 0 0 1 6.69 0h3.763c.378 0 .725.212.893.553l.225.447h3a.999.999 0 1 1 0 2h-12a.999.999 0 1 1 0-2h3l.225-.447ZM2.571 4h12v10c0 1.103-.896 2-2 2h-8c-1.103 0-2-.897-2-2V4Zm3 2c-.275 0-.5.225-.5.5v7c0 .275.225.5.5.5s.5-.225.5-.5v-7c0-.275-.225-.5-.5-.5Zm3 0c-.275 0-.5.225-.5.5v7c0 .275.225.5.5.5s.5-.225.5-.5v-7c0-.275-.225-.5-.5-.5Zm3 0c-.275 0-.5.225-.5.5v7c0 .275.225.5.5.5s.5-.225.5-.5v-7c0-.275-.225-.5-.5-.5Z'/>
	</svg>
	";
}

$loadComponent = function ($gui) {
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
		<div class="table-container widget-dropshadow">
			<table data-deleteScriptName=<?= $props["deleteScriptName"] ?> style="border-collapse: collapse;">
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
					$idGetter = $props["getterMap"]["ID"];
					$entityID = $obj->$idGetter();
					echo "<tr data-id='$entityID'>";
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
						echo penIconSVG();
						echo trashIconSVG();
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
		}

		.table-container table {
			width: 100%;
		}

		.table-container tr {
			border-radius: 4px;
		}

		.table-container tr:not(:first-child):hover {
			background-color: rgba(255, 255, 255, 0.1);
		}

		.table-cell {
			padding: 16px 16px;
			vertical-align: middle;
		}

		.action-cell svg {
			cursor: pointer;
		}
		
		.action-cell svg:first-child {
			margin-right: 12px;
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
	function openModifyForm(id) {
		loadModifyData(id)
		$(".modify-form-container").fadeIn(150, "swing");
		$(".modify-form input[name='id']")[0].value = id;
		openOverlay();
	}

	function closeModifyForm() {
		$(".modify-form-container").fadeOut(150, "swing");
	}

	$(window).on("load", () => {
		$(".pen-icon").on("click", e => {
			const row = e.target.closest("tr");
			const id = row.getAttribute("data-id");
			openModifyForm(id);
			openOverlay();
		});

		$(".trash-icon").on("click", e => {
			if (confirm("Are you sure you want to delete this?")) {
				const row = e.currentTarget.closest("tr");
				const table = e.currentTarget.closest("table");
				const entityID = row.getAttribute("data-id");
				const deleteScriptName = table.getAttribute("data-deleteScriptName");
				
				fetch("/controllers/" + deleteScriptName + ".php", {
					method: "POST",
					headers: { "Content-Type": "application/x-www-form-urlencoded" },
					body: "id=" + entityID
				})
				.then(response => response.text())
				.then(res => {
					if (res) {
						row.remove();
					}
				});
			}
		});
	});
	</script>
	<?php
	$js = ob_get_clean();
	$js = str_replace("<script>", "", $js);
	$js = str_replace("</script>", "", $js);
	$gui->addComponentJS($js);
};
