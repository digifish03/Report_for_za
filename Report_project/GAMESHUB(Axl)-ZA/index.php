<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("Connection.php"); ?>
  <title>GAMESHUB(Axl) REPORT FOR ZA PROMOTIONS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#submitBtn").click(function() {
        $("#loader").append('<div class="spinner-border text-primary"></div>');
        var from = $("#from").val();
        var to = $("#to").val();
        $.ajax({
          type: 'POST',
          url: 'report.php',
          data: {
            from: from,
            to: to
          },
          dataType: 'text',


          success: function(data) {
            $('#loader').hide();
            $('#table_xy').html(data);

          },
          // error: function(){
          //                       alert('failure');
          //                 }
        });
      });
    });
  </script>
</head>
<style>
  /* .body {
    /*background: #00FFFF
  } */
</style>

<body>
  <div class="container">
    <h2>GAMESHUB(Axl) REPORT FOR ZA</h2>
    <!-- <p>Promotions Details of EPICON REPORT FOR ZA.</p> -->
    <br>

    <form class="form-inline" action="index.php">
      <label style="font-size: 20px;" for="from">From: </label>
      <input style="margin-right: 15px;" type="date" class="form-control" id="from" placeholder="Enter from" name="from">
      <label style="font-size: 20px;" for="to">To: </label>
      <input style="margin-left: 20px; " type="date" class="form-control" id="to" placeholder="Enter to" name="to">
      <br><br>
      <button style="margin-left: 25px;" type="button" class="btn btn-primary" id="submitBtn">Submit</button>

      <div style="margin-top:15%" id="loader">
      </div>
    </form>
  </div>

  <br><br>
  <!-- <div class="getter">
</div> -->
  <div id="table_xy">
  </div>
</body>

</html>