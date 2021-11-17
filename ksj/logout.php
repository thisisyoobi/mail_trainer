

<?php
	session_start();
        $result = session_destroy();
 
        if($result) {
?>
        <script>
                alert("Successfully signed out.");
		location.replace("./");
        </script>
<?php   }
?>


