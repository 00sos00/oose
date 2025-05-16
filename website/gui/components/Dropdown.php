<?php
require_once __DIR__ . "/../GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    $name = $props["dropdown-name"] ?? "dropdown";
    $label = $props["label"] ?? "Select";
    $options = $props["options"] ?? [];
    $selected = $props["selected"] ?? null;

    ob_start();
    ?>
    <div class="dropdown-holder">
        <label for="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($label) ?></label>
        <select name="<?= htmlspecialchars($name) ?>" id="<?= htmlspecialchars($name) ?>">
            <?php foreach ($options as $value => $text): ?>
                <option value="<?= htmlspecialchars($value) ?>" <?= ($selected !== null && $selected == $value) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($text) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php
    $html = ob_get_clean();
    return $html;
});

ob_start();
?>
<style>
    .dropdown-holder {
        display: flex;
        flex-direction: column;
    }

    .dropdown-holder label {
        color: var(--light);
        font-family: Roboto;
        margin-bottom: 8px;
    }

    .dropdown-holder select {
        border-radius: 4px;
        height: 40px;
        font-size: 1rem;
        outline: none;
        border: none;
        padding-left: 12px;
        color: var(--dark);
        background-color: var(--light);
    }
</style>
<?php
$css = ob_get_clean();
$css = str_replace("<style>", "", $css);
$css = str_replace("</style>", "", $css);
$gui->addComponentCSS($css);

