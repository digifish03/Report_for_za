<head>
  <title>GAMESHUB(Axl) REPORT FOR ZA PROMOTIONS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<style>
  /*body{
background: #/*00FFFF;
}
*/
</style>
<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=download.xls');
include("Connection.php");
$from = $_POST['from'];
$to = $_POST['to'];
?>

<br>

<?php
//DATE WISE SUBSCRIBER COUNT 
$sql3 = "SELECT DATE(date_za) as date,count(distinct msisdn) as msisdn from gameshubStatusAxl where DATE(date_za) between '$from' and '$to' and status='ACTIVE' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="container">
  <h3>DATE WISE SUBSCRIBER COUNT </h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>DATE</th>
        <th>SUBSCRIBER</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row3 = $result3->fetch_array()) { ?>
        <tr>
          <td><?php echo $row3['date']; ?></td>
          <td><?php echo $row3['msisdn']; ?></td>
        </tr>
    </tbody>
  <?php
      } ?>
  </table>
</div>
<br>
<?php

//DATE WISE RENEWAL COUNT
$sql3 = "SELECT DATE(date_za) as date,count(distinct user_msisdn) as msisdn from gameshubBillingAxl where DATE(date_za) between '$from' and '$to' and status='SUCCESS' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="container">
  <h3>DATE WISE RENEWAL COUNT</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>DATE</th>
        <th>RENEW</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row3 = $result3->fetch_array()) { ?>
        <tr>
          <td><?php echo $row3['date']; ?></td>
          <td><?php echo $row3['msisdn']; ?></td>
        </tr>

    </tbody>
  <?php
      } ?>
  </table>
</div>

<br>
<?php
//DATE WISE REVENUE COUNT(RENEWAL + DAILY BILLING)
$sql3 = "SELECT DATE(date_za) as date,sum(amount) as rev  from gameshubBillingAxl where DATE(date_za) between '$from' and '$to' and status='SUCCESS' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="container">
  <h3>DATE WISE REVENUE COUNT(RENEWAL + DAILY BILLING)</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>DATE</th>
        <th>REVENUE</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row3 = $result3->fetch_array()) { ?>
        <tr>
          <td><?php echo $row3['date']; ?></td>
          <td><?php echo $row3['rev']; ?></td>
        </tr>

    </tbody>
  <?php
      } ?>
  </table>
</div>
<br>
<?php
//DATE WISE UNSUB COUNT 

$sql3 = "SELECT DATE(date_za) as date,count(status_name)  as unsub_msisdn from gameshubStatusAxl where DATE(date_za) between '$from' and '$to' and status='SUSPENDED' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="container">
  <H3> DATE WISE UNSUB COUNT </H3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>DATE</th>
        <th>UNSUB</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row3 = $result3->fetch_array()) { ?>
        <tr>
          <td><?php echo $row3['date']; ?></td>
          <td><?php echo $row3['unsub_msisdn']; ?></td>
        </tr>

    </tbody>
  <?php
      } ?>
  </table>
</div>