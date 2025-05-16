<?php
require_once __DIR__ . "/../GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    $name = $props["toggle-name"] ?? "toggle";
    $label = $props["label"] ?? "Toggle";
    $checked = !empty($props["checked"]) ? 'checked' : '';

    ob_start();
    ?>
    <div class="toggle-switch-holder">
        <label class="toggle-switch-label" for="<?= htmlspecialchars($name) ?>">
            <?= htmlspecialchars($label) ?>
            <input type="checkbox" id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" class="toggle-switch-input" <?= $checked ?>>
            <span class="toggle-switch-slider"></span>
        </label>
    </div>
    <?php
    $html = ob_get_clean();
    return $html;
});

ob_start();
?>
<style>
.toggle-switch-holder {
    display: flex;
    flex-direction: column;
}

.toggle-switch-label {
      color: var(--light);
    font-family: Roboto;
    display: flex;
    align-items: center;
    justify-content: space-between; 
    width: 100%;                   
    cursor: pointer;
    user-select: none;
    gap: 12px;
}

.toggle-switch-input {
    display: none;
}

.toggle-switch-slider {
    position: relative;
    width: 48px;
    height: 24px;
    background: var(--light);
    border-radius: 24px;
    transition: background 0.2s;
    display: inline-block;
}

.toggle-switch-slider:before {
    content: "";
    position: absolute;
    left: 4px;
    top: 4px;
    width: 16px;
    height: 16px;
    background: var(--dark);
    border-radius: 50%;
    transition: transform 0.2s;
}

.toggle-switch-input:checked + .toggle-switch-slider {
    background: var(--primary);
}

.toggle-switch-input:checked + .toggle-switch-slider:before {
    transform: translateX(24px);
    background: var(--dark);
}
</style>
<?php
$css = ob_get_clean();
$css = str_replace("<style>", "", $css);
$css = str_replace("</style>", "", $css);
$gui->addComponentCSS($css);