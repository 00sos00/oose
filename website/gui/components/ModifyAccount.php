<?php
$loadComponent = function ($gui) {
	$strippedFileName = basename(__FILE__, ".php");
	$gui->addComponentRenderFunction($strippedFileName, function ($props) use ($gui) {
		ob_start();
	?>

		<div class="modify-form-container">
			<h1>Modify Account</h1>
			<form action="/controllers/modify-account.php" method="post" class="modify-form">
				<input type="hidden" name="id">
				<?= $gui->getComponentHTML("InputHolder", [
					"label" => "First Name",
					"input-type" => "text"
				]); ?>
				<?= $gui->getComponentHTML("InputHolder", [
					"label" => "Last Name",
					"input-type" => "text"
				]); ?>
				<?= $gui->getComponentHTML("InputHolder", [
					"label" => "Email Address",
					"input-type" => "email"
				]); ?>
				<?= $gui->getComponentHTML("InputHolder", [
					"label" => "Country Code",
					"input-type" => "text"
				]); ?>
				<?= $gui->getComponentHTML("InputHolder", [
					"label" => "Phone Number",
					"input-type" => "text"
				]); ?>
				<?php
					$roles = FetchRoles();
					$convertedRoles = [];
					foreach ($roles as $role) {
						$convertedRoles[$role->getRoleId()] = $role->getRoleName();
					}
					
					echo $gui->getComponentHTML("Dropdown", [
				        "label" => "Role",
				        "options" => $convertedRoles
		        ]); ?>
				<button type="submit" class="submit-btn">Save</button>
			</form>
		</div>

	<?php
		$html = ob_get_clean();
		return $html;
	});

	ob_start();
	?>
	<style>
	.modify-form-container {
		z-index: 2;
		display: none;
		width: 400px;
		padding: 24px;
		background-color: var(--dark);
		position: absolute;
		border: 1px solid var(--primary);
		border-radius: 16px;
	}

	.modify-form-container h1 {
		color: var(--primary);
		font-family: Roboto;
		font-weight: bold;
	}

	.modify-form {
		display: flex;
		flex-direction: column;
		gap: 24px;
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
	function loadModifyData(id) {
		fetch(`/controllers/modify-account.php?id=${id}`)
		.then(result => result.text())
		.then(result => {
			const userData = JSON.parse(result);
			const firstNameInput = $(".modify-form input[name=first-name]")[0];
			const lastNameInput = $(".modify-form input[name=last-name]")[0];
			const emailInput = $(".modify-form input[name=email-address]")[0];
			const countryCodeInput = $(".modify-form input[name=country-code]")[0];
			const phoneNumberInput = $(".modify-form input[name=phone-number]")[0];
			const roleSelect = $(".modify-form select[name=role]")[0];

			firstNameInput.value = userData["FIRST_NAME"];
			lastNameInput.value = userData["LAST_NAME"];
			emailInput.value = userData["EMAIL"];
			countryCodeInput.value = userData["COUNTRY_CODE"];
			phoneNumberInput.value = userData["PHONE_NUMBER"];
			roleSelect.value = userData["ROLE_ID"];
		});
	}
	</script>
	<?php
	$js = ob_get_clean();
	$js = str_replace("<script>", "", $js);
	$js = str_replace("</script>", "", $js);
	$gui->addComponentJS($js);
};
