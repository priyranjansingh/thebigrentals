<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>

<script>
    var subscription_data = new Array();
    var subscription_data = <?php echo json_encode($subscription_data); ?>;
    var income_data = <?php echo json_encode($income_data); ?>;
    var property_data = <?php echo json_encode($property_data); ?>;
    $(function() {
        $('#container1').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null, //null,
                plotShadow: false
            },
            lang: {
                noData: "No Data Found"
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    color: '#303030'
                }
            },
            title: {
                text: 'Monthlywise Subscription'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} K</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        distance: -20,
                        format: '{point.percentage:.1f} %',
                        inside: true,
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Share',
                    data: subscription_data,
                }]
        });
    });

</script>   
<script>
    $(function() {
        $('#container2').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null, //null,
                plotShadow: false
            },
            lang: {
                noData: "hjhj"
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    color: '#303030'
                }
            },
            title: {
                text: 'Monthlywise Income'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} K</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        distance: -20,
                        format: '{point.percentage:.1f} %',
                        inside: true,
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Share',
                    data: income_data
                }]
        });
    });

</script>  
<script>
    $(function() {
        $('#container3').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null, //null,
                plotShadow: false
            },
            lang: {
                noData: "hjhj"
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    color: '#303030'
                }
            },
            title: {
                text: 'Monthlywise Property Listing'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} K</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        distance: -20,
                        format: '{point.percentage:.1f} %',
                        inside: true,
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Share',
                    data: property_data
                }]
        });
    });

</script>  
<script>
    $(function() {
        $('#container4').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null, //null,
                plotShadow: false
            },
            lang: {
                noData: "hjhj"
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '15px',
                    color: '#303030'
                }
            },
            title: {
                text: 'Top Packages Sold'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} K</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        distance: -20,
                        format: '{point.percentage:.1f} %',
                        inside: true,
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Share',
                    data: [["Unknown Location", 200], ["Littoral", 95], ["North", 112], ["Centre", 75], ["Southwest", 70], ["West", 72], ["Far North", 88], ["Adamawa", 67], ["East", 81], ["Northwest", 80], ["South", 67]]
                }]
        });
    });

</script>  
<script src="<?php echo Yii::app()->baseUrl; ?>/js/highcharts.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/no-data-to-display.js"></script>
<div style="border:0px solid red;">
    <span class="year_span">
        Year : 
    </span>
    <span>
        <select id="chart_year">
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
        </select>
    </span>
</div>
<script>
    $(document).ready(function() {
        $("#chart_year").change(function() {
            var year = $("#chart_year").val();
            $.ajax({
                url: "<?php echo Yii::app()->baseUrl; ?>/admin/default/chart/",
                type: "POST",
                dataType: 'json',
                data: {year: year},
                success: function(data) {
                    //$("#loading").hide();
                    //$(".loder").hide();
                    // chart1 redrawing
                    var subscription_data = new Array();
                    var income_data = new Array();
                    var property_data = new Array();
                    subscription_data = data.subscription;
                    income_data = data.income;
                    property_data = data.property;

                    $('#container1').highcharts().destroy();
                    $('#container1').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null, //null,
                            plotShadow: false
                        },
                        lang: {
                            noData: "No data"
                        },
                        noData: {
                            style: {
                                fontWeight: 'bold',
                                fontSize: '15px',
                                color: '#303030'
                            }
                        },
                        title: {
                            text: 'Monthlywise Subscription'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y} K</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    distance: -20,
                                    format: '{point.percentage:.1f} %',
                                    inside: true,
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                                    }
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                                type: 'pie',
                                name: 'Share',
                                data: subscription_data
                            }]
                    });
                    // end of chart1 redrawing

                    // start of chart2 redrawing
                    $('#container2').highcharts().destroy();
                    $('#container2').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null, //null,
                            plotShadow: false
                        },
                        lang: {
                            noData: "No Data"
                        },
                        noData: {
                            style: {
                                fontWeight: 'bold',
                                fontSize: '15px',
                                color: '#303030'
                            }
                        },
                        title: {
                            text: 'Monthlywise Income'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y} K</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    distance: -20,
                                    format: '{point.percentage:.1f} %',
                                    inside: true,
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                                    }
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                                type: 'pie',
                                name: 'Share',
                                data: income_data
                            }]
                    });


                    // end of chart2 redrawing

                    // start of chart3 redrawing
                    $('#container3').highcharts().destroy();
                    $('#container3').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null, //null,
                            plotShadow: false
                        },
                        lang: {
                            noData: "No Data"
                        },
                        noData: {
                            style: {
                                fontWeight: 'bold',
                                fontSize: '15px',
                                color: '#303030'
                            }
                        },
                        title: {
                            text: 'Monthlywise Property Listing'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.y} K</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    distance: -20,
                                    format: '{point.percentage:.1f} %',
                                    inside: true,
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                                    }
                                },
                                showInLegend: true
                            }
                        },
                        series: [{
                                type: 'pie',
                                name: 'Share',
                                data: property_data
                            }]
                    });

                    // end of chart3 redrawing



                }
            });
        });
    });
</script>    

<div id="container1" style="margin-top:50px;float:left;border:0px solid red;min-width: 450px; height: 440px;; max-width: 600px; "></div>
<div id="container2" style="margin-top:50px;float:left;border:0px solid red;min-width: 450px; height: 440px;; max-width: 600px; "></div>
<div id="container3" style="margin-top:50px;float:left;border:0px solid red;min-width: 450px; height: 440px;; max-width: 600px; "></div>
<div id="container4" style="margin-top:50px;float:left;border:0px solid red;min-width: 450px; height: 440px;; max-width: 600px; "></div>
