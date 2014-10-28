<html>
<?php
include_once 'config.php';
include_once 'json-store-objects.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/items-grid.css">
</head>
<body>
<?php
    include_once 'item.php';
    item::display_grid($GLOBALS['items_array']);
?>
</body>
</html>