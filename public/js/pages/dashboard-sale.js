'use strict';
$(document).ready(function() {
    setTimeout(function() {
        floatchart()
    }, 700);
    // [ campaign-scroll ] start
    var px = new PerfectScrollbar('.feed-scroll', {
        wheelSpeed: .5,
        swipeEasing: 0,
        wheelPropagation: 1,
        minScrollbarLength: 40,
    });
    var px = new PerfectScrollbar('.pro-scroll', {
        wheelSpeed: .5,
        swipeEasing: 0,
        wheelPropagation: 1,
        minScrollbarLength: 40,
    });
    // [ campaign-scroll ] end
});

function floatchart() {
    // [ support-chart ] start
    $(function() {
        var options1 = {
            chart: {
                type: 'area',
                height: 85,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#7267EF"],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                data: [0, 20, 10, 45, 30, 55, 20, 30, 0]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return 'Ticket '
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        new ApexCharts(document.querySelector("#support-chart"), options1).render();
        var options2 = {
            chart: {
                type: 'bar',
                height: 85,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#7267EF"],
            plotOptions: {
                bar: {
                    columnWidth: '70%'
                }
            },
            series: [{
                data: consumo
            }],
            xaxis: {
                categories: meses
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: true
                },
                y: {
                    title: {
                        formatter: function(seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: true
                }
            }
        }
        new ApexCharts(document.querySelector("#support-chart1"), options2).render();
    });
    // [ support-chart ] end
    // [ Consumo de Agua ] start
    $(function() {
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    stacked: false,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#7267EF', '#c7d9ff'],
                series: [{
                    name: 'Consumo Total',
                    type: 'column',
                    data: consumoAgua
                }],
                fill: {
                    opacity: [0.85, 1],
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: mesesAgua
                    //type: 'datetime'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return "" +y.toFixed(0);
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#consumo-agua"),
                options
            );
            chart.render();
        });
    });
    // [ Consumo de Agua ] end

    // [ Consumo de Diesel ] start
    $(function() {
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    stacked: false,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#7267EF', '#c7d9ff'],
                series: [{
                    name: 'Consumo Total',
                    type: 'column',
                    data: consumoDiesel
                }],
                fill: {
                    opacity: [0.85, 1],
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: mesesDiesel
                    //type: 'datetime'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return "" +y.toFixed(0);
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#consumo-diesel"),
                options
            );
            chart.render();
        });
    });
    // [ Consumo de Diesel ] end

    // [ Consumo de Energia ] start
    $(function() {
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    stacked: false,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#7267EF', '#c7d9ff'],
                series: [{
                    name: 'Consumo Total',
                    type: 'column',
                    data: consumoEner
                }],
                fill: {
                    opacity: [0.85, 1],
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: mesesEner
                    //type: 'datetime'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return "" +y.toFixed(0);
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#consumo-ener"),
                options
            );
            chart.render();
        });
    });
    // [ Consumo de Energia ] end

    
    // [ Consumo de Gas ] start
    $(function() {
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    stacked: false,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#7267EF', '#c7d9ff'],
                series: [{
                    name: 'Consumo Total',
                    type: 'column',
                    data: consumoGas
                }],
                fill: {
                    opacity: [0.85, 1],
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: mesesGas
                    //type: 'datetime'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return "" +y.toFixed(0);
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#consumo-gas"),
                options
            );
            chart.render();
        });
    });
    // [ Consumo de Gas ] end
    
    // [ Consumo de Papel ] start
    $(function() {
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    stacked: false,
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#7267EF', '#c7d9ff'],
                series: [{
                    name: 'Consumo Total',
                    type: 'column',
                    data: consumoPapel
                }],
                fill: {
                    opacity: [0.85, 1],
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: mesesPapel
                    //type: 'datetime'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return "" +y.toFixed(0);
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#consumo-papel"),
                options
            );
            chart.render();
        });
    });
    // [ Consumo de Energia ] end
    // [ Consumo Anual ] start
    $(function() {
        $(function() {
            var options = {
                series: [{
                name: 'Consumo Agua',
                data: consumoAgua
              }, {
                name: 'Consumo Diesel',
                data: consumoDiesel
              }, {
                name: 'Consumo Energia',
                data: consumoEner
              }, {
                name: 'Consumo Gasolina',
                data: consumoGas
              }, {
                name: 'Consumo Papel',
                data: consumoPapel
              }
            ],
                chart: {
                type: 'bar',
                height: 350
              },
              plotOptions: {
                bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  //endingShape: 'rounded'
                },
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
              },
              xaxis: {
                categories: mesesAgua,
              },
              yaxis: {
                title: {
                  text: 'Consumo por año'
                }
              },
              fill: {
                opacity: 1
              },
              tooltip: {
                y: {
                  formatter: function (val) {
                    return "Consumo Total:" + val + ""
                  }
                }
              }
              };
      
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
            
        });
    });
    // [ Consumo Anual ] end
    // [ satisfaction-chart ] start
    $(function() {
        var options = {
            chart: {
                height: 260,
                type: 'pie',
            },
            series: [66, 50, 40, 30],
            labels: ["extremely Satisfied", "Satisfied", "Poor", "Very Poor"],
            legend: {
                show: true,
                offsetY: 50,
            },
            dataLabels: {
                enabled: true,
                dropShadow: {
                    enabled: false,
                }
            },
            theme: {
                monochrome: {
                    enabled: true,
                    color: '#7267EF',
                }
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        height: 320,

                    },
                    legend: {
                        position: 'bottom',
                        offsetY: 0,
                    }
                }
            }]
        }
        var chart = new ApexCharts(document.querySelector("#satisfaction-chart"), options);
        chart.render();
    });
    // [ satisfaction-chart ] end
    $(function() {
        var options = {
            series: [{
            name: 'Series 1',
            data: consumo,
          }],
            chart: {
            height: 350,
            type: 'radar',
          },
          title: {
            text: 'Basic Radar Chart'
          },
          xaxis: {
            categories: meses
          }
          };
  
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();
    });
}
