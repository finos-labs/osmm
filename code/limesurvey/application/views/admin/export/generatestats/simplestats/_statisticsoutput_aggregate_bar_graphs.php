<?php
/**
 * This view render the bar graphs
 *

 *
 */
?>
<!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>--></div>

<div id="chart<?php echo $osmcount; ?>">
<script>
var options = {
    series: [{
        data: [<?php echo join(',',$grawdata)?>],//[6, 25, 15, 9, 10, 23, 12, 30, 15, 27]
    }],
    chart: {
        type: 'bar',
        height: 400,
        events: {
            dataPointSelection: function(event, chartContext, opt) {
				//alert(opt.w.globals.series);
                switch(opt.w.globals.labels[opt.dataPointIndex]) {
					case 'Goals and Objectives':
					var labelGOR = opt.w.globals.series[0][0];	
					//alert(labelGOR);
						if(labelGOR<=12){
							window.open("/limesurvey/GoalsNObjectives-unplanned.html",'_blank','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>12 && labelGOR <=24){
								window.open("/limesurvey/GoalsNObjectives-aware.html",'_blank','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>24 && labelGOR <=37){
								window.open("/limesurvey/GoalsNObjectives-managed.html",'_blank','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>37 && labelGOR <=50){
								window.open("/limesurvey/GoalsNObjectives-engaged.html",'_blank','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>50 && labelGOR <=63){
								window.open("/limesurvey/GoalsNObjectives-leading.html",'_blank','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0,location=no');
						};
					break;
					case 'Corporate Alignment':
					var labelCorp = opt.w.globals.series[0][1];	
						//alert(labelCorp);					
						if(labelCorp<=9){
							window.open("/limesurvey/CorporateAlignment-unplanned.html",'Corporate','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>9 && labelCorp <=18){
								window.open("/limesurvey/CorporateAlignment-aware.html",'Corporate','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>18 && labelCorp <=27){
								window.open("/limesurvey/CorporateAlignment-managed.html",'Corporate','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>27 && labelCorp <=37){
								window.open("/limesurvey/CorporateAlignment-engaged.html",'Corporate','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>37 && labelCorp <=45){
								window.open("/limesurvey/CorporateAlignment-leading.html",'Corporate','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
					case 'Community and Ecosystem Engagement':
					var labelComm = opt.w.globals.series[0][2];	
						//alert(labelComm);					
						if(labelComm<=12){
							window.open("/limesurvey/CommunityEcosystem-unplanned.html",'Community','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>12 && labelComm <=24){
								window.open("/limesurvey/CommunityEcosystem-aware.html",'Community','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>24 && labelComm <=37){
								window.open("/limesurvey/CommunityEcosystem-managed.html",'Community','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>37 && labelComm <=50){
								window.open("/limesurvey/CommunityEcosystem-engaged.html",'Community','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>50 && labelComm <=63){
								window.open("/limesurvey/CommunityEcosystem-leading.html",'Community','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'InnerSource':
						var labelinrsrc = opt.w.globals.series[0][3];
						//alert(labelinrsrc);						
						if(labelinrsrc<=10){
							window.open("/limesurvey/innersource-unplanned.html",'InnerSource','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>10 && labelinrsrc <=20){
								window.open("/limesurvey/innersource-aware.html",'InnerSource','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>20 && labelinrsrc <=30){
								window.open("/limesurvey/innersource-managed.html",'InnerSource','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>30 && labelinrsrc <=40){
								window.open("/limesurvey/innersource-engaged.html",'InnerSource','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>40 && labelinrsrc <=51){
								window.open("/limesurvey/innersource-leading.html",'InnerSource','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};									
					break;	
                    case 'Lifecycle Management':
					var labelcons = opt.w.globals.series[0][0];	
						//alert(labelcons);					
						if(labelcons<=9){
							window.open("/limesurvey/lifecyclemgt-unplanned.html",'Lifecycle','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>9 && labelcons <=18){
								window.open("/limesurvey/lifecyclemgt-aware.html",'Lifecycle','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>18 && labelcons <=27){
								window.open("/limesurvey/lifecyclemgt-managed.html",'Lifecycle','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>27 && labelcons <=37){
								window.open("/limesurvey/lifecyclemgt-engaged.html",'Lifecycle','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>37 && labelcons <=45){
								window.open("/limesurvey/lifecyclemgt-leading.html",'Lifecycle','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Risk Management':
					var labelrisk = opt.w.globals.series[0][1];	
						//alert(labelrisk);					
						if(labelrisk<=15){
							window.open("/limesurvey/riskmgt-unplanned.html",'Risk','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelrisk>15 && labelrisk <=30){
								window.open("/limesurvey/riskmgt-aware.html",'Risk','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelrisk>30 && labelrisk <=45){
								window.open("/limesurvey/riskmgt-managed.html",'Risk','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelrisk>45 && labelrisk <=60){
								window.open("/limesurvey/riskmgt-engaged.html",'Risk','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelrisk>60 && labelrisk <=78){
								window.open("/limesurvey/riskmgt-leading.html",'Risk','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Compliance and Assurance Management':
					var labelcompl = opt.w.globals.series[0][2];		
						//alert(labelcompl);					
						if(labelcompl<=9){
							window.open("/limesurvey/compliancemgt-unplanned.html",'Compliance','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcompl>9 && labelcompl <=18){
								window.open("/limesurvey/compliancemgt-aware.html",'Compliance','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcompl>18 && labelcompl <=27){
								window.open("/limesurvey/compliancemgt-managed.html",'Compliance','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcompl>27 && labelcompl <=37){
								window.open("/limesurvey/compliancemgt-engaged.html",'Compliance','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcompl>37 && labelcompl <=45){
								window.open("/limesurvey/compliancemgt-leading.html",'Compliance','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Security Management':
					var labelsecmgt = opt.w.globals.series[0][3];	
						//alert(labelsecmgt);					
						if(labelsecmgt<=12){
							window.open("/limesurvey/securitymgt-unplanned.html",'Security','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelsecmgt>12 && labelsecmgt <=24){
								window.open("/limesurvey/securitymgt-aware.html",'Security','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelsecmgt>24 && labelsecmgt <=36){
								window.open("/limesurvey/securitymgt-managed.html",'Security','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelsecmgt>36 && labelsecmgt <=48){
								window.open("/limesurvey/securitymgt-engaged.html",'Security','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelsecmgt>48 && labelsecmgt <=60){
								window.open("/limesurvey/securitymgt-leading.html",'Security','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;	
					case 'Operations Management':
					var labelOpr = opt.w.globals.series[0][4];	
						//alert(labelOpr);					
						if(labelOpr<=6){
							window.open("/limesurvey/Operations-unplanned.html",'Operations','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>6 && labelOpr <=12){
								window.open("/limesurvey/Operations-aware.html",'Operations','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>12 && labelOpr <=18){
								window.open("/limesurvey/Operations-managed.html",'Operations','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>18 && labelOpr <=24){
								window.open("/limesurvey/Operations-engaged.html",'Operations','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>24 && labelOpr <=33){
								window.open("/limesurvey/Operations-leading.html",'Operations','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;					
                    case 'Consumption':
					var labelcons = opt.w.globals.series[0][0];	
						//alert(labelcons);						
						if(labelcons<=11){
							window.open("/limesurvey/consumption-unplanned.html",'consumption','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>11 && labelcons <=22){
								window.open("/limesurvey/consumption-aware.html",'consumption','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>22 && labelcons <=32){
								window.open("/limesurvey/consumption-managed.html",'consumption','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>32 && labelcons <=42){
								window.open("/limesurvey/consumption-engaged.html",'consumption','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>42 && labelcons <=54){
								window.open("/limesurvey/consumption-leading.html",'consumption','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Contribution':
					var labelcontrib = opt.w.globals.series[0][1];
						//alert(labelcontrib);					
						if(labelcontrib<=12){
							window.open("/limesurvey/contribution-unplanned.html",'contribution','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>12 && labelcontrib <=24){
								window.open("/limesurvey/contribution-aware.html",'contribution','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>24 && labelcontrib <=35){
								window.open("/limesurvey/contribution-managed.html",'contribution','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>35 && labelcontrib <=46){
								window.open("/limesurvey/contribution-engaged.html",'contribution','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>46 && labelcontrib <=57){
								window.open("/limesurvey/contribution-leading.html",'contribution','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Publication':
						var labelpub = opt.w.globals.series[0][2];
						//alert(labelpub);						
						if(labelpub<=12){
							window.open("/limesurvey/publication-unplanned.html",'Publication','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>12 && labelpub <=24){
								window.open("/limesurvey/publication-aware.html",'Publication','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>24 && labelpub <=36){
								window.open("/limesurvey/publication-managed.html",'Publication','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>36 && labelpub <=48){
								window.open("/limesurvey/publication-engaged.html",'Publication','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>48 && labelpub <=60){
								window.open("/limesurvey/publication-leading.html",'Publication','width=1200, height=500, scrollbars=no,titlebar=0,toolbar=0');
						};						
			
                }
				
            }
        }
    },
    plotOptions: {
        bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
                position: 'bottom'
            },
        }
    },
    colors: [<?php echo $color;?>,<?php echo $color;?>, <?php echo $color;?>, <?php echo $color;?>,
        <?php echo $color;?>], //'#D9B8EA','#FEE3A1','#E1F5FF','#2b908f', '#f9a3a4', '#90ee7e',
        //'#f48024', '#69d2e7','#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', 
    formatter: function (val, opt) {
        if (val <= 6) {
            return "Ad-hoc";
        } else if (val > 6 && val <= 12) {
            return "Aware";
        } else if (val > 12 && val <= 18) {
            return "Managed";
        } else if (val > 18 && val <= 24) {
            return "Engaged";
        } else if (val > 24 && val <= 30) {
            return "Leading";
        }
    },
    dataLabels: {
        enabled: true,
        textAnchor: 'start',
        style: {
            colors: ['#000']
        },
        formatter: function (val, opt) {
           // var mylable=opt.w.globals.labels[opt.dataPointIndex];
		    var mylable=opt.w.globals.labels[opt.dataPointIndex];
            if (val <= 6) {
                mylable = mylable;//+':'+"Ad-hoc";
            } else if (val > 6 && val <= 12) {
                mylable = mylable;//+':'+"Aware";
            } else if (val > 12 && val <= 18) {
                mylable = mylable;//+':'+ "Managed";
            } else if (val > 18 && val <= 24) {
                mylable = mylable;//+':'+"Engaged";
            } else if (val > 24 && val <= 30) {
                mylable = mylable;//+':'+"Leading";
            }
            return opt.w.globals.labels[opt.dataPointIndex]; //+ ":" + mylable
			//return mylable
        },
        offsetX: 0,
        dropShadow: {
            enabled: false
        }
    },
    stroke: {
        width: 1,
        colors: ['#fff']
    },
    xaxis: {
        categories: <?php echo json_encode($labels); ?>,
        groups: {
            'Strategy': ['Goals and Objectives', 'Corporate Alignment', 'Community and Ecosystem Engagement','InnerSource'],
            'Management': ['Lifecycle Management', 'Risk Management', 'Compliance and Assurance Management', 'Security Management', 'Operations Management'],
            'Usage': ['Consumption', 'Contribution', 'Publication']
        },
		labels: {
            show: true
        },		
	  min: 0,
      max: 80,
	  tickAmount: 5,		
    },
    yaxis: {
        labels: {
            show: false,
            formatter: function (val, opt) {
                var mlable='';
                if (val == 'Goals and Objectives' || val == 'Corporate Alignment' || val == 'Community and Ecosystem Engagement'|| val == 'InnerSource') {
                    mlable = val//+":"+"Strategy";
                } else if (val == 'Lifecycle Management' || val == 'Risk Management' || val == 'Compliance and Assurance Management' || val == 'Security Management'|| val == 'Operations Management') {
                    mlable = val//+":"+"Management";
                } else if (val == 'Consumption' || val == 'Contribution' || val == 'Publication') {
                    mlable = val//+":"+"Usage";
                }
                return  mlable;
            },
        }
    },
    title: {
        text: 'OSMM',
        align: 'center',
        floating: true
    },
    subtitle: {
        text: [<?php echo json_encode($qtitle); ?>], //"Dimension:Strategy",
        align: "center"
    },
    tooltip: {
		custom: function({series, seriesIndex, dataPointIndex, w}) {
    return  series[seriesIndex][dataPointIndex];
  },
        theme: 'dark',
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (val,opt) {
					var mylable='';
					//alert(opt.w.globals.labels[opt.dataPointIndex]);
                    //return mylable=opt.w.globals.labels[opt.dataPointIndex]
                }
            }
        }
    }
};
var chart = new ApexCharts(document.querySelector("#chart<?php echo $osmcount; ?>"), options);
chart.render();
</script>
</div>



