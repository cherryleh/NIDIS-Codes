var url1 = './ranches/RS04/RS04_rf_month.csv';


var url2 = './ranches/RS04/RS04_rf_12m.csv';

var url3 = './ranches/RS04/RS04_ndvi_month.csv';


var url4 = './ranches/RS04/RS04_ndvi_12m.csv';

var url5 = './ranches/RS04/RS04_et_hist.csv';

var url6 = './ranches/RS04/RS04_ndvi_hist.csv';

var url7 = './ranches/RS04/RS04_et_month.csv';

var url8 = './ranches/RS04/RS04_et_12m.csv';

var url9 = './ranches/RS04/RS04_rf_hist.csv';

var url10 = './ranches/RS04/RS04_spiPOS.csv';
var url11 = './ranches/RS04/RS04_spiNEG.csv';


var selectorOptions = {
  buttons: [{
    step: 'month',
    stepmode: 'backward',
    count: 1,
    label: '1m',
    active:true
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





//Multi = stacked bar+line graph, Single = historical, one-line time series
function makeplot() {
  Plotly.d3.csv(url1, function (data) { processData(data, 'trace1', 'rolledMonth', 'RF', 'RF-div', 'multi') });
  Plotly.d3.csv(url2, function (data) { processData(data, 'trace2', 'Month', 'RF', 'RF-div', 'multi') });
  Plotly.d3.csv(url3, function (data) { processData(data, 'trace3', 'newMonth', 'NDVI', 'NDVI-div', 'multi') });
  Plotly.d3.csv(url4, function (data) { processData(data, 'trace4', 'Month', 'NDVI', 'NDVI-div', 'multi') });
  Plotly.d3.csv(url7, function (data) { processData(data, 'trace5', 'newMonth', 'ET', 'ET-div', 'multi') });
  Plotly.d3.csv(url8, function (data) { processData(data, 'trace6', 'Month', 'ET', 'ET-div', 'multi') });
  Plotly.d3.csv(url5, function (data) { processData(data, 'trace7', 'datetime', 'ET', 'ET-hist', 'single') });
  Plotly.d3.csv(url6, function (data) { processData(data, 'trace8', 'datetime', 'NDVI', 'NDVI-hist', 'single') });
  Plotly.d3.csv(url9, function (data) { processData(data, 'trace9', 'datetime', 'RF_in', 'RF-hist', 'single') });
  Plotly.d3.csv(url10, function (data) { processData(data, 'trace10', 'date', 'RF_in_scale_3_calculated_index', 'SPI-div') });
  Plotly.d3.csv(url11, function (data) { processData(data, 'trace11', 'date', 'RF_in_scale_3_calculated_index', 'SPI-div') });
};
//Process CSV
function processData(allRows, traceName, xFieldName, yFieldName, divName, mode) {
  let x = [];
  let y = [];

  for (var i = 0; i < allRows.length; i++) {
    row = allRows[i];

    x.push(row[xFieldName]);
    y.push(row[yFieldName]);

  }
  console.log(mode == 'multi', yFieldName == 'NDVI')
  if (mode == 'single') {
    makeSinglePlot(x, y, traceName, divName)

  } else if (mode == 'multi' && yFieldName == 'RF') {
    traces_RF[traceName].x = x;
    traces_RF[traceName].y = y;

    makeRFPlotly(traces_RF[traceName], divName);



  }
  else if (mode == 'multi' && yFieldName == 'NDVI') {
    traces_NDVI[traceName].x = x;
    traces_NDVI[traceName].y = y;
    makeNDVIPlotly(traces_NDVI[traceName], divName);

  }
  else if (mode == 'multi' && yFieldName == 'ET') {
    traces_ET[traceName].x = x;
    traces_ET[traceName].y = y;
    makeETPlotly(traces_ET[traceName], divName);

  }
  else if (divName == 'SPI-div') {
    traces_SPI[traceName].x = x;
    traces_SPI[traceName].y = y;

    makeSPIPlotly(traces_SPI[traceName], divName);
  }


}

function makeSinglePlot(x, y, yTraceName, divName) {
  var traces = [{
    x: x,
    y: y,
    name: yTraceName,
    marker: {
      color: '#007ea7'
    },

  }];
  var layout = {
    xaxis: {
      rangeselector: selectorOptions,
      rangeslider: {}
    },
    yaxis: {
      fixedrange: true,
      side: 'right'
    },
    margin: {
      l: 50,
      r: -50,
      b: 50,
      t: 30,
      pad: 4
    },
    yaxis: {
      fixedrange: true,
      side: 'left'
    },
    showlegend: false,


  };
  var config = { responsive: true };

  Plotly.newPlot(divName, traces, layout, config);
};

function makeNDVIPlotly(trace, divName) {
  var data = [trace];

  console.log(trace);
  var layout = {
    yaxis: {

      range: [0.4, 0.8]
    },
    margin: {
      l: 50,
      r: -50,
      b: 50,
      t: 30,
      pad: 4
    },

  };

  var config = { responsive: true };


  Plotly.plot(divName, data, layout, config);
}

function makeRFPlotly(trace, divName) {
  var data = [trace];

  console.log(trace);
  var layout = {

    margin: {
      l: 50,
      r: -50,
      b: 50,
      t: 30,
      pad: 4
    },

  };

  var config = { responsive: true };


  Plotly.plot(divName, data, layout, config);
}

function makeETPlotly(trace, divName) {
  var data = [trace];

  console.log(trace);
  var layout = {

    margin: {
      l: 50,
      r: -50,
      b: 50,
      t: 30,
      pad: 4
    },

  };

  var config = { responsive: true };


  Plotly.plot(divName, data, layout, config);
}

function makeSPIPlotly(trace, divName) {
  var data = [trace];

  console.log(trace);
  var layout = {
    xaxis: {
      rangeselector: selectorOptions,
      rangeslider: {}
    },
    yaxis: {
      fixedrange: true,
      side: 'right'
    },
    margin: {
      l: 50,
      r: -50,
      b: 50,
      t: 30,
      pad: 4
    },

  };

  var config = { responsive: true };

  Plotly.plot(divName, data, layout, config);
}

var traces_RF = {
  trace1: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'RF'
      }
    },
    // mode: 'markers', 
    type: 'bar',
    hoverinfo: 'y',
    name: 'Observed',
    hovertemplate: '%{y:.2f}',
    marker: {
      color: 'rgb(158,202,225)',
      opacity: 0.6,
      line: {
        color: 'rgb(8,48,107)',
        width: 1.5
      }
    }
  },
  trace2: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'RF'
      }
    },
    type: 'scatter',
    name: 'Monthly Average',
    hovertemplate: '%{y:.2f}',
    hoverinfo: 'y',
    marker: {
      color: '#f29a28',

    }
  },

}

var traces_NDVI = {
  trace3: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'NDVI'
      }
    },
    // mode: 'markers', 
    type: 'bar',
    hoverinfo: 'y',
    name: 'Observed',
    hovertemplate: '%{y:.2f}',
    marker: {
      color: 'rgb(158,202,225)',
      opacity: 0.6,
      line: {
        color: 'rgb(8,48,107)',
        width: 1.5
      }
    }
  },
  trace4: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'NDVI'
      }
    },
    type: 'scatter',
    name: 'Monthly Average',
    hovertemplate: '%{y:.2f}',
    hoverinfo: 'y',
    marker: {
      color: '#f29a28',

    }
  },

}

var traces_ET = {
  trace5: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'ET'
      }
    },
    // mode: 'markers', 
    type: 'bar',
    hoverinfo: 'y',
    name: 'Observed',
    hovertemplate: '%{y:.2f}',
    marker: {
      color: 'rgb(158,202,225)',
      opacity: 0.6,
      line: {
        color: 'rgb(8,48,107)',
        width: 1.5
      }
    }
  },
  trace6: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'ET'
      }
    },
    type: 'scatter',
    name: 'Monthly Average',
    hovertemplate: '%{y:.2f}',
    hoverinfo: 'y',
    marker: {
      color: '#f29a28',

    }
  },

}

var traces_SPI = {
  trace10: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'SPI'
      }
    },
    // mode: 'markers', 
    type: 'scatter',
    fill: 'tozeroy',
    fillcolor: 'lightblue',
    hoverinfo: 'y',
    name: 'Rainfall Index',
    hovertemplate: '%{y:.2f}',
    marker: {
      color: 'rgb(158,202,225)',
      opacity: 0.6,
      line: {
        color: 'red',
        width: 1.5
      }
    }
  },
  trace11: {
    meta: {
      columnNames: {
        x: 'Month',
        y: 'SPI'
      }
    },
    type: 'scatter',
    fill: 'tozeroy',
    fillcolor: 'lightred',
    name: 'Drought Index',
    hovertemplate: '%{y:.2f}',
    hoverinfo: 'y',
    marker: {
      color: '',

    }
  },

}

makeplot();

