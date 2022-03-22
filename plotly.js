var url1 = './Plotly/ranchAverages/RS04_ETmonthavg.csv';


var url2 = './Plotly/ranchAverages/RS04_ET-last12m.csv';

var url3 = './Plotly/ranchAverages/RS04_NDVImonthavg.csv';


var url4 = './Plotly/ranchAverages/RS04_NDVI-last12m.csv';

var url5 = './Plotly/RS04-ET.csv';

var url6 = './Plotly/RS04-ndvi.csv';

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


        function makeplot() {
          Plotly.d3.csv(url1, function(data){ processData(data, 'trace1', 'newMonth', 'newET','myDiv1','multi') } );
          Plotly.d3.csv(url2, function(data){ processData(data, 'trace2', 'Month', 'ET', 'myDiv1','multi') } );
          Plotly.d3.csv(url3, function(data){ processData(data, 'trace3', 'newMonth', 'NDVI','myDiv2','multi') } );
          Plotly.d3.csv(url4, function(data){ processData(data, 'trace4', 'Month', 'NDVI', 'myDiv2','multi') } );
          Plotly.d3.csv(url5, function(data){ processData(data, 'trace5', 'datetime', 'ET', 'ET-hist','single') } );
          Plotly.d3.csv(url6, function(data){ processData(data, 'trace6', 'datetime', 'NDVI', 'NDVI-hist','single') } );
        };

        function processData(allRows, traceName, xFieldName, yFieldName, divName, mode) {
            let x = [];
            let y = [];

            for (var i=0; i<allRows.length; i++) {
                row = allRows[i];
                
                x.push(row[xFieldName]);
                y.push(row[yFieldName]);
                
            }
            console.log(mode == 'multi', yFieldName == 'NDVI')
            if(mode == 'single'){
                makeSinglePlot( x, y,  traceName, divName)
               
            } else if (mode=='multi' && yFieldName =='NDVI'){
              traces_NDVI[traceName].x = x;
              traces_NDVI[traceName].y = y;
              makeNDVIPlotly(traces_NDVI[traceName]);


            } else{
              traces_ET[traceName].x = x;
              traces_ET[traceName].y = y;

              makeETPlotly(traces_ET[traceName]);
              
            }


        }
        
        function makeSinglePlot( x, y, yTraceName, divName){
            var traces = [{
              x: x,
              y: y,
              name: yTraceName,
              marker: {
                color: '#007ea7'},
                
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
              var config = {responsive: true};
            Plotly.newPlot(divName,traces,layout, config);
          };

          function makeNDVIPlotly(trace) {
            var data = [trace];
          
            console.log(trace);
            var layout = {
              yaxis:{
                
                autorange:true
              },
              margin: {
                l: 50,
                r: -50,
                b: 50,
                t: 30,
                pad: 4
              },

            };

            var config = {responsive: true};

                  
            Plotly.plot('NDVI-div', data, layout,config);
        }

        function makeETPlotly(trace) {
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

            var config = {responsive: true};

                    
            Plotly.plot('ET-div', data, layout,config);
        }


        
        var traces_ET = {
            trace1: {
             meta: {columnNames: {
                 x: 'Month', 
                 y: 'ET'
               }}, 
             // mode: 'markers', 
             type: 'bar',  
             hoverinfo:'y',
             name: 'Monthly Averages',
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
            meta: {columnNames: {
                x: 'Month', 
                y: 'ET'
                }},  
            type: 'scatter', 
            name: 'Climatology',
            hovertemplate: '%{y:.2f}',
            hoverinfo:'y',
            marker: {
              color: '#f29a28',
              
            }
            },

        }

        var traces_NDVI = {
          trace3: {
           meta: {columnNames: {
               x: 'Month', 
               y: 'NDVI'
             }}, 
           // mode: 'markers', 
           type: 'bar',  
           hoverinfo:'y',
           name: 'Monthly Averages',
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
          meta: {columnNames: {
              x: 'Month', 
              y: 'NDVI'
              }},  
          type: 'scatter', 
          name: 'Climatology',
          hovertemplate: '%{y:.2f}',
          hoverinfo:'y',
          marker: {
            color: '#f29a28',
            
          }
          },

      }
        
        
        makeplot();

        