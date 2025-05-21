<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../controllers/check-signed.php";
require_once "../gui/GUI.php";
require_once __DIR__ . "/../gui/components/Sidebar.php";
require_once __DIR__ . "/../Head.php";
require_once __DIR__ . "/../gui/components/Table.php";
require_once __DIR__ . "/../gui/components/SidebarItem.php";
require_once __DIR__ . "/../gui/components/Topbar.php";
require_once __DIR__ . "/../gui/components/Controller.php";
$gui = GUI::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $gui->getComponentHTML("Head", ["page-title" => "Clients"]) ?>
    <link rel="stylesheet" href="../table-page.css">
</head>
<body>

<div class="horizontal-stack">
    <?= $gui->getComponentHTML("Sidebar", ["selected-page" => "clients"]) ?>
    <div class="right-content">
        <div class="vertical-stack">
        <?php
        echo GUI::getInstance()->getComponentHTML('TopBar', [
            'avatar' => '../assets/avatar.jpg',
            'username' => $_SESSION["user_first_name"] . " " . $_SESSION["user_last_name"],
            'role' => $_SESSION["user_role"],
            'bell' => '../assets/bell.svg'
        ]);

        require_once "../Model/User.php";
        $client = LoadUser("Client");

        $getterMap = [
            "Client ID" => "getUserId",
            "First Name" => "getFirstName",
            "Last Name" => "getLastName",
            "Phone Number" => "getPhoneNumber",
            "Rating" => "getRating",
            "Provided Property Features" => "getProvidePropertyFeatures",
            "Needed Property Features" => "getNeedPropertyFeatures",
        ];

        echo $gui->getComponentHTML("Table", [
            "columns" => array_keys($getterMap),
            "object" => $client,
            "getterMap" => $getterMap,
            "hasActionColumn" => true
        ]);
        ?>
        </div>
    </div>
</div>
</body>
</html>

<style>
.horizontal-stack {
    display: flex;
    width: 100%;
    height: 100vh;
    flex-direction: row;
}
.right-content {
    flex: 0 0 1;
    width: 100%;
    overflow-x: auto;
    padding: 1%;
}
.vertical-stack {
    display: flex;
    flex-direction: column;
    gap: 24px;
    width: 79%;
    position: absolute;
    top: 0;
}
</style>
