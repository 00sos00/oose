<?php
require_once __DIR__ . "/../../Model/Role.php";

$loadComponent = function ($gui) {
	$strippedFileName = basename(__FILE__, ".php");
	$gui->addComponentRenderFunction($strippedFileName, function ($props) use ($gui) {
	    ob_start();
	?>
	<div class="create-form-container">
		<div class="create-account-modal">
		    <div class="create-account-header">
		        <h1 class="create-account-title">Create Account</h1>
		        <button class="close-btn" onclick="closeCreateAccount()">
		            
		        </button>
		    </div>
		    <form action="/controllers/create-account.php" method="post" class="create-account-form">
		        <?= $gui->getComponentHTML("InputHolder", [
		            "label" => "First Name",
		            "input-name" => "first-name",
		            "input-type" => "text"
		        ]) ?>
		        <?= $gui->getComponentHTML("InputHolder", [
		            "label" => "Last Name",
		            "input-name" => "last-name",
		            "input-type" => "text"
		        ]) ?>
				<?= $gui->getComponentHTML("InputHolder", [
		            "label" => "Country Code",
		            "input-name" => "country-code",
		            "input-type" => "text"
		        ]) ?>
		        <?= $gui->getComponentHTML("InputHolder", [
		            "label" => "Phone Number",
		            "input-name" => "phone-number",
		            "input-type" => "text"
		        ]) ?>
		        <?= $gui->getComponentHTML("InputHolder", [
		            "label" => "Email",
		            "input-name" => "email",
		            "input-type" => "email"
		        ]) ?>
		        <?php
				$roles = FetchRoles();
				$convertedRoles = [];
				foreach ($roles as $role) {
					$convertedRoles[$role->getRoleId()] = $role->getRoleName();
				}
				
				echo $gui->getComponentHTML("Dropdown", [
			        "label" => "Role",
			        "dropdown-name" => "role",
			        "options" => $convertedRoles
		        ])
				?> 
		        <button type="submit" class="submit-btn">Submit</button>
		    </form>
		</div>
	</div>
	<?php
	    $html = ob_get_clean();
	    return $html;
	});
	ob_start();
	?>
	<style>
	.create-form-container {
		display: none;
		z-index: 2;
	}

	.create-account-modal {
	    background: var(--dark);
	    color: var(--light);
	    border-radius: 8px;
	    padding: 48px 48px 48px 48px;   
	    max-width: 600px;               
	    min-width: 400px;    
	    box-sizing: border-box;
	    display: flex;
	    flex-direction: column;
	    align-items: stretch;
	    position: fixed;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    border: 1px solid var(--primary);
	    z-index: 1000;
	    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
	}

	.create-account-header {
	    display: flex;
	    justify-content: space-between;
	    align-items: center;
	    margin-bottom: 24px;
	}

	.create-account-title {
	    color: var(--primary);
	    font-size: 2rem;
	    margin: 0;
	    font-family: Roboto, sans-serif;
	    font-weight: bold;
	}

	.close-btn {
	    background: none;
	    border: none;
	    cursor: pointer;
	    padding: 0;
	    display: flex;
	    align-items: center;
	}

	.create-account-form {
	    width: 100%;
	    box-sizing: border-box;
	    background: transparent;
	    margin: 0;
	    padding: 0;
	    display: flex;
	    flex-direction: column;
	    gap: 16px;
	}

	.submit-btn {
	    margin-top: 16px;
	    font-size: 1rem;
	    font-weight: bold;
	    height: 40px;
	    padding: 0 16px;
	    border: none;
	    border-radius: 4px;
	    color: var(--dark);
	    background-color: var(--primary);
	    cursor: pointer;
	    transition: opacity 0.2s;
	}
	.submit-btn:hover {
	    opacity: 0.85;
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
};
