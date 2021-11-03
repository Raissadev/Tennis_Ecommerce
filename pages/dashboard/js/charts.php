<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php 
    $ordersChart = \MySql::connect()->prepare("SELECT * FROM `orders` ORDER BY created");
    $ordersChart->execute();  
    $ordersChart = $ordersChart->fetchAll();
    foreach($ordersChart as $key => $value){
        $getDate[] = date('M', strtotime($value['created']));
        $sum = array('Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0);
        $year = date('Y');

        if(in_array('Jan', $getDate)){
            $jan = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-01-01' AND '$year-01-31'");
            $jan->execute();
            $jan = $jan->fetchAll();
            foreach($jan as $value){
                $sum['Jan'] += $value['price'];
            }
        }
        if(in_array('Feb', $getDate)){
          $feb = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-02-01' AND '$year-02-31'");
          $feb->execute();
          $feb = $feb->fetchAll();
          foreach($feb as $value){
              $sum['Feb'] += $value['price'];
          }
      }
        if(in_array('Mar', $getDate)){
          $mar = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-03-01' AND '$year-03-31'");
          $mar->execute();
          $mar = $mar->fetchAll();
          foreach($mar as $value){
              $sum['Mar'] += $value['price'];
          }
      }
        if(in_array('Apr', $getDate)){
          $apr = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-04-01' AND '$year-04-31'");
          $apr->execute();
          $apr = $apr->fetchAll();
          foreach($apr as $value){
              $sum['Apr'] += $value['price'];
          }
      }
        if(in_array('May', $getDate)){
          $may = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-05-01' AND '$year-05-31'");
          $may->execute();
          $may = $may->fetchAll();
          foreach($may as $value){
              $sum['May'] += $value['price'];
          }
      }
        if(in_array('Jun', $getDate)){
          $jun = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-06-01' AND '$year-06-31'");
          $jun->execute();
          $jun = $jun->fetchAll();
          foreach($jun as $value){
              $sum['Jun'] += $value['price'];
          }
        }
        if(in_array('Jul', $getDate)){
          $jul = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-07-01' AND '$year-07-31'");
          $jul->execute();
          $jul = $jul->fetchAll();
          foreach($jul as $value){
              $sum['Jul'] += $value['price'];
          }
        }
        if(in_array('Aug', $getDate)){
          $aug = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-08-01' AND '$year-08-31'");
          $aug->execute();
          $aug = $aug->fetchAll();
          foreach($aug as $value){
              $sum['Aug'] += $value['price'];
          }
        }
        if(in_array('Sep', $getDate)){
          $sep = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-09-01' AND '$year-09-31'");
          $sep->execute();
          $sep = $sep->fetchAll();
          foreach($sep as $value){
              $sum['Sep'] += $value['price'];
          }
        }
        if(in_array('Oct', $getDate)){
          $oct = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-10-01' AND '$year-10-31'");
          $oct->execute();
          $oct = $oct->fetchAll();
          foreach($oct as $value){
              $sum['Oct'] += $value['price'];
          }
        }
        if(in_array('Nov', $getDate)){
          $nov = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-11-01' AND '$year-11-31'");
          $nov->execute();
          $nov = $nov->fetchAll();
          foreach($nov as $value){
              $sum['Nov'] += $value['price'];
          }
        }
        if(in_array('Dec', $getDate)){
          $dec = \MySql::connect()->prepare("SELECT * FROM `orders` WHERE `created` BETWEEN '$year-12-01' AND '$year-12-31'");
          $dec->execute();
          $dec = $dec->fetchAll();
          foreach($dec as $value){
              $sum['Dec'] += $value['price'];
          }
        }

        echo $sum['Nov'];
      }
?>
<script>
var options = {
  chart: {
    height: 230,
    width:'100%',
    type: "area"
  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "Orders",
      data: [<?php echo $sum['Jan']; echo ', '.$sum['Feb']; echo ', '.$sum['Mar']; echo ', '.$sum['Apr']; echo ', '.$sum['May']; echo ', '.$sum['Jun']; echo ', '.$sum['Jul']; echo ', '.$sum['Aug']; echo ', '.$sum['Sep']; echo ', '.$sum['Oct']; echo ', '.$sum['Nov']; echo ', '.$sum['Dec']; ?>]
    }
  ],
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      opacityFrom: 0.7,
      opacityTo: 0.9,
      stops: [0, 90, 100],
      colorStops: [
        {
          offset: 0,
          color: "#1b1b1b",
          opacity: 1
        },
        {
          offset: 20,
          color: "#1b1b1b",
          opacity: 1
        },
        {
          offset: 60,
          color: "#1b1b1b",
          opacity: 1
        },
        {
          offset: 100,
          color: "#1b1b1b",
          opacity: 1
        }
      ]
    }
  },
  grid: {
    show: false,  
    },
  xaxis: {
    categories: [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ]
  },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();


</script>
<?php 
    
?>
<script>
var options = {
        series: [<?php $totalVisits = \models\dashboardModel::getVisits(); $percetageVisits = 100; $percetageVisitsValor = count($totalVisits); $resultPercetageVisits = ($percetageVisitsValor / $percetageVisits) * 100; echo $resultPercetageVisits; ?>],
        chart: {
        height: 250,
        type: 'radialBar',
        offsetY: -10
    },
    plotOptions: {
        radialBar: {
        startAngle: -135,
        endAngle: 135,
        dataLabels: {
            name: {
            fontSize: '12px',
            color: '#616161',
            offsetY: 120
            },
            value: {
            offsetY: 76,
            fontSize: '18px',
            color: '#a9ded8',
            formatter: function (val) {
                return val + "%";
            }
            }
        }
        }
    },
    fill: {
        colors: '#a9ded8',
        backgroundColor: '#000',
        type: 'gradient',
        gradient: {
            shade: 'dark',
            shadeIntensity: 0.15,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 65, 91]
        },
    },
    track:{
        background: '#000'
    },
    stroke: {
        dashArray: 4,
        color: '#000',
    },
    labels: ['Median Ratio'],
    };

    var chart = new ApexCharts(document.querySelector("#chartDices"), options);
    chart.render();
</script>