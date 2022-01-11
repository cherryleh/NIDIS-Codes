const CSV = "RS04-ndvi.csv"

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
        y1.push(row["NDVI"]);
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
    let traces2 = [
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
    let layout2 = {
        title: "Evapotranspiration",
        yaxis: {
            range: [-10, 80]
        },
        xaxis: {
            rangeselector: selectorOptions,
            rangeslider: {}
        },
    };
    let config2 = { 
        responsive: true,
        displayModeBar: true,
    };

                

    Plotly.newPlot("ndvi", traces2, layout2, config2);
}
plotFromCSV();


