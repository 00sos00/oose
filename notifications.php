<?php
require_once __DIR__ . "/GUI.php";
$gui = GUI::getInstance();
// get filename without .php
$strippedFileName = basename(__FILE__, '.php');
$gui->addComponentRenderFunction($strippedFileName, function ($props) {
    // array bta3 el notifications, kol wa7da feha message w time
    $notifications = [
        ["message" => "New client added.", "time" => "1 minute ago"],
        ["message" => "Property details updated.", "time" => "5 minutes ago"],
        ["message" => "Deal approved.", "time" => "10 minutes ago"],
    ];

    // start buffering output 3ashan n3ml echo later
    ob_start();
    ?>
    <div class="notification-container">
        <div class="notification-header">
            <h2>Notifications</h2>
        </div>

        <div class="notification-list-header">
            <!-- el message eli betzhar lma kol el notifications et2ara, msh mabsota fa hidden -->
            <span class="all-read-message" id="all-read-message" style="display:none; color: #8f8f8f;">All caught up!</span>
            <!-- button 3ashan ta3ml mark le kol el notifications as read -->
            <button class="markall-as-read" id="mark-all-read">Mark all as read</button>
        </div>

        <div class="notification-list" id="notifications-list">
            <?php foreach ($notifications as $notification): ?>
                
                <div class="notification-item unread">
                    <div class="notification-message"><?= htmlspecialchars($notification["message"]) ?></div>
                    <div class="notification-time"><?= htmlspecialchars($notification["time"]) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="notification-footer">
            <a href="#" id="view-all">View all</a>
        </div>
    </div>
    <?php
    // return kol el output eli felbuffer
    return ob_get_clean();
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Notifications</title>
    <style>
       
        body {
            background: #181818;
            font-family: Arial, sans-serif;
        }
        .notification-container {
            background: #161613;
            width: 420px;
            min-height: 750px;
            margin: 40px auto;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.35), 0 1.5px 8px rgba(0,0,0,0.18);
            padding-bottom: 32px;
            display: flex;
            flex-direction: column;
        }
        .notification-header {
            padding: 28px 28px 0 28px;
        }
        .notification-header h2 {
            color: #F0BD44;
            font-size: 2.2rem;
            font-weight: bold;
            margin: 0 0 12px 0;
            letter-spacing: 1px;
        }
        .notification-list-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 28px;
            margin-top: 12px;
            margin-bottom: 0;
            gap: 10px;
        }
        .markall-as-read {
            color: #fff;
            background: transparent;
            border: none;
            font-size: 1.15rem;
            font-weight: bold;
            cursor: pointer;
            padding: 0;
            margin: 0;
            transition: color 0.2s;
        }
        .markall-as-read:hover {
            color: #F0BD44;
            text-decoration: underline;
        }
        .markall-as-read:disabled {
            opacity: 0.6;
            cursor: default;
        }
        .notification-list {
            background: #23241F;
            border-radius: 16px;
            margin: 18px 24px 0 24px;
            min-height: 500px;
            max-height: 650px;
            padding: 32px 28px 24px 28px;
            box-sizing: border-box;
            box-shadow: 0 4px 24px rgba(0,0,0,0.40);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        .notification-item {
            margin-bottom: 26px;
            cursor: pointer;
            transition: background 0.18s, opacity 0.18s;
            padding: 8px 12px;
            border-radius: 8px;
        }
        .notification-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        /* style lel notification lma teb2a read */
        .notification-item.read .notification-message {
            font-weight: normal;
            opacity: 0.7;
        }
        .notification-message {
            margin: 0 0 5px 0;
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            transition: opacity 0.18s, font-weight 0.18s;
        }
        .notification-time {
            font-size: 1rem;
            color: #B7B7B7;
            margin-left: 2px;
        }
        .notification-footer {
            padding-top: 28px;
            text-align: center;
        }
        .notification-footer a {
            color: #fff;
            text-decoration: none;
            font-size: 1.15rem;
            font-weight: bold;
            transition: color 0.18s;
        }
        .notification-footer a:hover {
            color: #F0BD44;
        }
    </style>
</head>
<body>
    
    <?php echo $gui->getComponentHTML($strippedFileName); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const markAllBtn = document.getElementById('mark-all-read');
            const allReadMsg = document.getElementById('all-read-message');
            // get kol el notification items
            const notificationItems = document.querySelectorAll('.notification-item');

            // lma edos 3ala button mark all as read
            markAllBtn.onclick = function() {
                notificationItems.forEach(function(item) {
                    // remove unread w add read class
                    item.classList.remove('unread');
                    item.classList.add('read');
                });
                // hide el button w show el message "all caught up"
                markAllBtn.style.display = 'none';
                allReadMsg.style.display = 'inline';
            };

            // lma edos 3ala notification wa7da
            notificationItems.forEach(function(item) {
                item.onclick = function() {
                    this.classList.remove('unread');
                    this.classList.add('read');
                    checkAllRead();
                };
            });

            //kol el notifications read 3ashan update UI
            function checkAllRead() {
                const allRead = Array.from(notificationItems).every(item => item.classList.contains('read'));
                if (allRead) {
                    markAllBtn.style.display = 'none';
                    allReadMsg.style.display = 'inline';
                }
            }

            // lma edos 3ala link "View all"
            document.getElementById('view-all').onclick = function(e) {
                e.preventDefault();
                alert('All notifications are shown (demo)');
            };
        });
    </script>
</body>
</html>
