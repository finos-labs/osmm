<?php
/**
 * This view render the graphs
 *
 * @var $rt
 * @var $qqid
 * @var $labels
 * @var $COLORS_FOR_SURVEY
 * @var $charttype
 * @var $sChartname
 * @var $grawdata
 * @var $color
 *
 */
?>
<!-- _statisticsoutput_aggregate_graphs top:60px; left:10px;-->
    <?php if(count($labels) < 70): ?>
<div style=" left:80px; width:900px; height:900px;">	
<canvas id="chartjs-<?php echo $osmcount; ?>" width="60" height="60"></canvas>
<script>
var ctx = document.getElementById('chartjs-'+<?php echo $osmcount; ?>).getContext('2d');
//ctx.canvas.width = 100;
//ctx.canvas.height = 200;
var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
		labels : <?php echo json_encode($labels); ?>,
        datasets: [{
            label: [<?php echo json_encode($qtitle); ?>], //'Open Source Maturity Model',
			data:[<?php echo join(',',$grawdata)?>],

             backgroundColor: [
                 'rgba(54,54,255, 0.4)'
             ],
            borderColor: [
                'rgba(43, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(45, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(65, 159, 64, 1)'
            ],
            borderWidth: 5
        }

			]
    },
    options: {
		scale:{
			ticks:{
				beginAtZero: true,
				min: 0,
				stepSize: 5,
				userCallback:function(label,index,labels){
					if(Math.floor(label) === label){
						return label;
					}
				},
					
		}
        // scales: {
            // y: {
  				// beginAtZero: true,

            // }
        // },

    }
	}
});
init_chart_js_graph_with_datasets('radar', $osmcount);
</script>
</div>
<!--<script src="/assets/scripts/heatmapchart.js?v=1"></script>-->
	
        <!-- Charts -->
        <div class="row custom custom-padding bottom-20">
            <div class="col-sm-12 vcenter chartjs-container" id="chartjs-container-<?php echo $qqid; ?>"
                data-chartname="<?php echo $sChartname; // The name of the jschart object ?>"
                data-qid="<?php echo $qqid; // the question id ?>"
                data-type="<?php echo $charttype; // the chart start type (bar, donut, etc.) ?>"
                data-color="<?php echo $color; // the background color for bar, etc. ?>"
            >

            <?php
            //var_dump($labels);
            ?>
                <canvas class="canvas-chart " id="chartjs-<?php echo $qqid; ?>" width="60" height="60<?php // echo $iCanvaHeight;?>"
                    data-color="<?php echo $color; // the background color for bar, etc. ?>"></canvas>
            </div>
        </div>

        <div class="row">
            <!-- legends -->

        </div>

<!-- Buttons to change graph type -->
        <div id='stats_<?php echo $rt;?>' class='graphdisplay' style="text-align:center">
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-warning" role="alert">
                    <?php eT("Too many labels, can't generate chart");?>
                </div>
            </div>
        </div>
    <?php endif;?>

<?php //Simpler js-aggregation of values through global object. Approx 30% faster than parsing through eval ?>
 <script>
    // statisticsData['quid'+'<?php echo $qqid; ?>'] = {
    // labels : <?php echo json_encode($labels); ?>,
	//grawdata : <?php echo json_encode($grawdata); ?>, // the datas to generate the graph  
   //  };

 </script>
<!-- endof  _statisticsoutput_graphs -->

