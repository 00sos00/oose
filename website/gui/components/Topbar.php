<?php
require_once __DIR__ . '/../GUI.php';

GUI::getInstance()->addComponentRenderFunction('TopBar', function($props = []) {
    $avatar = isset($props['avatar']) ? $props['avatar'] : '../../assets/avatar.jpg';
    $username = isset($props['username']) ? $props['username'] : 'User Name';
    $role = isset($props['role']) ? $props['role'] : 'Admin';
    $bell = isset($props['bell']) ? $props['bell'] : '../../assets/bell.svg';
    ob_start();
    ?>
    
    <div class="top-bar">
      <div class="notification">
        <button id="bell-btn">
          <img src="<?php echo htmlspecialchars($bell); ?>" alt="Bell" class="bell-img">
          <span id="notif-dot" class="notification-dot"></span>
        </button>
      </div>
      <div class="user-info">
        <img src="<?php echo htmlspecialchars($avatar); ?>" alt="User" class="avatar">
        <div>
          <span class="name"><?php echo htmlspecialchars($username); ?></span>
          <span class="role"><?php echo htmlspecialchars($role); ?></span>
        </div>
      </div>
    </div>
    <?php
    return ob_get_clean();
});
?>

<style>
.top-bar {
  background:rgba(223, 0, 0, 0);
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: auto;
  padding: 0 32px;
  width: 100%;
  box-sizing: border-box;
  top: 0px
}
.notification {
  position: relative;
  display: flex;
  align-items: center;
}
#bell-btn {
  background: none;
  border: none;
  cursor: pointer;
  outline: none;
  padding: 0;
  position: relative;
}
.bell-img {
  width: 75%;
  height: 75%;
  margin: auto 0;
  display: block;
}
.notification-dot {
  position: absolute;
  top: -1; /* or your desired value */
  left: 56%;
  transform: translateX(-50%);
  width: 38%;
  height: 48%;
  border-radius: 100%;
  border: 2px solid #1D1D1B;
  background: #3ec46d;
  transition: background 0.2s;
  box-sizing: border-box;
}
.notification-dot.active {
  background: #e53935;
}
.user-info {
  display: flex;
  align-items: center;
  font-size: 0.8em;
  font-family: Roboto;
  gap: 10px;
}
.avatar {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  overflow: hidden;
  display: block;
  object-fit: cover;
  border: 3px solid #E3B04B;
}
.name {
  font-weight: bold;
  display: block;
}
.role {
  font-size: 0.85em;
  color: #E3B04B;
  display: block;
}
</style>