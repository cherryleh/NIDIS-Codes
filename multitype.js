var url1 = './Plotly/ranchAverages/RS01_ETaverage.csv';


var url2 = './Plotly/ranchAverages/RS01_ETmonthlyavg.csv';



        function makeplot() {
          Plotly.d3.csv(url1, function(data){ processData(data, 'trace1', 'Month1', 'ET1','myDiv1','multi') } );
          Plotly.d3.csv(url2, function(data){ processData(data, 'trace2', 'Month2', 'ET2', 'myDiv1','multi') } );

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


            
            
            traces[traceName].x = x;
            traces[traceName].y = y;

            makePlotly(traces[traceName]);
        }
        
        function makePlotly(trace) {
            var data = [trace];
            
            console.log(trace);
                    
            var layout = {
                autosize: false,

                margin: {
                  l: 30,
                  r: 30,
                  b: 50,
                  t: 10,
                  pad: 4
                },

              };

                    
            Plotly.plot('plotly-div', data,layout);
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

        