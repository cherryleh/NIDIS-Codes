/*const CSV = "RS04-ET.csv"

function plotFromCSV() {
    Plotly.d3.csv(CSV, function(err, rows) {
        console.log(rows);
        processData(rows);
    });
}

function processData(allRows) {
    let x = [];
    let y1 = [];
    let row;
    let i = 0;
    while (i < allRows.length) {
        row = allRows[i];
        x.push(row["datetime"]);
        y1.push(row["ET"]);
        i += 1;
    }
            
    console.log("X", x);
    console.log("Y1", y1);
    makePlotly(x, y1,);
}

var selectorOptions = {
    buttons: [{
        step: 'month',
        stepmode: 'backward',
        count: 1,
        label: '1m'
    }, {
        step: 'month',
        stepmode: 'backward',
        count: 6,
        label: '6m'
    }, {
        step: 'year',
        stepmode: 'todate',
        count: 1,
        label: 'YTD'
    }, {
        step: 'year',
        stepmode: 'backward',
        count: 1,
        label: '1y'
    }, {
        step: 'all',
    }],
};

function makePlotly(x, y1) {
    let traces = [
        {
            x: x,
            y: y1,
            name: "Evapotranspiration",
            hovertemplate: 'Evapotranspiration: %{y}<extra></extra>',
            line: {
                color: "#387fba",
                width: 3
            }
                        
        }
    ];
    let layout = {
        title: "Evapotranspiration",
        yaxis: {
            range: [-10, 80]
        },
        xaxis: {
            rangeselector: selectorOptions,
            rangeslider: {}
        },
    };
    let config = { 
        responsive: true,
        displayModeBar: true,
    };

                

    Plotly.newPlot("et", traces, layout, config);
}
plotFromCSV();

*/
//sources: 
//
//calls of csv files: get csv data: https://plot.ly/javascript/ajax-call/
// handling various csv s https://community.plot.ly/t/how-to-merge-two-plotly-graphs-plotted-by-using-rest-url-for-csv-data/2122
//
// Range slider and time selectors: https://plot.ly/javascript/range-slider/
//
//Resonsive layout: 
//https://plot.ly/javascript/responsive-fluid-layout/
//https://codepen.io/etpinard/pen/NrrOrY?editors=1010 (responsive resize)
//
//https://plot.ly/javascript/plotlyjs-function-reference/
//
// layout axis: https://plot.ly/javascript/multiple-axes/
//
// add traces function: https://plot.ly/javascript/plotlyjs-function-reference/


// Place urls for cvs files here
var url1 = 'http://kapitalvalue.com/wp-content/uploads/2017/01/Old-Data-Baltic-Dry-Index.csv';
var x1SeriesName = 'x';
var y1SeriesName = 'y';
var y1NameToBeDisplayed = 'Old data sample';
var y1Mode = 'lines';


var url2 = "RS04-ET.csv";
var x2SeriesName = 'datetime';
var y2SeriesName = 'ET';
var y2NameToBeDisplayed = 'ET';
var y2Mode = 'lines';


//var url3 = 'XXXX';
//var url4 = 'XXXX';
//var url5 = 'XXXX';


// Section deals with buttons for time range selection
var selectorOptions = {
  buttons: [{
    step: 'month',
    stepmode: 'backward',
    count: 1,
    label: '1m'
  }, {
    step: 'month',
    stepmode: 'backward',
    count: 6,
    label: '6m'
  }, {
    step: 'year',
    stepmode: 'todate',
    count: 1,
    label: 'YTD'
  }, {
    step: 'year',
    stepmode: 'backward',
    count: 1,
    label: '1y'
  }, {
    step: 'all',
  }],
};

// set layout down here
var layout = {
  xaxis: {
    rangeselector: selectorOptions,
    rangeslider: {}
  },
  yaxis: {
    fixedrange: true,
    side: 'right'
  },
  showlegend: false
};

// set display options
var options ={
  showLink: false,
  displayModeBar: false
};

// Next piece of code deals with responsiveness
var d3 = Plotly.d3;
var WIDTH_IN_PERCENT_OF_PARENT = 100,
  HEIGHT_IN_PERCENT_OF_PARENT = 97;

var gd3 = d3.select("div[id='myDiv']")
  .style({
    width: WIDTH_IN_PERCENT_OF_PARENT + '%',
    'margin-left': (100 - WIDTH_IN_PERCENT_OF_PARENT) / 2 + '%',
    height: HEIGHT_IN_PERCENT_OF_PARENT + 'vh',
    'margin-top': (100 - HEIGHT_IN_PERCENT_OF_PARENT) / 2 + 'vh'
  });

var my_Div = gd3.node();

// main code, reads cvs files and creates traces and combine them in data

function makeplot() {
  Plotly.d3.csv(url2, function(data){ processData(data,x2SeriesName,y2SeriesName,y2NameToBeDisplayed) } );
};

function processData(allRows,xLabel,yLabel,yTraceName) {

  console.log(allRows.length);
  var x = [], y = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
 
    x.push(row[xLabel]);
    y.push(row[yLabel]);
    if(i === 0) {
      console.log(i);
      console.log(row);
    }
  }
  makePlotly( x, y,  yTraceName);
}

function makePlotly( x, y, yTraceName){
  var traces = [{
    x: x,
    y: y,
    name: yTraceName
  }];

  Plotly.newPlot(myDiv, traces,layout,options);
};

makeplot();

//instruction resizes plot
window.onresize = function() {
  Plotly.Plots.resize(my_Div);
};