<?php 
function del(){
    echo "no";
    exec("python3 ./csv_all_del.py");
}
del();
?>