<?php

require_once __DIR__ . "/../GUI.php";
$gui = GUI::getInstance();

$strippedFileName = basename(__FILE__, ".php");
$gui->addComponentRenderFunction($strippedFileName, function ($props) use ($gui) {
    ob_start();
?>
<div class="create-account-modal">
    <div class="create-account-header">
        <h1 class="create-account-title">Create Account</h1>
        <button class="close-btn" onclick="closeCreateAccount()">
            <svg width="24" height="24" viewBox="0 0 24 24"><path fill="#E3B04B" d="M18.3 5.71a1 1 0 0 0-1.41 0L12 10.59 7.11 5.7A1 1 0 1 0 5.7 7.11L10.59 12l-4.89 4.89a1 1 0 1 0 1.41 1.41L12 13.41l4.89 4.89a1 1 0 0 0 1.41-1.41L13.41 12l4.89-4.89a1 1 0 0 0 0-1.4z"/></svg>
        </button>
    </div>
    <form class="create-account-form">
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
            "label" => "Phone Number",
            "input-name" => "phone-number",
            "input-type" => "text"
        ]) ?>
        <?= $gui->getComponentHTML("InputHolder", [
            "label" => "Email",
            "input-name" => "email",
            "input-type" => "email"
        ]) ?>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>
<?php
    $html = ob_get_clean();
    return $html;
});

ob_start();
?>
<style>
.create-account-modal {
    background: var(--dark);
    color: var(--light);
    border-radius: 8px;
    padding: 32px 32px 24px 32px;
    max-width: 400px;
    min-width: 320px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 2px solid var(--primary); 
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
}
.create-account-form {
    background: transparent; 
    margin: 0;              
    padding-left: 3px;           
    display: flex;
    flex-direction: column;
    gap: 16px;             
}
.create-account-form label {
    font-family: Roboto, sans-serif;
    margin-bottom: 4px;
}
.create-account-form input {
    border-radius: 12px;
    height: 40px;
    font-size: 1rem;
    outline: none;
    border: none;
    padding-left: 12px;
    color: var(--dark);
    background-color: var(--light);
    font-family: Roboto, sans-serif;
    width: 70%;
    box-sizing: border-box;
}
.submit-btn {
    margin-top: 16px;
    font-size: 1rem;
    font-weight: bold;
    height: 40px;
    padding: 0 16px;
    border: none;
    border-radius: 12px;
    color: var(--dark);
    background-color: var(--primary);
    cursor: pointer;
    width: 70%;
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
function closeCreateAccount() {
    const modal = document.querySelector('.create-account-modal');
    if (modal) modal.style.display = 'none';
}
</script>
<?php
$js = ob_get_clean();
$js = str_replace("<script>", "", $js);
$js = str_replace("</script>", "", $js);
$gui->addComponentJS($js);