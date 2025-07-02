<?php


require_once __DIR__ . "/../GUI.php";

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    // Accept dynamic labels, default to example columns
    $labels = $props['labels'] ?? ['Name', 'Email', 'Phone', 'Last Login', 'Role', 'Status'];
    // Accept initial orders, default to all "Low to High"
    $orders = $props['orders'] ?? array_fill(0, count($labels), 'Low to High');
    $inputName = $props['inputName'] ?? 'sort_orders';

    ob_start();
    ?>
    <div class="sort-modal" >
        <div class="sort-title">Sort By</div>
        <div class="sort-list">
            <select name="sort-on" class="sort-label-select">
                <?php foreach ($labels as $label): ?>
                    <option value="<?= htmlspecialchars($label) ?>">
                        <?= htmlspecialchars($label) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div class="sort-order-toggle" style="cursor: pointer;">
                <span class="sort-order">Low to High ⇅</span>
            </div>

            <input type="hidden" class="sort-hidden-input" name="sort-hidden-input" value="Low to High">
        </div>

        <div class="sort-done-wrap">
            <button type="submit" class="sort-apply-btn" onclick="onSortApply()">Apply</button>
                </div>
    </div>
    <?php
    return ob_get_clean();
});

ob_start();
?>
<style>
.sort-modal {
    font-family: Roboto;
    justify-content: center;
    align-items: center;
    background: #232323;
    gap: 46px;
    display: none;
    z-index: 9999;
    font-size: 15px;
        color: var(--light);
        min-width: 15vw;
        max-width: 60vw;
        max-height: 80vh;
        background-color: var(--lighter-dark);
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.6);
        flex-direction: column;
        overflow: hidden; /* Prevent content overflow */
        padding: 16px;
        width: auto;
}
.sort-title {
    position: absolute;
        right: center;
        top: 16px;
        margin: auto;
        font-size: 24px;
        color:  #e2a94b;
}
.sort-list {
    display: grid;
    row-gap: 26px;
    margin-top: 50px;
    font-size: 1.1em;
    width: auto;
}
.sort-row {
    display: grid;
    grid-template-columns: 1fr 1fr 32px;
    align-items: center;
    cursor: pointer;
    position: relative;
    gap: 8px;
    width: auto;
    margin-left: 8px;
}
.sort-order, .sort-icon {
    color: #bdbdbd;
}
.sort-row:hover .sort-order,
.sort-row:hover .sort-icon {
    color: #e2a94b;
}
.sort-done-wrap {
    text-align: center;
}
.sort-apply-btn {
    background: #e2a94b;
    color: #232323;
    border: none;
    border-radius: 7px;
    padding: 7px 22px;
    font-weight: 600;
    font-size: 1em;
    cursor: pointer;
}
.sort-hidden-input {
    display: none;
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
function onSortApply() {
    // Example: collect selected sort options and orders
    const rows = document.querySelectorAll('.sort-row');
    const result = [];
    rows.forEach(row => {
        const select = row.querySelector('.sort-label-select');
        const order = row.querySelector('.sort-order').textContent.trim();
        if (select) {
            result.push({
                label: select.value,
                order: order
            });
        }
    });
    // Do something with result, e.g., send via AJAX or log
    console.log(result);
    // Optionally, close modal
    document.querySelector('.sort-modal').style.display = 'none';
}
    function showSortModal(buttonElement) {
        const Modal = document.querySelector('.sort-modal');

        const rect = buttonElement.getBoundingClientRect();
        const modalWidth = Modal.offsetWidth;

        Modal.style.position = 'absolute';
        Modal.style.top = `${rect.bottom + window.scrollY}px`; // place below the button
        Modal.style.left = `${rect.left - modalWidth}px`; // align right edge of modal to left edge of button
        Modal.style.display = 'flex';

        Modal.animate([
            { opacity: 0, transform: 'translateY(-20px)' },
            { opacity: 1, transform: 'translateY(0)' }
        ], {
            duration: 200,
            fill: 'forwards'
        });
    
    }
$(document).on('click', '.sort-order-toggle', function () {
    const $order = $(this).find('.sort-order');
    const $input = $(this).closest('.sort-list').find('.sort-hidden-input');
    const current = $order.text().trim();

    if (current.startsWith('Low to High')) {
        $order.text('High to Low ⇅');
        $input.val('High to Low');
    } else {
        $order.text('Low to High ⇅');
        $input.val('Low to High');
    }
});
</script>
<?php
$js = ob_get_clean();
$js = str_replace("<script>", "", $js);
$js = str_replace("</script>", "", $js);
$gui->addComponentJS($js);