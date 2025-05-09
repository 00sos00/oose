<?php
ob_start();
?>

<div>123</div>

<?php
$html = ob_get_clean();
echo $html;
