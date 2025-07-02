<?php
require_once __DIR__ . "/../GUI.php";
$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) use ($gui) {
	ob_start();
?>
<div class="overlay-window">
    <div class="overlay-backdrop"></div>
    <div class="overlay-modal">
        <div class="overlay-header">
            <!-- Optional title and close button -->
            <h2 class="overlay-title"><?= $props["title"] ?? "Add item"; ?></h2>
            if($props["title"] == "Sort By") {
                
            }
            <!-- Close button to hide the overlay -->
            <!-- closeOverlay() is a JavaScript function that should be defined to hide the overlay -->
            
            <button class="close-button" onclick="closeOverlay()">&times;</button>
        </div>
        <div class="overlay-content">
            <!-- Content can be any HTML, including forms, text, etc. -->
            <!-- Example text fields, radio buttons, etc.. -->
            <?php
                if (isset($props["content"])) {
                    for ($i = 0; $i < count($props["content"]); $i++) {
                        if (isset($props["content-title"])) {
                            $contentTitle = $props["content-title"][$i] ?? "";
                            // Output the content title, escaping HTML to prevent XSS
                            echo '<div class="content-title"><h3>' . $contentTitle . '</h3></div>';
                        }
                        $contentLine = $props["content"][$i] ?? "Content line " . ($i + 1);
                        // Output the content line, escaping HTML to prevent XSS
                        echo '<div class="content-line">' . $contentLine . '</div>';
                    }
                }
            ?>

        </div>
        <div class="overlay-footer">
            <!-- Action and cancel buttons -->
            <!-- The action button can have a custom action defined by the user -->
            <button class="cancel-button" onclick="closeOverlay()">
                <?= $props["cancel-text"] ?? "Cancel"; ?>
            </button>
            <button class="action-button" onclick="<?= $props["action"] ?? "defaultAction()"; ?>">
                <?= $props["action-text"] ?? "Complete"; ?>
            </button>
        </div>
    </div>
</div>

<?php
	$html = ob_get_clean();
	return $html;
});

ob_start();
?>
<style>
	.overlay-window{
        font-family: Roboto;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999; 
    }
    .overlay-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(2px);
        opacity: 0.5;
        z-index: 1; /* Behind the modal */
    }
    .overlay-modal {
        font-size: 13px;
        color: var(--light);
        position: relative;
        width: auto;
        min-width: 30vw;
        max-width: 60vw;
        max-height: 80vh;
        background-color: var(--lighter-dark);
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.6);
        display: flex;
        flex-direction: column;
        overflow: hidden; /* Prevent content overflow */
        z-index: 9999; 
        padding: 16px;
    }
    .overlay-header{
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        box-sizing: border-box;
        background-color: var(--primary);
        border-radius: 16px 16px 0 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        padding: 28px 0;
    }
    .overlay-title {
        position: absolute;
        right: center;
        top: 16px;
        margin: auto;
        font-size: 24px;
        color: var(--dark);
        
    }
    .close-button {
        position: absolute;
        right: 16px;
        top: 16px;
        background: none;
        border: none;
        color: var(--dark);
        opacity: 0.7;
        transition: opacity 0.2s ease;
        font-size: 24px;
        cursor: pointer;
    }
    .close-button:hover {
        opacity: 1;
    }
    .overlay-content{
        margin: 32px 0; /* Adjust for header and footer height */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1 1 auto;
        padding: 16px;
        box-sizing: border-box;
        overflow-x: hidden; /* Prevent horizontal scrolling */
        overflow-y: auto;         /* Enable vertical scrolling */
        min-height: 0;            /* Required for flexbox scrolling */
        max-height: 60vh;         /* Optional: limit content area height */
    }
    .content-line{
        width: 100%;
        display: flex;              /* Elements inside are side by side */
        flex-direction: row;        /* (optional, default for flex) */
        justify-content: left;/* Align items to the left */
        align-items: center;        /* Vertically center items */
        margin: 0 0 16px 16px; /* Space between lines */
        gap: 32px;
        padding: 10px;
    }
    .content-title {
        font-size: 0.8rem;
        color: var(--primary);
        display: inline-flex;
        flex-direction: row;
        justify-content: flex-start;   /* Align content to the left */
        align-items: center;           /* Vertically center items */
        padding: 0 5px;
        border-bottom: 1px solid var(--primary);
        margin-left: 0;                /* Remove any left margin */
        margin-bottom: 10px;           /* Space below the title */
        margin-right: auto;
    }
    .overlay-footer {
        position: absolute;
        bottom: 0;
        display: flex;
        flex-direction: row;
        width: 100%;
        justify-content: center;
        align-items: center;
        padding: 16px;
        box-sizing: border-box;
        gap: 16px;
    }
    .action-button, .cancel-button {
        background-color: var(--primary);
        color: var(--dark);
        padding: 10px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: opacity 0.3s ease;
        display: block;
    }
    .cancel-button {
        background-color: rgba(0,0,0,0);
        color: var(--light);
    }
    .action-button {
        background-color: var(--primary);
        color: var(--dark);
        box-shadow: -1px 2px 6px rgba(0, 0, 0, 0.6);
    }
    .action-button:hover, .cancel-button:hover {
        opacity: 0.8;
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
    // Function to show the overlay
    function showOverlay() {
        const overlay = document.querySelector('.overlay-window');
        overlay.style.display = 'flex';
        overlay.animate([
            { opacity: 0.5, transform: 'scale(0.8)' },
            { opacity: 1, transform: 'scale(1)' }
        ], {
            duration: 300,
        });
    }
    // Function to close the overlay
    function closeOverlay() {
        const overlay = document.querySelector('.overlay-window');
        const animation = overlay.animate([
            { opacity: 1, transform: 'scale(1)' },
            { opacity: 0.5, transform: 'scale(0.8)' }
        ], {
            duration: 100,
        });
        animation.finished.then(() => {
            // After the animation completes, hide the overlay
            overlay.style.display = 'none';
        });
    }
    // Default action function, can be customized
    function defaultAction() {
        alert('Default action executed!');
            closeOverlay();
    }
</script>
<?php
$js = ob_get_clean();
$js = str_replace("<script>", "", $js);
$js = str_replace("</script>", "", $js);
$gui->addComponentJS($js);