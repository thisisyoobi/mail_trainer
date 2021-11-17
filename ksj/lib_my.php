<?php
$mysqli = new mysqli("localhost", "ksj", "qhdks!321", "WebProject");
if($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);
if(!$mysqli->set_charset('utf8')) die('Error loading character set utf8: '.$mysqli->error);

function mq($sql){
    global $mysqli;
    return $mysqli -> query($sql);
}

function query_rows($qry) {
  global $mysqli;
  $result = $mysqli->query($qry);
  if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
  $rows= array();
  eval('while(@$row = $result->fetch_assoc()) array_push($rows, $row);');
  return $rows;
}

function query_row($qry) {
  $rows = query_rows($qry);
  if(count($rows)<1) return false;
  return $rows[0];
}

function query_values($qry) {
  global $mysqli;
  $result = $mysqli->query($qry);
  if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
  $arr = array();
  while($row = $result->fetch_row()) $arr[] = $row[0];
  return $arr;
}

function query_one($qry) {
  global $mysqli;
  $result = $mysqli->query($qry);
  if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
  $row = $result->fetch_row();
  if(count($row)<1) return false;
  return $row[0];
}

function query($qry) {
  global $mysqli;
  $result = $mysqli->query($qry);
  if($result === false) die("Query: [[ $qry ]] → Error: ".$mysqli->error);
  return $result ;
}

function my_escape($str) {
  global $mysqli;
  return $mysqli->real_escape_string($str);
}

function insert_id() {
  global $mysqli;
  return $mysqli->insert_id;
}
?>