<?php
echo exec("/usr/bin/python3 /var/www/html/ksj/python_modules/upload_db/upload_db.py");
// echo exec("/usr/bin/python3 /var/www/html/ksj/tmp/python_modules/upload_db/upload_db.py");
?>

<script>
    location.replace("../../infocon.php");
</script>