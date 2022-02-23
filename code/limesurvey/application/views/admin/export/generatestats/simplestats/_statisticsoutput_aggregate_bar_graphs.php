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
					case 'Goals,Objectives and Resources':
					var labelGOR = opt.w.globals.series[0][0];						
						if(labelGOR<=6){
							window.open("/limesurvey/GoalsNResources-adhoc.html",'_blank','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>6 && labelGOR <=12){
								window.open("/limesurvey/GoalsNResources-aware.html",'_blank','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>12 && labelGOR <=18){
								window.open("/limesurvey/GoalsNResources-managed.html",'_blank','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>18 && labelGOR <=24){
								window.open("/limesurvey/GoalsNResources-engaged.html",'_blank','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0,location=no');
						}else if(labelGOR>24 && labelGOR <=30){
								window.open("/limesurvey/GoalsNResources-leading.html",'_blank','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0,location=no');
						};
					break;
					case 'Corporate Alignment':
					var labelCorp = opt.w.globals.series[0][1];						
						if(labelCorp<=6){
							window.open("/limesurvey/CorporateAlignment-adhoc.html",'Corporate','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>6 && labelCorp <=12){
								window.open("/limesurvey/CorporateAlignment-aware.html",'Corporate','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>12 && labelCorp <=18){
								window.open("/limesurvey/CorporateAlignment-managed.html",'Corporate','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>18 && labelCorp <=24){
								window.open("/limesurvey/CorporateAlignment-engaged.html",'Corporate','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCorp>24 && labelCorp <=30){
								window.open("/limesurvey/CorporateAlignment-leading.html",'Corporate','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
					case 'Community and Ecosystem Engagement':
					var labelComm = opt.w.globals.series[0][2];						
						if(labelComm<=6){
							window.open("/limesurvey/CommunityEcosystem-adhoc.html",'Community','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>6 && labelComm <=12){
								window.open("/limesurvey/CommunityEcosystem-aware.html",'Community','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>12 && labelComm <=18){
								window.open("/limesurvey/CommunityEcosystem-managed.html",'Community','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>18 && labelComm <=24){
								window.open("/limesurvey/CommunityEcosystem-engaged.html",'Community','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelComm>24 && labelComm <=30){
								window.open("/limesurvey/CommunityEcosystem-leading.html",'Community','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;	
					case 'Operations':
					var labelOpr = opt.w.globals.series[0][3];						
						if(labelOpr<=6){
							window.open("/limesurvey/Operations-adhoc.html",'Operations','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>6 && labelOpr <=12){
								window.open("/limesurvey/Operations-aware.html",'Operations','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>12 && labelOpr <=18){
								window.open("/limesurvey/Operations-managed.html",'Operations','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>18 && labelOpr <=24){
								window.open("/limesurvey/Operations-engaged.html",'Operations','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelOpr>24 && labelOpr <=30){
								window.open("/limesurvey/Operations-leading.html",'Operations','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;	
					case 'Culture':
					var labelCulture = opt.w.globals.series[0][4];						
						if(labelCulture<=6){
							window.open("/limesurvey/Culture-adhoc.html",'Culture','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCulture >6 && labelCulture <=12){
								window.open("/limesurvey/Culture-aware.html",'Culture','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCulture >12 && labelCulture <=18){
								window.open("/limesurvey/Culture-managed.html",'Culture','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCulture >18 && labelCulture <=24){
								window.open("/limesurvey/Culture-engaged.html",'Culture','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelCulture >24 && labelCulture <=30){
								window.open("/limesurvey/Culture-leading.html",'Culture','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;	
                    case 'Lifecycle Management':
					var labelcons = opt.w.globals.series[0][0];						
						if(labelcons<=6){
							window.open("/limesurvey/lifecyclemgt-adhoc.html",'Lifecycle','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>6 && labelcons <=12){
								window.open("/limesurvey/lifecyclemgt-aware.html",'Lifecycle','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>12 && labelcons <=18){
								window.open("/limesurvey/lifecyclemgt-managed.html",'Lifecycle','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>18 && labelcons <=24){
								window.open("/limesurvey/lifecyclemgt-engaged.html",'Lifecycle','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>24 && labelcons <=30){
								window.open("/limesurvey/lifecyclemgt-leading.html",'Lifecycle','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Risk Management':
					var labelcons = opt.w.globals.series[0][1];						
						if(labelcons<=6){
							window.open("/limesurvey/riskmgt-adhoc.html",'Risk','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>6 && labelcons <=12){
								window.open("/limesurvey/riskmgt-aware.html",'Risk','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>12 && labelcons <=18){
								window.open("/limesurvey/riskmgt-managed.html",'Risk','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>18 && labelcons <=24){
								window.open("/limesurvey/riskmgt-engaged.html",'Risk','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>24 && labelcons <=30){
								window.open("/limesurvey/riskmgt-leading.html",'Risk','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Compliance and Assurance Management':
					var labelcons = opt.w.globals.series[0][2];						
						if(labelcons<=6){
							window.open("/limesurvey/compliancemgt-adhoc.html",'Compliance','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>6 && labelcons <=12){
								window.open("/limesurvey/compliancemgt-aware.html",'Compliance','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>12 && labelcons <=18){
								window.open("/limesurvey/compliancemgt-managed.html",'Compliance','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>18 && labelcons <=24){
								window.open("/limesurvey/compliancemgt-engaged.html",'Compliance','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>24 && labelcons <=30){
								window.open("/limesurvey/compliancemgt-leading.html",'Compliance','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Security Management':
					var labelcons = opt.w.globals.series[0][3];						
						if(labelcons<=6){
							window.open("/limesurvey/securitymgt-adhoc.html",'Security','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>6 && labelcons <=12){
								window.open("/limesurvey/securitymgt-aware.html",'Security','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>12 && labelcons <=18){
								window.open("/limesurvey/securitymgt-managed.html",'Security','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>18 && labelcons <=24){
								window.open("/limesurvey/securitymgt-engaged.html",'Security','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>24 && labelcons <=30){
								window.open("/limesurvey/securitymgt-leading.html",'Security','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;					
                    case 'Consumption':
					var labelcons = opt.w.globals.series[0][0];						
						if(labelcons<=6){
							window.open("/limesurvey/consumption-adhoc.html",'consumption','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>6 && labelcons <=12){
								window.open("/limesurvey/consumption-aware.html",'consumption','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>12 && labelcons <=18){
								window.open("/limesurvey/consumption-managed.html",'consumption','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>18 && labelcons <=24){
								window.open("/limesurvey/consumption-engaged.html",'consumption','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcons>24 && labelcons <=30){
								window.open("/limesurvey/consumption-leading.html",'consumption','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Contribution':
					var labelcontrib = opt.w.globals.series[0][1];
						if(labelcontrib<=6){
							window.open("/limesurvey/contribution-adhoc.html",'contribution','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>6 && labelcontrib <=12){
								window.open("/limesurvey/contribution-aware.html",'contribution','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>12 && labelcontrib <=18){
								window.open("/limesurvey/contribution-managed.html",'contribution','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>18 && labelcontrib <=24){
								window.open("/limesurvey/contribution-engaged.html",'contribution','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelcontrib>24 && labelcontrib <=30){
								window.open("/limesurvey/contribution-leading.html",'contribution','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};
					break;
                    case 'Publication':
						var labelpub = opt.w.globals.series[0][2];
						if(labelpub<=6){
							window.open("/limesurvey/publication-adhoc.html",'Publication','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>6 && labelpub <=12){
								window.open("/limesurvey/publication-aware.html",'Publication','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>12 && labelpub <=18){
								window.open("/limesurvey/publication-managed.html",'Publication','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>18 && labelpub <=24){
								window.open("/limesurvey/publication-engaged.html",'Publication','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelpub>24 && labelpub <=30){
								window.open("/limesurvey/publication-leading.html",'Publication','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						};						
					break;
                    case 'InnerSource':
						var labelinrsrc = opt.w.globals.series[0][3];
						if(labelinrsrc<=6){
							window.open("/limesurvey/innersource-adhoc.html",'InnerSource','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>6 && labelinrsrc <=12){
								window.open("/limesurvey/innersource-aware.html",'InnerSource','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>12 && labelinrsrc <=18){
								window.open("/limesurvey/innersource-managed.html",'InnerSource','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>18 && labelinrsrc <=24){
								window.open("/limesurvey/innersource-engaged.html",'InnerSource','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
						}else if(labelinrsrc>24 && labelinrsrc <=30){
								window.open("/limesurvey/innersource-leading.html",'InnerSource','width=950, height=400, scrollbars=no,titlebar=0,toolbar=0');
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
                mylable = mylable+':'+"Ad-hoc";
            } else if (val > 6 && val <= 12) {
                mylable = mylable+':'+"Aware";
            } else if (val > 12 && val <= 18) {
                mylable = mylable+':'+ "Managed";
            } else if (val > 18 && val <= 24) {
                mylable = mylable+':'+"Engaged";
            } else if (val > 24 && val <= 30) {
                mylable = mylable+':'+"Leading";
            }
            // return opt.w.globals.labels[opt.dataPointIndex] + ":" + mylable
			return mylable
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
            'Strategy': ['Goals,Objectives and Resources', 'Corporate Alignment', 'Community and Ecosystem Engagement','Operations','Culture'],
            'Management': ['Lifecycle Management', 'Risk Management', 'Compliance and Assurance Management', 'Security Management'],
            'Usage': ['Consumption', 'Contribution', 'Publication','InnerSource']
        },
		labels: {
            show: true
        },		
	  min: 0,
      max: 30,
	  tickAmount: 5,		
    },
    yaxis: {
        labels: {
            show: false,
            formatter: function (val, opt) {
                var mlable='';
                if (val == 'Goals,Objectives and Resources' || val == 'Corporate Alignment' || val == 'Community and Ecosystem Management' || val == 'Community and Ecosystem Management' || val == 'Operations' || val == 'Culture') {
                    mlable = val//+":"+"Strategy";
                } else if (val == 'Lifecycle Management' || val == 'Risk Management' || val == 'Compliance and Assurance Management' || val == 'Security Management') {
                    mlable = val//+":"+"Management";
                } else if (val == 'Consumption' || val == 'Contribution' || val == 'Publication' || val == 'InnerSource') {
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



