// greeting
var today = new Date()
var curHr = today.getHours()

if (curHr >= 0 && curHr < 4) {
    document.getElementById("greeting").innerHTML = 'Boa Noite';
} else if (curHr >= 4 && curHr < 12) {
    document.getElementById("greeting").innerHTML = 'Bom dia';
} else if (curHr >= 12 && curHr < 16) {
    document.getElementById("greeting").innerHTML = 'Boa tarde';
} else {
    document.getElementById("greeting").innerHTML = 'Boa Noite';
}
// time 
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    // var s = today.getSeconds();
    var ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12;
    h = h ? h : 12;
    m = checkTime(m);
    // s = checkTime(s);
    document.getElementById('txt').innerHTML =
        h + ":" + m + ' ' + ampm;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

// currently sale

var des = document.getElementById("des").innerHTML;
var des2 = document.getElementById("des2").innerHTML;
var des3 = document.getElementById("des3").innerHTML;
var des4 = document.getElementById("des4").innerHTML;
var des5 = document.getElementById("des5").innerHTML;
var des6 = document.getElementById("des6").innerHTML;
var des7 = document.getElementById("des7").innerHTML;
var des8 = document.getElementById("des8").innerHTML;
var des9 = document.getElementById("des9").innerHTML;
var des10 = document.getElementById("des10").innerHTML;
var des11 = document.getElementById("des11").innerHTML;
var des12 = document.getElementById("des12").innerHTML;
var des13 = document.getElementById("des13").innerHTML;

var rec = Number(document.getElementById("rec"));
var rec2 = Number(document.getElementById("rec2"));
var rec3 = Number(document.getElementById("rec3"));
var rec4 = Number(document.getElementById("rec4"));
var rec5 = document.getElementById("rec5").innerHTML;
var rec6 = document.getElementById("rec6").innerHTML;
var rec7 = document.getElementById("rec7").innerHTML;
var rec8 = document.getElementById("rec8").innerHTML;
var rec9 = document.getElementById("rec9").innerHTML;
var rec10 = document.getElementById("rec10").innerHTML;
var rec11 = document.getElementById("rec11").innerHTML;
var rec12 = document.getElementById("rec12").innerHTML;
var rec13 = document.getElementById("rec13").innerHTML;

var demo = document.getElementById("demo").innerHTML;
var demo2 = document.getElementById("demo2").innerHTML;
var demo3 = document.getElementById("demo3").innerHTML;
var demo4 = document.getElementById("demo4").innerHTML;
var demo5 = document.getElementById("demo5").innerHTML;
var demo6 = document.getElementById("demo6").innerHTML;
var demo7 = document.getElementById("demo7").innerHTML;
var demo8 = document.getElementById("demo8").innerHTML;
var demo9 = document.getElementById("demo9").innerHTML;
var demo10 = document.getElementById("demo10").innerHTML;
var demo11 = document.getElementById("demo11").innerHTML;
var demo12 = document.getElementById("demo12").innerHTML;
var demo13 = document.getElementById("demo13").innerHTML;


var options = {
    series: [{
        name: 'Receita',
        data: [rec13, rec12, rec11, rec10, rec9, rec8, rec7, rec6, rec5, rec4, rec3, rec2, rec]
    }, {
        name: 'Despesa',
        data: [des13, des12, des11, des10, des9, des8, des7, des6, des5, des4, des3, des2, des]
    }],
    chart: {
        height: 240,
        type: 'area',
        toolbar: {
            show: false
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'category',
        low: 0,
        offsetX: 0,
        offsetY: 0,
        show: false,
        categories: [demo13, demo12, demo11, demo10, demo9, demo8, demo7, demo6, demo5, demo4, demo3, demo2, demo],
        labels: {
            low: 0,
            offsetX: 0,
            show: false,
        },
        axisBorder: {
            low: 0,
            offsetX: 0,
            show: false,
        },
    },
    markers: {
        strokeWidth: 3,
        colors: "#ffffff",
        strokeColors: [ CubaAdminConfig.primary , CubaAdminConfig.secondary ],
        hover: {
            size: 6,
        }
    },
    yaxis: {
        low: 0,
        offsetX: 0,
        offsetY: 0,
        show: false,
        labels: {
            low: 0,
            offsetX: 0,
            show: false,
        },
        axisBorder: {
            low: 0,
            offsetX: 0,
            show: false,
        },
    },
    grid: {
        show: false,
        padding: {
            left: 0,
            right: 0,
            bottom: -15,
            top: -40
        }
    },
    colors: [ CubaAdminConfig.primary , CubaAdminConfig.secondary ],
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.5,
            stops: [0, 80, 100]
        }
    },
    legend: {
        show: false,
    },
    tooltip: {
        x: {
            format: 'MM'
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart-currently"), options);
chart.render();


//small chart-1

new Chartist.Bar('.small-chart', {
    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7'],
    series: [
        [400, 900, 800, 1000, 700, 1200, 300],
        [1000, 500, 600, 400, 700, 200, 1100]
    ]
}, {
    plugins: [
        Chartist.plugins.tooltip({
            appendToBody: false,
            className: "ct-tooltip"
        })
    ],
    stackBars: true,
    axisX: {
        showGrid: false,
        showLabel: false,
        offset: 0
    },
    axisY: {
        low: 0,
        showGrid: false,
        showLabel: false,
        offset: 0,
        labelInterpolationFnc: function (value) {
            return (value / 1000) + 'k';
        }
    }
}).on('draw', function (data) {
    if (data.type === 'bar') {
        data.element.attr({
            style: 'stroke-width: 3px'
        });
    }
});

//small-2

new Chartist.Bar('.small-chart1', {
    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7'],
    series: [
        [400, 600, 900, 800, 1000, 1200, 500],
        [1000, 800, 500, 600, 400, 200, 900]
    ]
}, {
    plugins: [
        Chartist.plugins.tooltip({
            appendToBody: false,
            className: "ct-tooltip"
        })
    ],
    stackBars: true,
    axisX: {
        showGrid: false,
        showLabel: false,
        offset: 0
    },
    axisY: {
        low: 0,
        showGrid: false,
        showLabel: false,
        offset: 0,
        labelInterpolationFnc: function (value) {
            return (value / 1000) + 'k';
        }
    }
}).on('draw', function (data) {
    if (data.type === 'bar') {
        data.element.attr({
            style: 'stroke-width: 3px'
        });
    }
});
// small-3

new Chartist.Bar('.small-chart2', {
    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7'],
    series: [
        [1100, 900, 600, 1000, 700, 1200, 300],
        [300, 500, 800, 400, 700, 200, 1100]
    ]
}, {
    plugins: [
        Chartist.plugins.tooltip({
            appendToBody: false,
            className: "ct-tooltip"
        })
    ],
    stackBars: true,
    axisX: {
        showGrid: false,
        showLabel: false,
        offset: 0
    },
    axisY: {
        low: 0,
        showGrid: false,
        showLabel: false,
        offset: 0,
        labelInterpolationFnc: function (value) {
            return (value / 1000) + 'k';
        }
    }
}).on('draw', function (data) {
    if (data.type === 'bar') {
        data.element.attr({
            style: 'stroke-width: 3px'
        });
    }
});
// small-4
new Chartist.Bar('.small-chart3', {
    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7'],
    series: [
        [400, 600, 800, 1000, 700, 1100, 300],
        [1000, 500, 600, 300, 700, 200, 1100]
    ]
}, {
    plugins: [
        Chartist.plugins.tooltip({
            appendToBody: false,
            className: "ct-tooltip"
        })
    ],
    stackBars: true,
    axisX: {
        showGrid: false,
        showLabel: false,
        offset: 0
    },
    axisY: {
        low: 0,
        showGrid: false,
        showLabel: false,
        offset: 0,
        labelInterpolationFnc: function (value) {
            return (value / 1000) + 'k';
        }
    }
}).on('draw', function (data) {
    if (data.type === 'bar') {
        data.element.attr({
            style: 'stroke-width: 3px'
        });
    }
});

// right-side-small-chart

(function ($) {
    "use strict";
    $(".knob1").knob({

        'width': 65,
        'height': 65,
        'max': 100,

        change: function (value) {
            //console.log("change : " + value);
        },
        release: function (value) {
            //console.log(this.$.attr('value'));
            console.log("release : " + value);
        },
        cancel: function () {
            console.log("cancel : ", this);
        },
        format: function (value) {
            return value + '%';
        },
        draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

                this.cursorExt = 1;

                var a = this.arc(this.cv)  // Arc
                    , pa                   // Previous arc
                    , r = 1;

                this.g.lineWidth = this.lineWidth;

                if (this.o.displayPrevious) {
                    pa = this.arc(this.v);
                    this.g.beginPath();
                    this.g.strokeStyle = this.pColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });
    // Example of infinite knob, iPod click wheel
    var v, up = 0, down = 0, i = 0
        , $idir = $("div.idir")
        , $ival = $("div.ival")
        , incr = function () { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
        , decr = function () { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
    $("input.infinite").knob(
        {
            min: 0
            , max: 20
            , stopper: false
            , change: function () {
                if (v > this.cv) {
                    if (up) {
                        decr();
                        up = 0;
                    } else { up = 1; down = 0; }
                } else {
                    if (v < this.cv) {
                        if (down) {
                            incr();
                            down = 0;
                        } else { down = 1; up = 0; }
                    }
                }
                v = this.cv;
            }
        });
})(jQuery);

// market value chart
var options1 = {
    chart: {
        height: 380,
        type: 'radar',
        toolbar: {
            show: false
        },
    },
    series: [{
        name: 'Market value',
        data: [20, 100, 40, 30, 50, 80, 33],
    }],
    stroke: {
        width: 3,
        curve: 'smooth',
    },
    labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
    plotOptions: {
        radar: {
            size: 140,
            polygons: {
                fill: {
                    colors: ['#fcf8ff', '#f7eeff']
                },
                
            }
        }
    },
    colors: [ CubaAdminConfig.primary ],
    
    markers: {
        size: 6,
        colors: ['#fff'],
        strokeColor: CubaAdminConfig.primary,
        strokeWidth: 3,
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val
            }   
        }
    },
    yaxis: {
        tickAmount: 7,
        labels: {
            formatter: function(val, i) {
                if(i % 2 === 0) {
                    return val
                } else {
                    return ''
                }
            }
        }
    }
}

var chart1 = new ApexCharts(
    document.querySelector("#marketchart"),
    options1
);

chart1.render();
