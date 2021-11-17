<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Employees</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
      table {
        width: 100%;
      }
      th, td {
        padding: 10px;
        border-bottom: 1px solid #dadada;
      }
    </style>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>no</th>
          <th>name</th>
          <th>email</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $jb_conn = mysqli_connect( 'localhost', 'ksj', 'qhdks!321', 'WebProject' );
          $jb_sql = "SELECT * FROM import_company LIMIT 5;";
          $jb_result = mysqli_query( $jb_conn, $jb_sql );
          while( $jb_row = mysqli_fetch_array( $jb_result ) ) {
            echo '<tr><td>' . $jb_row[ 'no' ] . '</td><td>'. $jb_row[ 'name' ] . '</td><td>' . $jb_row[ 'email' ] . '</td></tr>';
          }
        ?>
      </tbody>
    </table>
  </body>
</html>