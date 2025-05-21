<?php
require_once __DIR__ . "/../GUI.php";
$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) use ($gui) {
	ob_start();
?>

	<div class="sidebar-container">
		<div class="logo-container">
			<img src="/Luxville/website/assets/logo.png" alt="logo">
		</div>
		<div class="items-container">
			<?php
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Dashboard",
				"icon-name" => "dashboard-icon",
				"href" => "#",
				"selected" => $props["selected-page"] == "dashboard"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Reports",
				"icon-name" => "reports-icon",
				"href" => "#",
				"selected" => $props["selected-page"] == "reports"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Deals",
				"icon-name" => "deals-icon",
				"href" => "Deals_view.php",
				"selected" => $props["selected-page"] == "deals"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Properties",
				"icon-name" => "properties-icon",
				"href" => "Property_view.php",
				"selected" => $props["selected-page"] == "properties"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Accounts",
				"icon-name" => "accounts-icon",
				"href" => "Account_view.php",
				"selected" => $props["selected-page"] == "account"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Roles",
				"icon-name" => "roles-icon",
				"href" => "Roles_view.php",
				"selected" => $props["selected-page"] == "roles"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Clients",
				"icon-name" => "clients-icon",
				"href" => "Client_view.php",
				"selected" => $props["selected-page"] == "clients"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Appointments",
				"icon-name" => "appointments-icon",
				"href" => "#",
				"selected" => $props["selected-page"] == "appointments"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Owners",
				"icon-name" => "owners-icon",
				"href" => "Owner_view.php",
				"selected" => $props["selected-page"] == "owners"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Transactions",
				"icon-name" => "transactions-icon",
				"href" => "#",
				"selected" => $props["selected-page"] == "transactions"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "System Logs",
				"icon-name" => "Logs-icon",
				"href" => "#",
				"selected" => $props["selected-page"] == "logs"
			]);
			echo $gui->getComponentHTML("SidebarItem", [
				"item-text" => "Sign Out",
				"icon-name" => "signout-icon",
				"href" => "../controllers/sign-out.php"
			]);
			?>
		</div>
	</div>

<?php
	$html = ob_get_clean();
	return $html;
});

ob_start();
?>
<style>
	.sidebar-container {
		display: flex;
		flex-direction: column;
		gap: 12px;
		width: 19%;
		height: 100%;
		max-height: 100%;
		overflow-y: hidden;
		padding: 36px 0;
		background-color: var(--lighter-dark);
		box-shadow: 16px 0 24px rgba(0, 0, 0, 0.2);
		box-sizing: border-box;
	}

	.logo-container {
		height: 16%;
		display: flex;
		justify-content: center;
		margin-bottom: 6%;
	}

	.logo-container img {
		height: 100%;
	}

	.items-container {
		padding: 0 5%;
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
