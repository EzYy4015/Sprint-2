<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent Kuching - Analytics Overview </title>
<link rel="stylesheet" type="text/css" href="style/style-report.css"/> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>

<?php
  include("include/connection.php");
  include("include/functions.php");
  check_login();

  $month = date('m');
  $ageyear1 = 1998;
  $ageyear2 = 2007;
  // $query = "SELECT count(prodID) FROM acc_purchasehistory WHERE prodPurchaseDate >= '2022-09-01' AND prodPurchaseDate <= '2022-10-01'";
  // $result = mysqli_query($con, $query);
  // $row = mysqli_fetch_array($result);

  for($x = 0; $x < 6; $x++){
    $queryprod = "SELECT count(prodID) FROM acc_purchasehistory WHERE prodPurchaseDate >= '2022-$month-01' AND prodPurchaseDate <= '2022-$month-31'";
    $resultprod = mysqli_query($con, $queryprod);
    $rowprod[$x] = mysqli_fetch_array($resultprod);

    $queryuser = "SELECT count(accID) FROM accounts WHERE accDateRegistered >= '2022-$month-01' AND accDateRegistered <= '2022-$month-31'";
    $resultuser = mysqli_query($con, $queryuser);
    $rowuser[$x] = mysqli_fetch_array($resultuser);

    $month = $month-1;


    // $queryage = "SELECT count(accID) FROM accounts WHERE accAge >= '($ageyear-9)-01-01' AND accAge <= '$ageyear-12-31'";
    if($x == 5){
      $queryage = "SELECT count(accID) FROM accounts WHERE (accAge BETWEEN '1900-01-01' AND '$ageyear2-12-31')";
    } else {
      $queryage = "SELECT count(accID) FROM accounts WHERE (accAge BETWEEN '$ageyear1-01-01' AND '$ageyear2-12-31')";
    }
    $resultage = mysqli_query($con, $queryage);
    $rowage[$x] = mysqli_fetch_array($resultage);
    $ageyear1 = $ageyear1-10;
    $ageyear2 = $ageyear2-10;
  }

  // For current users status chart.
  $queryonlineuser = "SELECT count(accID) FROM accounts WHERE accActive = 1";
  $resultonlineuser = mysqli_query($con, $queryonlineuser);
  $rowonlineuser = mysqli_fetch_array($resultonlineuser);

  $queryofflineuser = "SELECT count(accID) FROM accounts WHERE accActive = 0";
  $resultofflineuser = mysqli_query($con, $queryofflineuser);
  $rowofflineuser = mysqli_fetch_array($resultofflineuser);

  $querytotaluser = "SELECT count(accID) FROM accounts";
  $resulttotaluser = mysqli_query($con, $querytotaluser);
  $rowtotaluser = mysqli_fetch_array($resulttotaluser);
  
  $queryprodppl = "SELECT prodTitle, count(ap.prodID) AS count FROM products p JOIN acc_preference ap ON p.prodID = ap.prodID GROUP BY prodTitle ORDER BY count desc LIMIT 5";
  $resultprodppl = mysqli_query($con, $queryprodppl);





  // Visitor Pattern
  $fulldate = getdate(date("U"));
  $bookingdate = $fulldate['mday'];
  $bookingmonth = $fulldate['mon'];
  $bookingyear = $fulldate['year'];

  if(!isset($_SESSION['mybookdate']))
  {
    $_SESSION['mybookdate'] = $bookingdate;
  }

  if(isset($_POST['prev'])){
    $_SESSION["mybookdate"]--;
  }

  if(isset($_POST['next'])){
    $_SESSION["mybookdate"]++;
  }

  if(isset($_POST['reset'])){
    $_SESSION["mybookdate"] = $fulldate['mday'];
  }

  $bookingdate = $_SESSION["mybookdate"];
  // Check months and how many days in a month.
  $checkdate = 0;

  // dateset1 = for months with 31 days, dateset2 = for months with 30 days.
  $dateset1 = 31;
  $dateset2 = 30;
  if ($bookingdate-10 > 0){
    $bookingdate = $bookingdate-10;
  } 
  else {
    // 0 = 31/ 30  last month, -1 = 30/29, -2 = 29/28 because 10 - 10 = 31 and so on...
    for($x = 0; $x < 30; $x++){
      if ($bookingdate-10 == $checkdate){
        if($bookingmonth == 1 || $bookingmonth == 3 || $bookingmonth == 5 || $bookingmonth == 7 || $bookingmonth == 8 || $bookingmonth == 10 || $bookingmonth == 12){
          $bookingdate = $dateset1;
          $bookingmonth = $bookingmonth-1;
        } else if ($bookingmonth == 4 || $bookingmonth == 6 || $bookingmonth == 5 || $bookingmonth == 9 || $bookingmonth == 11){
          $bookingdate = $dateset2;
          $bookingmonth = $bookingmonth-1;
        }
      } 
      $checkdate = $checkdate-1;
      $dateset1 = $dateset1-1;
      $dateset2 = $dateset2-1;
    }
  };

  for($x = 0; $x < 20; $x++){

    $querygetbookingscom = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$bookingyear-$bookingmonth-$bookingdate' AND ab.bookingCompleted = 1) GROUP BY bookingDate";
    $resultgetbookingscom = mysqli_query($con, $querygetbookingscom);
    $rowgetbookingscom[$x] = mysqli_fetch_array($resultgetbookingscom);
    if (is_null($rowgetbookingscom[$x])){
      $rowgetbookingscom[$x] = [0];
    }

    $querygetbookingscan = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$bookingyear-$bookingmonth-$bookingdate' AND ab.bookingStatus = 2) GROUP BY bookingDate";
    $resultgetbookingscan = mysqli_query($con, $querygetbookingscan);
    $rowgetbookingscan[$x] = mysqli_fetch_array($resultgetbookingscan);
    if (is_null($rowgetbookingscan[$x])){
      $rowgetbookingscan[$x] = [0];
    }

    $querygetbookingsres = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$bookingyear-$bookingmonth-$bookingdate' AND ab.bookingCompleted = 0) GROUP BY bookingDate";
    $resultgetbookingsres = mysqli_query($con, $querygetbookingsres);
    $rowgetbookingsres[$x] = mysqli_fetch_array($resultgetbookingsres);
    if (is_null($rowgetbookingsres[$x])){
      $rowgetbookingsres[$x] = [0];
    }
    $storedate[$x] = $bookingdate;

    $bookingdate = $bookingdate+1;
    if($bookingdate == 32){
      $bookingdate = 1;
      $bookingmonth = $bookingmonth+1;
    }
  };


?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Bar Chart -->

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);



  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Day', 'Bookings Reserved', 'Bookings Completed', 'Bookings Cancelled'],
      ['<?php echo $storedate[0];?>', <?php echo $rowgetbookingsres[0][0];?>, <?php echo $rowgetbookingscom[0][0];?>, <?php echo $rowgetbookingscan[0][0];?>],
      ['<?php echo $storedate[1];?>', <?php echo $rowgetbookingsres[1][0];?>, <?php echo $rowgetbookingscom[1][0];?>, <?php echo $rowgetbookingscan[1][0];?>],
      ['<?php echo $storedate[2];?>', <?php echo $rowgetbookingsres[2][0];?>, <?php echo $rowgetbookingscom[2][0];?>, <?php echo $rowgetbookingscan[2][0];?>],
      ['<?php echo $storedate[3];?>', <?php echo $rowgetbookingsres[3][0];?>, <?php echo $rowgetbookingscom[3][0];?>, <?php echo $rowgetbookingscan[3][0];?>],
      ['<?php echo $storedate[4];?>', <?php echo $rowgetbookingsres[4][0];?>, <?php echo $rowgetbookingscom[4][0];?>, <?php echo $rowgetbookingscan[4][0];?>],
      ['<?php echo $storedate[5];?>', <?php echo $rowgetbookingsres[5][0];?>, <?php echo $rowgetbookingscom[5][0];?>, <?php echo $rowgetbookingscan[5][0];?>],
      ['<?php echo $storedate[6];?>', <?php echo $rowgetbookingsres[6][0];?>, <?php echo $rowgetbookingscom[6][0];?>, <?php echo $rowgetbookingscan[6][0];?>],
      ['<?php echo $storedate[7];?>', <?php echo $rowgetbookingsres[7][0];?>, <?php echo $rowgetbookingscom[7][0];?>, <?php echo $rowgetbookingscan[7][0];?>],
      ['<?php echo $storedate[8];?>', <?php echo $rowgetbookingsres[8][0];?>, <?php echo $rowgetbookingscom[8][0];?>, <?php echo $rowgetbookingscan[8][0];?>],
      ['<?php echo $storedate[9];?>', <?php echo $rowgetbookingsres[9][0];?>, <?php echo $rowgetbookingscom[9][0];?>, <?php echo $rowgetbookingscan[9][0];?>],
      ['<?php echo $storedate[10];?>', <?php echo $rowgetbookingsres[10][0];?>, <?php echo $rowgetbookingscom[10][0];?>, <?php echo $rowgetbookingscan[10][0];?>],
      ['<?php echo $storedate[11];?>', <?php echo $rowgetbookingsres[11][0];?>, <?php echo $rowgetbookingscom[11][0];?>, <?php echo $rowgetbookingscan[11][0];?>],
      ['<?php echo $storedate[12];?>', <?php echo $rowgetbookingsres[12][0];?>, <?php echo $rowgetbookingscom[12][0];?>, <?php echo $rowgetbookingscan[12][0];?>],
      ['<?php echo $storedate[13];?>', <?php echo $rowgetbookingsres[13][0];?>, <?php echo $rowgetbookingscom[13][0];?>, <?php echo $rowgetbookingscan[13][0];?>],
      ['<?php echo $storedate[14];?>', <?php echo $rowgetbookingsres[14][0];?>, <?php echo $rowgetbookingscom[14][0];?>, <?php echo $rowgetbookingscan[14][0];?>],
      ['<?php echo $storedate[15];?>', <?php echo $rowgetbookingsres[15][0];?>, <?php echo $rowgetbookingscom[15][0];?>, <?php echo $rowgetbookingscan[15][0];?>],
      ['<?php echo $storedate[16];?>', <?php echo $rowgetbookingsres[16][0];?>, <?php echo $rowgetbookingscom[16][0];?>, <?php echo $rowgetbookingscan[16][0];?>],
      ['<?php echo $storedate[17];?>', <?php echo $rowgetbookingsres[17][0];?>, <?php echo $rowgetbookingscom[17][0];?>, <?php echo $rowgetbookingscan[17][0];?>],
      ['<?php echo $storedate[18];?>', <?php echo $rowgetbookingsres[18][0];?>, <?php echo $rowgetbookingscom[18][0];?>, <?php echo $rowgetbookingscan[18][0];?>],
      ['<?php echo $storedate[19];?>', <?php echo $rowgetbookingsres[19][0];?>, <?php echo $rowgetbookingscom[19][0];?>, <?php echo $rowgetbookingscan[19][0];?>],
    ]);

    var options = {
      backgroundColor: '#FFEACA',
      title: "Visitor's Pattern",
      legend: { 
        position: 'bottom',
      },
      hAxis: {
        title: "Day",
      },
      vAxis:{
        format: 0,
      },
      
      series: {
        0: { color: 'blue' },
        1: { color: 'green' },
        2: { color: 'red' },
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('visitorpat'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Users'],
      ['May',  <?php echo $rowuser[5][0];?>],
      ['June',  <?php echo $rowuser[4][0];?>],
      ['July',  <?php echo $rowuser[3][0];?>],
      ['August',  <?php echo $rowuser[2][0];?>],
      ['September',  <?php echo $rowuser[1][0];?>],
      ['October',  <?php echo $rowuser[0][0];?>]
    ]);

    var options = {
      hAxis: {  
        titleTextStyle: {color: '#333'},
        textPosition: 'none',
      },
      vAxis: {
        minValue: 0,
        textPosition: 'none',
        format: 0,
        gridlines: {
          color: 'transparent',
        }
      },
      legend: 'none',
    };

    var chart = new google.visualization.AreaChart(document.getElementById('newreg'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Age', 'Users'],
      ['15 - 24', <?php echo $rowage[0][0];?>],
      ['25 - 34', <?php echo $rowage[1][0];?>],
      ['35 - 44', <?php echo $rowage[2][0];?>],
      ['45 - 54', <?php echo $rowage[3][0];?>],
      ['55 - 64', <?php echo $rowage[4][0];?>],
      ['65+', <?php echo $rowage[5][0];?>]
    ]);
                       
    var options = {
      legend: {
        position: 'none',
      },
    };

    var chart = new google.charts.Bar(document.getElementById('userage'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Status', 'Users'],
      ['ONLINE', <?php echo $rowonlineuser[0];?>],
      ['OFFLINE', <?php echo $rowofflineuser[0];?>],
    ]);

    var options = {
      slices:{
        0:{
          color: 'green',
        },
        1:{
          color: 'red',
        },
      },
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('onlineusers'));
    chart.draw(data, options);
  }
</script>


<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Product Name', 'Users'],
      <?php
      while($rowprodppl = mysqli_fetch_array($resultprodppl)){
        echo "['".$rowprodppl['prodTitle']."', ".$rowprodppl['count']."],";
      }
      ?>
    ]);

    var options = {
      legend: {
        position: 'none',
      },
      bars: 'horizontal',
    };

    var chart = new google.charts.Bar(document.getElementById('favprod'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>


<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Users'],
        ['May',  <?php echo $rowprod[5][0];?>],
        ['June',  <?php echo $rowprod[4][0];?>],
        ['July',  <?php echo $rowprod[3][0];?>],
        ['August',  <?php echo $rowprod[2][0];?>],
        ['September',  <?php echo $rowprod[1][0];?>],
        ['October',  <?php echo $rowprod[0][0];?>]
      ]);

      var options = {
        hAxis: {  
          titleTextStyle: {color: '#333'},
          textPosition: 'none',
        },
        vAxis: {
          minValue: 0,
          textPosition: 'none',
          gridlines: {
            color: 'transparent',
          }
        },
        legend: 'none',
      };

      var chart = new google.visualization.AreaChart(document.getElementById('prodsold'));
      chart.draw(data, options);
    }
</script>

</head>
<body>

<!-- Navigation Bar -->
<?php include("include/navigation.php"); ?>

  <div class="mainbody">
      <div class="top-home-button">
            <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      </div>

      <div class="texts1">
        <h1><?php echo "Monthly Overview (".$fulldate['month'].")";?></h1>
      </div>

      <div class="patbut">
        <form method="post">
          <input class="but3" type="submit" name="prev" value="<<">
          <input class="but2" type="submit" name="reset" value="Reset">
          <input class="but1" type="submit" name="next" value=">>">
        </form>
      </div>

      <div id="visitorpat" style="width: 70%; height: 600px; margin: 0 auto;"></div>

      <div class="more-detailed-graph-button">
        <a href="report-visitors.php">More Detailed View (Visitors Pattern) <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
      </div>


      <div class="statstype">
        <h1>Users</h1>
      </div>

      <div class="cardcontainer">
        <div class="row">
          <div class="column">
            <div class="cards">
              <div class="stitle">
                <h1>New Registered Users</h1>
              </div>
              <div class="actualv">
                <p> <?php echo $rowuser[0][0];?></p>
              </div>
              <div class="sdesc">
                <p>
                  October&nbsp;
                  <i>
                  <?php
                    $usergrate = floatval((($rowuser[0][0]-$rowuser[1][0])/$rowuser[1][0])*100);
                    if($usergrate < 0){
                      echo "<p class=red> <img src='images/down.png'> ".(round($usergrate, 2)). "%</p>";
                    }
                    else if ($usergrate > 0){
                      echo "<p class=grass> <img src='images/up.png'> ".(round($usergrate, 2))."%</p>";
                    }
                    else {
                      echo (round($usergrate, 2));
                    }
                  ?>
                  </i>
                </p>
              </div>
              <div id="newreg" style="width: 100%; height: 200px;"></div>
              <div class="stitle1">
                <h1>All-time Registered Users</h1>
              </div>
              <div class="actualv">
                <p>
                  <?php 
                    $querycard1 = "SELECT count(accID) FROM accounts";
                    $resultcard1 = mysqli_query($con, $querycard1);
                    $rowcard1 = mysqli_fetch_array($resultcard1);

                    echo $rowcard1[0];
                  ?>
                </p>
              </div>
            </div>
          </div>




          <div class="column">
            <div class="cards">
              <div class="stitle2">
                <h1>Users Age Overview</h1>
              </div>
              
              <div id="userage" style="width: 400px; height: 200px; margin: 0 auto;"></div>

              <div class="stitle3">
                <h1>Current Users Status</h1>
              </div>
              <div id="onlineusers" style="width: 400px; height: 200px; margin: 0 auto;"></div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="statstype">
        <h1>Products</h1>
      </div>

      <div class="cardcontainer">
        <div class="row">
        <div class="column">
            <div class="cards">
              <div class="stitle4">
                <h1>Top 5 Favorite Products</h1>
              </div>
              
              <div id="favprod" style="width: 400px; height: 200px; margin: 0 auto;"></div>
              
              
            </div>
          </div>

          <div class="column">
            <div class="cards">
              <div class="stitle">
                <h1>Products Sold</h1>
              </div>
              <div class="actualv">
                <p> <?php echo $rowprod[0][0];?></p>
              </div>
              <div class="sdesc">
                <p>
                  October&nbsp;
                  <i>
                  <?php
                    $prodsrate = floatval((($rowprod[0][0]-$rowprod[1][0])/$rowprod[1][0])*100);
                    if($prodsrate < 0){
                      echo "<p class=red> <img src='images/down.png'> ".(round($prodsrate, 2)). "%</p>";
                    }
                    else if ($usergrate > 0){
                      echo "<p class=grass> <img src='images/up.png'> ".(round($prodsrate, 2))."%</p>";
                    }
                    else {
                      echo "<p>".(round($prodsrate, 2))."%</p>";
                    }
                  ?>
                  </i>
                </p>
              </div>
              <div id="prodsold" style="width: 100%; height: 200px;"></div>
              <div class="stitle1">
                <h1>All-time Products Sold</h1>
              </div>
              <div class="actualv">
                <p>
                  <?php 
                    $querycard4 = "SELECT count(prodID) FROM acc_products";
                    $resultcard4 = mysqli_query($con, $querycard4);
                    $rowcard4 = mysqli_fetch_array($resultcard4);

                    echo $rowcard4[0];
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php include("include/footer.php"); ?>
  </div>

</body>
</html>