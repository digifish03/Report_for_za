<head>
  <title>BEYONDHEALTH REPORT FOR ZA PROMOTIONS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<style>
body{
/*background: #/*00FFFF*/;*/
}
.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 25%;
  padding: 5px;
}
</style>
<?php
include("Connection.php");
$from=$_POST['from'];
$to=$_POST['to'];
?>

<!---FOR DOWNLOAD----------->

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
          <!---FOR FORM CENTER----------->
          <form method="post" action="report_download.php" >
            <!-- <p><b>FROM</b></p> -->
            <input type="hidden" name="from" value="<?php echo $from;?>" readonly/>
            <!-- <p><b>TO</b></p> -->
            <input type="hidden" name="to" value="<?php echo $to;?>" readonly/>
            <input type="submit" name="export" class="btn btn-success" value="Downlaod Detailed Report" />
          </form>
        </div>
    </div>      
</div>
<!--FORM CENTER CLOSE---->

<br><br>
<?php

//DATE WISE SUBSCRIBER COUNT 

$sql3="SELECT DATE(date_za) as date,count(distinct msisdn) as msisdn from bl_xcis_mtn_za_status_changed where DATE(date_za) between '$from' and '$to' and status='ACTIVE' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="container">
<div class="row" >
<div class="column" >
 <p> <strong>DATE WISE SUBSCRIBER COUNT</strong> </p> 
<table class="table table-striped">
    <thead>
    <tr>
  <th>DATE</th>
  <th>SUBSCRIBER</th>
    </tr>
    </thead> 
    <tbody>
<?php
while($row3=$result3->fetch_array())
{ ?>
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

$sql3="SELECT DATE(date_za) as date,count(distinct msisdn) as msisdn from bl_xcis_mtn_za_billing where DATE(date_za) between '$from' and '$to' and status='SUCCESS' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="column" >
<p><strong>DATE WISE RENEWAL COUNT</strong></p> 
<table class="table table-striped">
    <thead>
    <tr>
  <th>DATE</th>
  <th>RENEW</th>
    </tr>
    </thead>
   <tbody>
<?php
while($row3=$result3->fetch_array())
{ ?>
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
$sql3="SELECT DATE(date_za) as date,sum(billedAmount) as rev from bl_xcis_mtn_za_billing where DATE(date_za) between '$from' and '$to' and status='SUCCESS' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="column" >
<p><strong>RENEWAL DAILY BILLING</strong></p>
<table class="table table-striped">
    <thead>
    <tr>
  <th>DATE</th>
  <th>REVENUE</th>
    </tr>
    </thead>
   <tbody>
<?php
while($row3=$result3->fetch_array())
{ ?>
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
$sql3="SELECT DATE(date_za) as date,count(distinct msisdn) as unsub_msisdn from bl_xcis_mtn_za_status_changed where DATE(date_za) between '$from' and '$to' and status='SUSPENDED' group by DATE(date_za)";
$result3 = $mysqli->query($sql3);
?>
<div class="column" >
<p><strong>DATE WISE UNSUB COUNT</strong> </p> 
<table class="table table-striped">
    <thead>
    <tr>
  <th>DATE</th>
  <th>UNSUB</th>
    </tr>
    </thead>
   <tbody>
<?php
while($row3=$result3->fetch_array())
{ ?>
    <tr>
    <td><?php echo $row3['date']; ?></td>
    <td><?php echo $row3['unsub_msisdn']; ?></td>
    </tr>
    
   </tbody>
<?php
} ?>
</table>
</div>
</div>
</div>