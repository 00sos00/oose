<?php
require_once "gui/GUI.php";
function getFilterSvg() {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="none" viewBox="0 0 20 18">
        <path fill="#E3B04B" d="M.152 1.145A1.556 1.556 0 0 1 1.562.25h16.875a1.566 1.566 0 0 1 1.207 2.555l-7.144 8.73V16.5c0 .473-.266.906-.692 1.117-.425.211-.93.168-1.308-.117L8 15.625a1.242 1.242 0 0 1-.5-1v-3.09L.35 2.801a1.558 1.558 0 0 1-.199-1.656Z"/>
    </svg>';
}

function getSortSvg() {
    return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="none" viewBox="0 0 20 16">
        <path fill="#E3B04B" d="M5.264 15.417a1.115 1.115 0 0 1-1.639 0L.569 12.084a1.11 1.11 0 0 1 .07-1.57 1.11 1.11 0 0 1 1.57.07l1.124 1.226V1.333a1.11 1.11 0 1 1 2.223 0V11.81l1.125-1.23a1.113 1.113 0 0 1 1.569-.07c.451.414.483 1.119.07 1.57l-3.056 3.334v.003ZM11.11.223h1.111a1.11 1.11 0 1 1 0 2.222h-1.11a1.11 1.11 0 1 1 0-2.222Zm0 4.444h3.333a1.11 1.11 0 1 1 0 2.222H11.11a1.11 1.11 0 1 1 0-2.222Zm0 4.445h5.556a1.11 1.11 0 1 1 0 2.222H11.11a1.11 1.11 0 1 1 0-2.222Zm0 4.444h7.778a1.11 1.11 0 1 1 0 2.222H11.11a1.11 1.11 0 1 1 0-2.222Z"/>
    </svg>';
}

$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    $createText = $props['createText'] ?? 'Create';
    $currentPage = (int)($props['currentPage'] ?? 1);
    $totalPages = (int)($props['totalPages'] ?? 3);
    $onCreateClick = $props['onCreateClick'] ?? '';
    $controllerTitle = $props['controllerTitle'] ?? 'Controller Name';

    // Get properties from props with default values
    $createText = $props['createText'] ?? 'Create';
    $currentPage = $props['currentPage'] ?? 1;
    $totalPages = $props['totalPages'] ?? 3;
    $onCreateClick = $props['onCreateClick'] ?? '';
    $controllerTitle = $props['controllerTitle'] ?? 'Controller Name'; // New prop
    
    ob_start();
?>
    <div class="controller">
        <div class="left-section">
            <h2 class="controller-title"><?php echo htmlspecialchars($controllerTitle); ?></h2>
        </div>
        <div class="right-section">
            <button class="create-btn">
                <?php echo htmlspecialchars($createText); ?>
            </button>
            <div class="navigation">
                <button class="sort-btn"><?php echo getFilterSvg(); ?></button>
                <button class="sort-btn"><?php echo getSortSvg(); ?></button>
                <button class="nav-btn back-btn" <?php echo $currentPage <= 1 ? 'disabled' : ''; ?>>Back</button>
                <div class="page-numbers">
                    <?php
                    // Pagination logic: show max 3 pages, sliding window
                    $start = max(1, min($currentPage - 1, $totalPages - 2));
                    $end = min($start + 2, $totalPages);
                    if ($end - $start < 2) $start = max(1, $end - 2);
                    for ($i = $start; $i <= $end; $i++): ?>
            <!-- Controller title -->
            <h2 class="controller-title"><?php echo htmlspecialchars($controllerTitle); ?></h2>
        </div>
        <div class="right-section">
            <!-- Create button moved here -->
            <button class="create-btn">
                <?php echo htmlspecialchars($createText); ?>
            </button>
            
            <!-- Navigation section -->
            <div class="navigation">
                <!-- Filter and Sort buttons -->
                <button class="sort-btn">
                    <?php echo getFilterSvg(); ?>
                </button>
                <button class="sort-btn">
                    <?php echo getSortSvg(); ?>
                </button>
                <button class="nav-btn back-btn" attribute = <?php echo $currentPage < 1 ? 'disabled' : 'enabled' ; ?>>Back</button>
                <div class="page-numbers">
                    <?php 
                    // Calculate which page numbers to show
                    $start = max(1, min($currentPage - 1, $totalPages - 2));
                    $end = min($start + 2, $totalPages);
                    if ($end - $start < 2) $start = max(1, $end - 2);
                    for ($i = $start; $i <= $end; $i++): 
                    ?>
                        <button class="page-btn <?php echo $i === $currentPage ? 'active' : ''; ?>" data-page="<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </button>
                    <?php endfor; ?>
                </div>
                <button class="nav-btn next-btn" <?php echo $currentPage >= $totalPages ? 'disabled' : ''; ?>>Next</button>
            </div>
        </div>
    </div>
<?php
    $html = ob_get_clean();
    return $html;
});

// Component styles
ob_start();
?>
<style>
    .controller {
        width: 100%;
        height: 60px;
        padding: 0 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--lighter-dark);
        box-sizing: border-box;
    }
    .controller-title {
        color: var(--light);
        margin: 0;
        font-size: 1.5rem;
    }
    .right-section {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .left-section {
        display: flex;
        gap: 16px;
        align-items: center;
    }
    .create-btn {
        background-color: var(--primary);
        color: var(--dark);
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        transition: opacity 0.2s ease;
    }
    .create-btn:hover {
        opacity: 0.8;
    }
    .sort-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        transition: transform 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sort-btn:hover {
        transform: scale(1.1);
    }
    .sort-btn svg {
        width: 20px;
        height: 20px;
    }
    .navigation {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .nav-btn {
        background: none;
        border: none;
        color: var(--light);
        cursor: pointer;
        padding: 8px 16px;
        transition: color 0.2s ease;
    }
    .nav-btn:not([disabled]):hover {
        color: var(--primary);
    }
    .nav-btn[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
    }
    .page-numbers {
        display: flex;
        gap: 8px;
    }
    .page-btn {
        background: none;
        border: none;
        color: var(--light);
        cursor: pointer;
        width: 32px;
        height: 32px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    .page-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    .page-btn.active {
        background-color: var(--primary);
        color: var(--dark);
        font-weight: bold;
    }
</style>
<?php
$css = ob_get_clean();
$css = str_replace("<style>", "", $css);
$css = str_replace("</style>", "", $css);
$gui->addComponentCSS($css);

// Component JavaScript
ob_start();
?>
<script>
$(document).ready(function() {
    function updatePageParam(page) {
        let url = new URL(window.location.href);
        url.searchParams.set('page', page);
        // Redirect through the correct path
        window.location.href = url.toString();
    }

    $('.page-btn').click(function() {
        if (!$(this).hasClass('active')) {
            let page = $(this).data('page');
            updatePageParam(page);
        }
    });

    $('.back-btn').click(function() {
        let current = parseInt($('.page-btn.active').data('page')) || 1;
        if (!$(this).prop('disabled') && !isNaN(current)) {
            updatePageParam(current - 1);
        }
    });

    $('.next-btn').click(function() {
        let current = parseInt($('.page-btn.active').data('page')) || 1;
        if (!$(this).prop('disabled') && !isNaN(current)) {
            updatePageParam(current + 1);
        }
    });
});
</script>
<?php
$js = ob_get_clean();
$js = str_replace("<script>", "", $js);
$js = str_replace("</script>", "", $js);
$gui->addComponentJS($js);