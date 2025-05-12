<?php
$strippedFileName = basename(__FILE__, ".php");

$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    ob_start();
?>
    <div class="Topbar">
        <div class="Topbar-right">
            <img src="assets/notification-icon.svg" alt="Notifications" class="Topbar-icon" />

            <div class="user-info">
                <p class="user-name"><?= $props["user-name"] ?? "User Name" ?></p>
                <p class="user-role"><?= $props["user-role"] ?? "Role" ?></p>
            </div>

            <div class="profile-pic">
                <img src="<?= $props["profile-img"] ?? 'assets/default-profile.svg' ?>" alt="Profile Picture" />
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
});
?>
