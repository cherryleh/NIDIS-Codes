var url1 = './ranchAverages/RS01_ETaverage.csv';


var url2 = './ranchAverages/RS01_ETmonthlyavg.csv';

var url3 = 'RS04-ET.csv';



var url4 = 'RS04-ndvi.csv';


        function makeplot() {
          Plotly.d3.csv(url1, function(data){ processData(data, 'trace1', 'Month1', 'ET1','myDiv1','multi') } );
          Plotly.d3.csv(url2, function(data){ processData(data, 'trace2', 'Month2', 'ET2', 'myDiv1','multi') } );
          Plotly.d3.csv(url3, function(data){ processData(data, 'trace3', 'datetime', 'ET', 'myDiv2','single') } );
          Plotly.d3.csv(url4, function(data){ processData(data, 'trace4', 'datetime', 'NDVI', 'myDiv3','single') } );
        };

        function processData(allRows, traceName, xFieldName, yFieldName, divName, mode) {
            let x = [];
            let y = [];

            for (var i=0; i<allRows.length; i++) {
                row = allRows[i];
                
                x.push(row[xFieldName]);
                y.push(row[yFieldName]);
                
            }
            //if traceName = trace3 or trace4 (if 'mode' = single), makePlotly( xFieldname, yFieldname,  yTraceName, divName);
            
            if(mode == 'single'){
                makePlotly2( x, y,  traceName, divName)
            }

            
            
            traces[traceName].x = x;
            traces[traceName].y = y;

            makePlotly(traces[traceName]);
        }
        
        function makePlotly2( x, y, yTraceName, divName){
            var traces = [{
              x: x,
              y: y,
              name: yTraceName
            }];
            var layout = {

                yaxis: {
                  fixedrange: true,
                  side: 'right'
                },
                showlegend: false
              };
            Plotly.newPlot(divName,traces,layout);
          };

        function makePlotly(trace) {
            var data = [trace];
            
            console.log(trace);
                    
            var  layout = {
              xaxis: {
                type: 'category', 
                range: [-0.5, 11.5], 
                autorange: true
              }, 
              yaxis: {
                type: 'linear', 
                range: [0, 36.68745091942375], 
                autorange: true
              }, 
              autosize: true, 
              template: {
                data: {
                  bar: [
                    {
                      type: 'bar', 
                      marker: {colorbar: {
                          ticks: '', 
                          outlinewidth: 0
                        }}
                    }
                  ], 
                  table: [
                    {
                      type: 'table', 
                      cells: {
                        fill: {color: '#EBF0F8'}, 
                        line: {color: 'white'}
                      }, 
                      header: {
                        fill: {color: '#C8D4E3'}, 
                        line: {color: 'white'}
                      }
                    }
                  ], 
                  carpet: [
                    {
                      type: 'carpet', 
                      aaxis: {
                        gridcolor: '#C8D4E3', 
                        linecolor: '#C8D4E3', 
                        endlinecolor: '#2a3f5f', 
                        minorgridcolor: '#C8D4E3', 
                        startlinecolor: '#2a3f5f'
                      }, 
                      baxis: {
                        gridcolor: '#C8D4E3', 
                        linecolor: '#C8D4E3', 
                        endlinecolor: '#2a3f5f', 
                        minorgridcolor: '#C8D4E3', 
                        startlinecolor: '#2a3f5f'
                      }
                    }
                  ], 

                }, 
                layout: {
                  geo: {
                    bgcolor: 'white', 
                    showland: true, 
                    lakecolor: 'white', 
                    landcolor: 'white', 
                    showlakes: true, 
                    subunitcolor: '#C8D4E3'
                  }, 
                  font: {color: '#2a3f5f'}, 
                  polar: {
                    bgcolor: 'white', 
                    radialaxis: {
                      ticks: '', 
                      gridcolor: '#EBF0F8', 
                      linecolor: '#EBF0F8'
                    }, 
                    angularaxis: {
                      ticks: '', 
                      gridcolor: '#EBF0F8', 
                      linecolor: '#EBF0F8'
                    }
                  }, 
                  scene: {
                    xaxis: {
                      ticks: '', 
                      gridcolor: '#DFE8F3', 
                      gridwidth: 2, 
                      linecolor: '#EBF0F8', 
                      zerolinecolor: '#EBF0F8', 
                      showbackground: true, 
                      backgroundcolor: 'white'
                    }, 
                    yaxis: {
                      ticks: '', 
                      gridcolor: '#DFE8F3', 
                      gridwidth: 2, 
                      linecolor: '#EBF0F8', 
                      zerolinecolor: '#EBF0F8', 
                      showbackground: true, 
                      backgroundcolor: 'white'
                    }, 
                    zaxis: {
                      ticks: '', 
                      gridcolor: '#DFE8F3', 
                      gridwidth: 2, 
                      linecolor: '#EBF0F8', 
                      zerolinecolor: '#EBF0F8', 
                      showbackground: true, 
                      backgroundcolor: 'white'
                    }
                  }, 
                  title: {x: 0.05}, 
                  xaxis: {
                    ticks: '', 
                    gridcolor: '#EBF0F8', 
                    linecolor: '#EBF0F8', 
                    automargin: true, 
                    zerolinecolor: '#EBF0F8', 
                    zerolinewidth: 2
                  }, 
                  yaxis: {
                    ticks: '', 
                    gridcolor: '#EBF0F8', 
                    linecolor: '#EBF0F8', 
                    automargin: true, 
                    zerolinecolor: '#EBF0F8', 
                    zerolinewidth: 2
                  }, 
                }, 
                themeRef: 'PLOTLY_WHITE'
              }
            };

                    
            Plotly.plot('plotly-div', data);
        }
        
        var traces = {
            trace1: {
             meta: {columnNames: {
                 x: 'Month', 
                 y: 'ET'
               }}, 
             // mode: 'markers', 
             type: 'bar',  
             name: 'Monthly Averages',
            },
            trace2: {
            meta: {columnNames: {
                  x: 'Month', 
                y: 'ET'
                }},  
            type: 'scatter', 
            name: 'Climatology'
            },
        }

        
        
        makeplot();

        