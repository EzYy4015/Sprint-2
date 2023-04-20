<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Visitors Pattern </title>
<link rel="stylesheet" type="text/css" href="style/style-report.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>

<?php 
include("include/connection.php");
include("include/functions.php");
check_login();

$fulldate = getdate(date("U"));
$date = 1;
$month = $fulldate['mon'];
$year = $fulldate['year'];

if(isset($_GET['sort-month'])){
    if($_GET['sort-month'] == "Jan"){
        $month = 1;
    } 
    else if ($_GET['sort-month'] == "Feb"){
        $month = 2;
    }
    else if ($_GET['sort-month'] == "Mar"){
        $month = 3;
    }
    else if ($_GET['sort-month'] == "Apr"){
        $month = 4;
    }
    else if ($_GET['sort-month'] == "May"){
        $month = 5;
    }
    else if ($_GET['sort-month'] == "Jun"){
        $month = 6;
    }
    else if ($_GET['sort-month'] == "Jul"){
        $month = 7;
    }
    else if ($_GET['sort-month'] == "Aug"){
        $month = 8;
    }
    else if ($_GET['sort-month'] == "Sep"){
        $month = 9;
    }
    else if ($_GET['sort-month'] == "Oct"){
        $month = 10;
    }
    else if ($_GET['sort-month'] == "Nov"){
        $month = 11;
    }
    else if ($_GET['sort-month'] == "Dec"){
        $month = 12;
    }
} 

for($x = 0; $x < 31; $x++){

    $querygetbookingscom = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$month-$date' AND ab.bookingCompleted = 1) GROUP BY bookingDate";
    $resultgetbookingscom = mysqli_query($con, $querygetbookingscom);
    $rowgetbookingscom[$x] = mysqli_fetch_array($resultgetbookingscom);
    if (is_null($rowgetbookingscom[$x])){
      $rowgetbookingscom[$x] = [0];
    }

    $querygetbookingscan = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$month-$date' AND ab.bookingStatus = 2) GROUP BY bookingDate";
    $resultgetbookingscan = mysqli_query($con, $querygetbookingscan);
    $rowgetbookingscan[$x] = mysqli_fetch_array($resultgetbookingscan);
    if (is_null($rowgetbookingscan[$x])){
      $rowgetbookingscan[$x] = [0];
    }

    $querygetbookingsres = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$month-$date' AND ab.bookingCompleted = 0) GROUP BY bookingDate";
    $resultgetbookingsres = mysqli_query($con, $querygetbookingsres);
    $rowgetbookingsres[$x] = mysqli_fetch_array($resultgetbookingsres);
    if (is_null($rowgetbookingsres[$x])){
      $rowgetbookingsres[$x] = [0];
    }
    $storedate[$x] = $date;
    $date = $date+1;
}



$comparemonth1 = $month;
$comparemonth2 = $month;

if(isset($_GET['sort-month-compare1'])){
    if($_GET['sort-month-compare1'] == "Jan"){
        $comparemonth1 = 1;
    } 
    else if ($_GET['sort-month-compare1'] == "Feb"){
        $comparemonth1 = 2;
    }
    else if ($_GET['sort-month-compare1'] == "Mar"){
        $comparemonth1 = 3;
    }
    else if ($_GET['sort-month-compare1'] == "Apr"){
        $comparemonth1 = 4;
    }
    else if ($_GET['sort-month-compare1'] == "May"){
        $comparemonth1 = 5;
    }
    else if ($_GET['sort-month-compare1'] == "Jun"){
        $comparemonth1 = 6;
    }
    else if ($_GET['sort-month-compare1'] == "Jul"){
        $comparemonth1 = 7;
    }
    else if ($_GET['sort-month-compare1'] == "Aug"){
        $comparemonth1 = 8;
    }
    else if ($_GET['sort-month-compare1'] == "Sep"){
        $comparemonth1 = 9;
    }
    else if ($_GET['sort-month-compare1'] == "Oct"){
        $comparemonth1 = 10;
    }
    else if ($_GET['sort-month-compare1'] == "Nov"){
        $comparemonth1 = 11;
    }
    else if ($_GET['sort-month-compare1'] == "Dec"){
        $comparemonth1 = 12;
    }
}

if(isset($_GET['sort-month-compare2'])){
    if($_GET['sort-month-compare2'] == "Jan"){
        $comparemonth2 = 1;
    } 
    else if ($_GET['sort-month-compare2'] == "Feb"){
        $comparemonth2 = 2;
    }
    else if ($_GET['sort-month-compare2'] == "Mar"){
        $comparemonth2 = 3;
    }
    else if ($_GET['sort-month-compare2'] == "Apr"){
        $comparemonth2 = 4;
    }
    else if ($_GET['sort-month-compare2'] == "May"){
        $comparemonth2 = 5;
    }
    else if ($_GET['sort-month-compare2'] == "Jun"){
        $comparemonth2 = 6;
    }
    else if ($_GET['sort-month-compare2'] == "Jul"){
        $comparemonth2 = 7;
    }
    else if ($_GET['sort-month-compare2'] == "Aug"){
        $comparemonth2 = 8;
    }
    else if ($_GET['sort-month-compare2'] == "Sep"){
        $comparemonth2 = 9;
    }
    else if ($_GET['sort-month-compare2'] == "Oct"){
        $comparemonth2 = 10;
    }
    else if ($_GET['sort-month-compare2'] == "Nov"){
        $comparemonth2 = 11;
    }
    else if ($_GET['sort-month-compare1'] == "Dec"){
        $comparemonth2 = 12;
    }
}


$cdate = 1;

for($x = 0; $x < 31; $x++){

    // Get completed data for month 1
    $query_completed_month1 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$comparemonth1-$cdate' AND ab.bookingCompleted = 1) GROUP BY bookingDate";
    $result_completed_month1 = mysqli_query($con, $query_completed_month1);
    $row_completed_month1[$x] = mysqli_fetch_array($result_completed_month1);
    if (is_null($row_completed_month1[$x])){
      $row_completed_month1[$x] = [0];
    }

    // Get completed data for month 2
    $query_completed_month2 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$comparemonth2-$cdate' AND ab.bookingCompleted = 1) GROUP BY bookingDate";
    $result_completed_month2 = mysqli_query($con, $query_completed_month2);
    $row_completed_month2[$x] = mysqli_fetch_array($result_completed_month2);
    if (is_null($row_completed_month2[$x])){
      $row_completed_month2[$x] = [0];
    }

    // Get cancelled data for month 1
    $query_cancelled_month1 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$comparemonth1-$cdate' AND ab.bookingStatus = 2) GROUP BY bookingDate";
    $result_cancelled_month1 = mysqli_query($con, $query_cancelled_month1);
    $row_cancelled_month1[$x] = mysqli_fetch_array($result_cancelled_month1);
    if (is_null($row_cancelled_month1[$x])){
      $row_cancelled_month1[$x] = [0];
    }

    // Get cancelled data for month 2
    $query_cancelled_month2 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$comparemonth2-$cdate' AND ab.bookingStatus = 2) GROUP BY bookingDate";
    $result_cancelled_month2 = mysqli_query($con, $query_cancelled_month2);
    $row_cancelled_month2[$x] = mysqli_fetch_array($result_cancelled_month2);
    if (is_null($row_cancelled_month2[$x])){
      $row_cancelled_month2[$x] = [0];
    }

    // Get reserved data for month 1
    $query_reserved_month1 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$comparemonth1-$cdate' AND ab.bookingCompleted = 0) GROUP BY bookingDate";
    $result_reserved_month1 = mysqli_query($con, $query_reserved_month1);
    $row_reserved_month1[$x] = mysqli_fetch_array($result_reserved_month1);
    if (is_null($row_reserved_month1[$x])){
      $row_reserved_month1[$x] = [0];
    }

    // Get reserved data for month 2
    $query_reserved_month2 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate = '$year-$comparemonth2-$cdate' AND ab.bookingCompleted = 0) GROUP BY bookingDate";
    $result_reserved_month2 = mysqli_query($con, $query_reserved_month2);
    $row_reserved_month2[$x] = mysqli_fetch_array($result_reserved_month2);
    if (is_null($row_reserved_month2[$x])){
      $row_reserved_month2[$x] = [0];
    }

    $cdate = $cdate+1;
}







// Analysis for comparison
// Get count for bookings completed month 1
$query_analysis_completed_month1 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate BETWEEN '$year-$comparemonth1-01' AND '$year-$comparemonth1-31' AND ab.bookingCompleted = 1)";
$result_analysis_completed_month1 = mysqli_query($con, $query_analysis_completed_month1);
$row_analysis_completed_month1 = mysqli_fetch_array($result_analysis_completed_month1);
if (is_null($row_analysis_completed_month1)){
    $row_analysis_completed_month1 = [0];
}

// Get count for bookings completed month 2
$query_analysis_completed_month2 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate BETWEEN '$year-$comparemonth2-01' AND '$year-$comparemonth2-31' AND ab.bookingCompleted = 1)";
$result_analysis_completed_month2 = mysqli_query($con, $query_analysis_completed_month2);
$row_analysis_completed_month2 = mysqli_fetch_array($result_analysis_completed_month2);
if (is_null($row_analysis_completed_month2)){
    $row_analysis_completed_month2 = [0];
}

// Get count for bookings reserved month 1
$query_analysis_reserved_month1 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate BETWEEN '$year-$comparemonth1-01' AND '$year-$comparemonth1-31' AND ab.bookingCompleted = 0)";
$result_analysis_reserved_month1 = mysqli_query($con, $query_analysis_reserved_month1);
$row_analysis_reserved_month1 = mysqli_fetch_array($result_analysis_reserved_month1);
if (is_null($row_analysis_reserved_month1)){
    $row_analysis_reserved_month1 = [0];
}

// Get count for bookings reserved month 2
$query_analysis_reserved_month2 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate BETWEEN '$year-$comparemonth2-01' AND '$year-$comparemonth2-31' AND ab.bookingCompleted = 0)";
$result_analysis_reserved_month2 = mysqli_query($con, $query_analysis_reserved_month2);
$row_analysis_reserved_month2 = mysqli_fetch_array($result_analysis_reserved_month2);
if (is_null($row_analysis_reserved_month2)){
    $row_analysis_reserved_month2 = [0];
}

// Get count for bookings cancelled month 1
$query_analysis_cancelled_month1 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate BETWEEN '$year-$comparemonth1-01' AND '$year-$comparemonth1-31' AND ab.bookingStatus = 2)";
$result_analysis_cancelled_month1 = mysqli_query($con, $query_analysis_cancelled_month1);
$row_analysis_cancelled_month1 = mysqli_fetch_array($result_analysis_cancelled_month1);
if (is_null($row_analysis_cancelled_month1)){
    $row_analysis_cancelled_month1 = [0];
}

// Get count for bookings cancelled month 1
$query_analysis_cancelled_month2 = "SELECT count(ab.bookingID) AS count FROM bookings b JOIN acc_bookings ab ON b.bookingID = ab.bookingID WHERE (b.bookingDate BETWEEN '$year-$comparemonth2-01' AND '$year-$comparemonth2-31' AND ab.bookingStatus = 2)";
$result_analysis_cancelled_month2 = mysqli_query($con, $query_analysis_cancelled_month2);
$row_analysis_cancelled_month2 = mysqli_fetch_array($result_analysis_cancelled_month2);
if (is_null($row_analysis_cancelled_month2)){
    $row_analysis_cancelled_month2 = [0];
}








if($row_analysis_completed_month2[0] == 0){
    $analyse_completed = $row_analysis_completed_month1[0];
} else {
    $analyse_completed = floatval((($row_analysis_completed_month1[0]-$row_analysis_completed_month2[0])/$row_analysis_completed_month2[0])*100);
}

if($row_analysis_cancelled_month2[0] == 0){
    $analyse_cancelled = $row_analysis_cancelled_month1[0];
} else {
    $analyse_cancelled = floatval((($row_analysis_cancelled_month1[0]-$row_analysis_cancelled_month2[0])/$row_analysis_cancelled_month2[0])*100);
}

if($row_analysis_reserved_month2[0] == 0){
    $analyse_reserved = $row_analysis_reserved_month1[0];
} else {
    $analyse_reserved = floatval((($row_analysis_reserved_month1[0]-$row_analysis_reserved_month2[0])/$row_analysis_reserved_month2[0])*100);
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
      ['<?php echo $storedate[20];?>', <?php echo $rowgetbookingsres[20][0];?>, <?php echo $rowgetbookingscom[20][0];?>, <?php echo $rowgetbookingscan[20][0];?>],
      ['<?php echo $storedate[21];?>', <?php echo $rowgetbookingsres[21][0];?>, <?php echo $rowgetbookingscom[21][0];?>, <?php echo $rowgetbookingscan[21][0];?>],
      ['<?php echo $storedate[22];?>', <?php echo $rowgetbookingsres[22][0];?>, <?php echo $rowgetbookingscom[22][0];?>, <?php echo $rowgetbookingscan[22][0];?>],
      ['<?php echo $storedate[23];?>', <?php echo $rowgetbookingsres[23][0];?>, <?php echo $rowgetbookingscom[23][0];?>, <?php echo $rowgetbookingscan[23][0];?>],
      ['<?php echo $storedate[24];?>', <?php echo $rowgetbookingsres[24][0];?>, <?php echo $rowgetbookingscom[24][0];?>, <?php echo $rowgetbookingscan[24][0];?>],
      ['<?php echo $storedate[25];?>', <?php echo $rowgetbookingsres[25][0];?>, <?php echo $rowgetbookingscom[25][0];?>, <?php echo $rowgetbookingscan[25][0];?>],
      ['<?php echo $storedate[26];?>', <?php echo $rowgetbookingsres[26][0];?>, <?php echo $rowgetbookingscom[26][0];?>, <?php echo $rowgetbookingscan[26][0];?>],
      ['<?php echo $storedate[27];?>', <?php echo $rowgetbookingsres[27][0];?>, <?php echo $rowgetbookingscom[27][0];?>, <?php echo $rowgetbookingscan[27][0];?>],
      ['<?php echo $storedate[28];?>', <?php echo $rowgetbookingsres[28][0];?>, <?php echo $rowgetbookingscom[28][0];?>, <?php echo $rowgetbookingscan[28][0];?>],
      ['<?php echo $storedate[29];?>', <?php echo $rowgetbookingsres[29][0];?>, <?php echo $rowgetbookingscom[29][0];?>, <?php echo $rowgetbookingscan[29][0];?>],
      ['<?php echo $storedate[30];?>', <?php echo $rowgetbookingsres[30][0];?>, <?php echo $rowgetbookingscom[30][0];?>, <?php echo $rowgetbookingscan[30][0];?>],
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
      
      series: {
        0: { color: 'blue' },
        1: { color: 'green' },
        2: { color: 'red' },
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('month-visitor'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Day', '<?php echo $_GET['sort-month-compare1']; ?>', '<?php echo $_GET['sort-month-compare2']; ?>'],
        ['<?php echo $storedate[0];?>', <?php echo $row_completed_month1[0][0];?>, <?php echo $row_completed_month2[0][0];?>],
        ['<?php echo $storedate[1];?>', <?php echo $row_completed_month1[1][0];?>, <?php echo $row_completed_month2[1][0];?>],
        ['<?php echo $storedate[2];?>', <?php echo $row_completed_month1[2][0];?>, <?php echo $row_completed_month2[2][0];?>],
        ['<?php echo $storedate[3];?>', <?php echo $row_completed_month1[3][0];?>, <?php echo $row_completed_month2[3][0];?>],
        ['<?php echo $storedate[4];?>', <?php echo $row_completed_month1[4][0];?>, <?php echo $row_completed_month2[4][0];?>],
        ['<?php echo $storedate[5];?>', <?php echo $row_completed_month1[5][0];?>, <?php echo $row_completed_month2[5][0];?>],
        ['<?php echo $storedate[6];?>', <?php echo $row_completed_month1[6][0];?>, <?php echo $row_completed_month2[6][0];?>],
        ['<?php echo $storedate[7];?>', <?php echo $row_completed_month1[7][0];?>, <?php echo $row_completed_month2[7][0];?>],
        ['<?php echo $storedate[8];?>', <?php echo $row_completed_month1[8][0];?>, <?php echo $row_completed_month2[8][0];?>],
        ['<?php echo $storedate[9];?>', <?php echo $row_completed_month1[9][0];?>, <?php echo $row_completed_month2[9][0];?>],
        ['<?php echo $storedate[10];?>', <?php echo $row_completed_month1[10][0];?>, <?php echo $row_completed_month2[10][0];?>],
        ['<?php echo $storedate[11];?>', <?php echo $row_completed_month1[11][0];?>, <?php echo $row_completed_month2[11][0];?>],
        ['<?php echo $storedate[12];?>', <?php echo $row_completed_month1[12][0];?>, <?php echo $row_completed_month2[12][0];?>],
        ['<?php echo $storedate[13];?>', <?php echo $row_completed_month1[13][0];?>, <?php echo $row_completed_month2[13][0];?>],
        ['<?php echo $storedate[14];?>', <?php echo $row_completed_month1[14][0];?>, <?php echo $row_completed_month2[14][0];?>],
        ['<?php echo $storedate[15];?>', <?php echo $row_completed_month1[15][0];?>, <?php echo $row_completed_month2[15][0];?>],
        ['<?php echo $storedate[16];?>', <?php echo $row_completed_month1[16][0];?>, <?php echo $row_completed_month2[16][0];?>],
        ['<?php echo $storedate[17];?>', <?php echo $row_completed_month1[17][0];?>, <?php echo $row_completed_month2[17][0];?>],
        ['<?php echo $storedate[18];?>', <?php echo $row_completed_month1[18][0];?>, <?php echo $row_completed_month2[18][0];?>],
        ['<?php echo $storedate[19];?>', <?php echo $row_completed_month1[19][0];?>, <?php echo $row_completed_month2[19][0];?>],
        ['<?php echo $storedate[20];?>', <?php echo $row_completed_month1[20][0];?>, <?php echo $row_completed_month2[20][0];?>],
        ['<?php echo $storedate[21];?>', <?php echo $row_completed_month1[21][0];?>, <?php echo $row_completed_month2[21][0];?>],
        ['<?php echo $storedate[22];?>', <?php echo $row_completed_month1[22][0];?>, <?php echo $row_completed_month2[22][0];?>],
        ['<?php echo $storedate[23];?>', <?php echo $row_completed_month1[23][0];?>, <?php echo $row_completed_month2[23][0];?>],
        ['<?php echo $storedate[24];?>', <?php echo $row_completed_month1[24][0];?>, <?php echo $row_completed_month2[24][0];?>],
        ['<?php echo $storedate[25];?>', <?php echo $row_completed_month1[25][0];?>, <?php echo $row_completed_month2[25][0];?>],
        ['<?php echo $storedate[26];?>', <?php echo $row_completed_month1[26][0];?>, <?php echo $row_completed_month2[26][0];?>],
        ['<?php echo $storedate[27];?>', <?php echo $row_completed_month1[27][0];?>, <?php echo $row_completed_month2[27][0];?>],
        ['<?php echo $storedate[28];?>', <?php echo $row_completed_month1[28][0];?>, <?php echo $row_completed_month2[28][0];?>],
        ['<?php echo $storedate[29];?>', <?php echo $row_completed_month1[29][0];?>, <?php echo $row_completed_month2[29][0];?>],
        ['<?php echo $storedate[30];?>', <?php echo $row_completed_month1[30][0];?>, <?php echo $row_completed_month2[30][0];?>],
    ]);

    var options = {
        chart: {
            title: 'Bookings Completed',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('month-compare-completed'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Day', '<?php echo $_GET['sort-month-compare1']; ?>', '<?php echo $_GET['sort-month-compare2']; ?>'],
        ['<?php echo $storedate[0];?>', <?php echo $row_reserved_month1[0][0];?>, <?php echo $row_reserved_month2[0][0];?>],
        ['<?php echo $storedate[1];?>', <?php echo $row_reserved_month1[1][0];?>, <?php echo $row_reserved_month2[1][0];?>],
        ['<?php echo $storedate[2];?>', <?php echo $row_reserved_month1[2][0];?>, <?php echo $row_reserved_month2[2][0];?>],
        ['<?php echo $storedate[3];?>', <?php echo $row_reserved_month1[3][0];?>, <?php echo $row_reserved_month2[3][0];?>],
        ['<?php echo $storedate[4];?>', <?php echo $row_reserved_month1[4][0];?>, <?php echo $row_reserved_month2[4][0];?>],
        ['<?php echo $storedate[5];?>', <?php echo $row_reserved_month1[5][0];?>, <?php echo $row_reserved_month2[5][0];?>],
        ['<?php echo $storedate[6];?>', <?php echo $row_reserved_month1[6][0];?>, <?php echo $row_reserved_month2[6][0];?>],
        ['<?php echo $storedate[7];?>', <?php echo $row_reserved_month1[7][0];?>, <?php echo $row_reserved_month2[7][0];?>],
        ['<?php echo $storedate[8];?>', <?php echo $row_reserved_month1[8][0];?>, <?php echo $row_reserved_month2[8][0];?>],
        ['<?php echo $storedate[9];?>', <?php echo $row_reserved_month1[9][0];?>, <?php echo $row_reserved_month2[9][0];?>],
        ['<?php echo $storedate[10];?>', <?php echo $row_reserved_month1[10][0];?>, <?php echo $row_reserved_month2[10][0];?>],
        ['<?php echo $storedate[11];?>', <?php echo $row_reserved_month1[11][0];?>, <?php echo $row_reserved_month2[11][0];?>],
        ['<?php echo $storedate[12];?>', <?php echo $row_reserved_month1[12][0];?>, <?php echo $row_reserved_month2[12][0];?>],
        ['<?php echo $storedate[13];?>', <?php echo $row_reserved_month1[13][0];?>, <?php echo $row_reserved_month2[13][0];?>],
        ['<?php echo $storedate[14];?>', <?php echo $row_reserved_month1[14][0];?>, <?php echo $row_reserved_month2[14][0];?>],
        ['<?php echo $storedate[15];?>', <?php echo $row_reserved_month1[15][0];?>, <?php echo $row_reserved_month2[15][0];?>],
        ['<?php echo $storedate[16];?>', <?php echo $row_reserved_month1[16][0];?>, <?php echo $row_reserved_month2[16][0];?>],
        ['<?php echo $storedate[17];?>', <?php echo $row_reserved_month1[17][0];?>, <?php echo $row_reserved_month2[17][0];?>],
        ['<?php echo $storedate[18];?>', <?php echo $row_reserved_month1[18][0];?>, <?php echo $row_reserved_month2[18][0];?>],
        ['<?php echo $storedate[19];?>', <?php echo $row_reserved_month1[19][0];?>, <?php echo $row_reserved_month2[19][0];?>],
        ['<?php echo $storedate[20];?>', <?php echo $row_reserved_month1[20][0];?>, <?php echo $row_reserved_month2[20][0];?>],
        ['<?php echo $storedate[21];?>', <?php echo $row_reserved_month1[21][0];?>, <?php echo $row_reserved_month2[21][0];?>],
        ['<?php echo $storedate[22];?>', <?php echo $row_reserved_month1[22][0];?>, <?php echo $row_reserved_month2[22][0];?>],
        ['<?php echo $storedate[23];?>', <?php echo $row_reserved_month1[23][0];?>, <?php echo $row_reserved_month2[23][0];?>],
        ['<?php echo $storedate[24];?>', <?php echo $row_reserved_month1[24][0];?>, <?php echo $row_reserved_month2[24][0];?>],
        ['<?php echo $storedate[25];?>', <?php echo $row_reserved_month1[25][0];?>, <?php echo $row_reserved_month2[25][0];?>],
        ['<?php echo $storedate[26];?>', <?php echo $row_reserved_month1[26][0];?>, <?php echo $row_reserved_month2[26][0];?>],
        ['<?php echo $storedate[27];?>', <?php echo $row_reserved_month1[27][0];?>, <?php echo $row_reserved_month2[27][0];?>],
        ['<?php echo $storedate[28];?>', <?php echo $row_reserved_month1[28][0];?>, <?php echo $row_reserved_month2[28][0];?>],
        ['<?php echo $storedate[29];?>', <?php echo $row_reserved_month1[29][0];?>, <?php echo $row_reserved_month2[29][0];?>],
        ['<?php echo $storedate[30];?>', <?php echo $row_reserved_month1[30][0];?>, <?php echo $row_reserved_month2[30][0];?>],
    ]);

    var options = {
        chart: {
            title: 'Bookings Reserved',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('month-compare-reserved'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Day', '<?php echo $_GET['sort-month-compare1']; ?>', '<?php echo $_GET['sort-month-compare2']; ?>'],
        ['<?php echo $storedate[0];?>', <?php echo $row_cancelled_month1[0][0];?>, <?php echo $row_cancelled_month2[0][0];?>],
        ['<?php echo $storedate[1];?>', <?php echo $row_cancelled_month1[1][0];?>, <?php echo $row_cancelled_month2[1][0];?>],
        ['<?php echo $storedate[2];?>', <?php echo $row_cancelled_month1[2][0];?>, <?php echo $row_cancelled_month2[2][0];?>],
        ['<?php echo $storedate[3];?>', <?php echo $row_cancelled_month1[3][0];?>, <?php echo $row_cancelled_month2[3][0];?>],
        ['<?php echo $storedate[4];?>', <?php echo $row_cancelled_month1[4][0];?>, <?php echo $row_cancelled_month2[4][0];?>],
        ['<?php echo $storedate[5];?>', <?php echo $row_cancelled_month1[5][0];?>, <?php echo $row_cancelled_month2[5][0];?>],
        ['<?php echo $storedate[6];?>', <?php echo $row_cancelled_month1[6][0];?>, <?php echo $row_cancelled_month2[6][0];?>],
        ['<?php echo $storedate[7];?>', <?php echo $row_cancelled_month1[7][0];?>, <?php echo $row_cancelled_month2[7][0];?>],
        ['<?php echo $storedate[8];?>', <?php echo $row_cancelled_month1[8][0];?>, <?php echo $row_cancelled_month2[8][0];?>],
        ['<?php echo $storedate[9];?>', <?php echo $row_cancelled_month1[9][0];?>, <?php echo $row_cancelled_month2[9][0];?>],
        ['<?php echo $storedate[10];?>', <?php echo $row_cancelled_month1[10][0];?>, <?php echo $row_cancelled_month2[10][0];?>],
        ['<?php echo $storedate[11];?>', <?php echo $row_cancelled_month1[11][0];?>, <?php echo $row_cancelled_month2[11][0];?>],
        ['<?php echo $storedate[12];?>', <?php echo $row_cancelled_month1[12][0];?>, <?php echo $row_cancelled_month2[12][0];?>],
        ['<?php echo $storedate[13];?>', <?php echo $row_cancelled_month1[13][0];?>, <?php echo $row_cancelled_month2[13][0];?>],
        ['<?php echo $storedate[14];?>', <?php echo $row_cancelled_month1[14][0];?>, <?php echo $row_cancelled_month2[14][0];?>],
        ['<?php echo $storedate[15];?>', <?php echo $row_cancelled_month1[15][0];?>, <?php echo $row_cancelled_month2[15][0];?>],
        ['<?php echo $storedate[16];?>', <?php echo $row_cancelled_month1[16][0];?>, <?php echo $row_cancelled_month2[16][0];?>],
        ['<?php echo $storedate[17];?>', <?php echo $row_cancelled_month1[17][0];?>, <?php echo $row_cancelled_month2[17][0];?>],
        ['<?php echo $storedate[18];?>', <?php echo $row_cancelled_month1[18][0];?>, <?php echo $row_cancelled_month2[18][0];?>],
        ['<?php echo $storedate[19];?>', <?php echo $row_cancelled_month1[19][0];?>, <?php echo $row_cancelled_month2[19][0];?>],
        ['<?php echo $storedate[20];?>', <?php echo $row_cancelled_month1[20][0];?>, <?php echo $row_cancelled_month2[20][0];?>],
        ['<?php echo $storedate[21];?>', <?php echo $row_cancelled_month1[21][0];?>, <?php echo $row_cancelled_month2[21][0];?>],
        ['<?php echo $storedate[22];?>', <?php echo $row_cancelled_month1[22][0];?>, <?php echo $row_cancelled_month2[22][0];?>],
        ['<?php echo $storedate[23];?>', <?php echo $row_cancelled_month1[23][0];?>, <?php echo $row_cancelled_month2[23][0];?>],
        ['<?php echo $storedate[24];?>', <?php echo $row_cancelled_month1[24][0];?>, <?php echo $row_cancelled_month2[24][0];?>],
        ['<?php echo $storedate[25];?>', <?php echo $row_cancelled_month1[25][0];?>, <?php echo $row_cancelled_month2[25][0];?>],
        ['<?php echo $storedate[26];?>', <?php echo $row_cancelled_month1[26][0];?>, <?php echo $row_cancelled_month2[26][0];?>],
        ['<?php echo $storedate[27];?>', <?php echo $row_cancelled_month1[27][0];?>, <?php echo $row_cancelled_month2[27][0];?>],
        ['<?php echo $storedate[28];?>', <?php echo $row_cancelled_month1[28][0];?>, <?php echo $row_cancelled_month2[28][0];?>],
        ['<?php echo $storedate[29];?>', <?php echo $row_cancelled_month1[29][0];?>, <?php echo $row_cancelled_month2[29][0];?>],
        ['<?php echo $storedate[30];?>', <?php echo $row_cancelled_month1[30][0];?>, <?php echo $row_cancelled_month2[30][0];?>],
    ]);

    var options = {
        chart: {
            title: 'Bookings Cancelled',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('month-compare-cancelled'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

</head>
<body>

    <?php include("include/navigation.php"); ?>


    <div class="mainbody">
        <!-- Your contents go in here, create a new div yah. Better use div for each section -->
        <div class="texts1">
            <h1>Monthly Overview</h1>
        </div>

        <div class="month-select">
            <form action="" method="GET">
                <select name="sort-month">
                    <option value="Jan" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Jan") { echo 'selected'; } ?>>January <?php echo $year; ?></option>
                    <option value="Feb" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Feb") { echo 'selected'; } ?>>February <?php echo $year; ?></option>
                    <option value="Mar" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Mar") { echo 'selected'; } ?>>March <?php echo $year; ?></option>
                    <option value="Apr" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Apr") { echo 'selected'; } ?>>April <?php echo $year; ?></option>
                    <option value="May" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "May") { echo 'selected'; } ?>>May <?php echo $year; ?></option>
                    <option value="Jun" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Jun") { echo 'selected'; } ?>>June <?php echo $year; ?></option>
                    <option value="Jul" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Jul") { echo 'selected'; } ?>>July <?php echo $year; ?></option>
                    <option value="Aug" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Aug") { echo 'selected'; } ?>>August <?php echo $year; ?></option>
                    <option value="Sep" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Sep") { echo 'selected'; } ?>>September <?php echo $year; ?></option>
                    <option value="Oct" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Oct") { echo 'selected'; } ?>>October <?php echo $year; ?></option>
                    <option value="Nov" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Nov") { echo 'selected'; } ?>>November <?php echo $year; ?></option>
                    <option value="Dec" <?php if ((isset($_GET['sort-month'])) && $_GET['sort-month'] == "Dec") { echo 'selected'; } ?>>December <?php echo $year; ?></option>
                </select>
                <button class="month-select-button" type="submit">Sort</button>
            </form>
        </div>

        <div id="month-visitor" style="width: 100%; height: 800px; margin: 0 auto;"></div>


        <div class="month-comparison">
            <h1> Month Comparison </h1>
                <div class="month-comparison-selection-boxes">
                    <form action="" method="GET">
                        <p> Current Month </p>
                        <select name="sort-month-compare1">
                            <option value="Jan" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Jan") { echo 'selected'; } ?>>January <?php echo $year; ?></option>
                            <option value="Feb" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Feb") { echo 'selected'; } ?>>February <?php echo $year; ?></option>
                            <option value="Mar" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Mar") { echo 'selected'; } ?>>March <?php echo $year; ?></option>
                            <option value="Apr" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Apr") { echo 'selected'; } ?>>April <?php echo $year; ?></option>
                            <option value="May" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "May") { echo 'selected'; } ?>>May <?php echo $year; ?></option>
                            <option value="Jun" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Jun") { echo 'selected'; } ?>>June <?php echo $year; ?></option>
                            <option value="Jul" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Jul") { echo 'selected'; } ?>>July <?php echo $year; ?></option>
                            <option value="Aug" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Aug") { echo 'selected'; } ?>>August <?php echo $year; ?></option>
                            <option value="Sep" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Sep") { echo 'selected'; } ?>>September <?php echo $year; ?></option>
                            <option value="Oct" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Oct") { echo 'selected'; } ?>>October <?php echo $year; ?></option>
                            <option value="Nov" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Nov") { echo 'selected'; } ?>>November <?php echo $year; ?></option>
                            <option value="Dec" <?php if ((isset($_GET['sort-month-compare1'])) && $_GET['sort-month-compare1'] == "Dec") { echo 'selected'; } ?>>December <?php echo $year; ?></option>
                        </select>

                        <h1> VS </h1>
                        <p> Month to Compare to </p>
                        <select name="sort-month-compare2">
                            <option value="Jan" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Jan") { echo 'selected'; } ?>>January <?php echo $year; ?></option>
                            <option value="Feb" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Feb") { echo 'selected'; } ?>>February <?php echo $year; ?></option>
                            <option value="Mar" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Mar") { echo 'selected'; } ?>>March <?php echo $year; ?></option>
                            <option value="Apr" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Apr") { echo 'selected'; } ?>>April <?php echo $year; ?></option>
                            <option value="May" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "May") { echo 'selected'; } ?>>May <?php echo $year; ?></option>
                            <option value="Jun" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Jun") { echo 'selected'; } ?>>June <?php echo $year; ?></option>
                            <option value="Jul" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Jul") { echo 'selected'; } ?>>July <?php echo $year; ?></option>
                            <option value="Aug" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Aug") { echo 'selected'; } ?>>August <?php echo $year; ?></option>
                            <option value="Sep" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Sep") { echo 'selected'; } ?>>September <?php echo $year; ?></option>
                            <option value="Oct" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Oct") { echo 'selected'; } ?>>October <?php echo $year; ?></option>
                            <option value="Nov" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Nov") { echo 'selected'; } ?>>November <?php echo $year; ?></option>
                            <option value="Dec" <?php if ((isset($_GET['sort-month-compare2'])) && $_GET['sort-month-compare2'] == "Dec") { echo 'selected'; } ?>>December <?php echo $year; ?></option>
                        </select>

                        <br><button class="month-comparison-button" type="submit">Compare</button>
                     </form>
                </div>

                <?php 
                if(isset($_GET['sort-month-compare1']) && isset($_GET['sort-month-compare2'])){
                    echo
                        '<h1> Overview </h1>
                        <div class="compare-graph-results">
                            <p> Bookings Completed </p>
                            '?>
                                <?php 

                                if($analyse_completed < 0){
                                    echo '<p class=red> <img src="images/down.png"> '.(round($analyse_completed, 2)). "%</p>";
                                }
                                else if ($analyse_completed > 0){
                                    echo '<p class=grass> <img src="images/up.png"> '.(round($analyse_completed, 2))."%</p>";
                                }
                                else {
                                    echo "<p>".(round($analyse_completed, 2))."%</p>";
                                }

                                ?>

                            <?php echo '
                            <div class="compare-graph-box" id="month-compare-completed" style="width: 90%; height: 500px;"></div>
                            <div class="graph-analysis">
                            </div>
                        </div>
                        <div class="compare-graph-results">
                            <p> Bookings Cancelled </p>
                            '?>
                                <?php 

                                if($analyse_cancelled < 0){
                                    echo '<p class=red> <img src="images/up1.png"> '.(round($analyse_cancelled, 2)). "%</p>";
                                }
                                else if ($analyse_cancelled > 0){
                                    echo '<p class=grass> <img src="images/down1.png"> '.(round($analyse_cancelled, 2))."%</p>";
                                }
                                else {
                                    echo "<p>".(round($analyse_cancelled, 2))."%</p>";
                                }

                                ?>
                                
                            <?php echo '
                            <div class="compare-graph-box" id="month-compare-cancelled" style="width: 90%; height: 500px;"></div>
                            <div class="graph-analysis">
                            </div>
                        </div>
                        <div class="compare-graph-results">
                            <p> Bookings Reserved </p>
                            '?>
                                <?php 

                                if($analyse_reserved < 0){
                                    echo '<p class=red> <img src="images/down.png"> '.(round($analyse_reserved, 2)). "%</p>";
                                }
                                else if ($analyse_reserved > 0){
                                    echo '<p class=grass> <img src="images/up.png"> '.(round($analyse_reserved, 2))."%</p>";
                                }
                                else {
                                    echo "<p>".(round($analyse_reserved, 2))."%</p>";
                                }

                                ?>
                                
                            <?php echo '
                            <div class="compare-graph-box" id="month-compare-reserved" style="width: 90%; height: 500px;"></div>
                            <div class="graph-analysis">
                            </div>
                        </div>';
                    }
                ?>
        </div>



        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>