<?php
require_once __DIR__ . '/gui/GUI.php';
require_once __DIR__ . '/gui/components/Topbar.php';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>TopBar Example</title>
  <link rel="stylesheet" href="Topbar.css?v=<?php echo time(); ?>">
</head>
<body>
  <?php
    echo GUI::getInstance()->getComponentHTML('TopBar', [
      'avatar' => 'assets/avatar.jpg',
      'username' => 'User Name',
      'role' => 'Admin',
      'bell' => 'assets/bell.svg'
    ]);
  ?>
</body>
</html>
