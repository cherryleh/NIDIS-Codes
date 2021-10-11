
anychart.onDocumentReady(function () {
  var gauge = anychart.gauges.circular();
  gauge
    .fill('#fff')
    .stroke(null)
    .padding(0)
    .margin('20%')
    .startAngle(270)
    .sweepAngle(180);
    
  gauge
    .axis()
    .labels()
    .padding('20%')
    .fontSize(14)
    .position('outside')

var value =-0.50;

if (value<=3.0 && value>=1.1){
  condition = "Strong El Nino"
} else if (value>=0.5 && value<1.1){
  condition = "Weak El Nino"
} else if (value>-0.5 && value<0.5){
  condition = "Neutral"
} else if (value>-1.1 && value<=-0.5){
  condition = "Weak La Nina"
} else if (value<=-1.1 && value>=-3.0){
  condition = "Strong La Nina"
}

  gauge.data([value.toFixed(2)]);
  gauge
    .axis()
    .scale()
    .minimum(-3)
    .maximum(3)
    /*.ticks({ interval: 0.5, interval:0.6 })
    .minorTicks({ interval: 5 });*/
    
  gauge
    .axis()
    .fill('#545f69')
    .width(1)
    .ticks({ type: 'line', fill: 'white', length: 2 });
    
  gauge.title(
    'ENSO Conditions for September<br/>' +
    '<span style="color:#009900; font-size: 14px;">(Current Condition: <strong>' +condition+'</strong>'
  );
  gauge
    .title()
    .useHtml(true)
    .padding('30%')
    .fontColor('#212121')
    .hAlign('center')
    .margin([0, 0, 10, 0]);
    
  gauge
    .needle()
    .stroke('2 #545f69')
    .startRadius('5%')
    .endRadius('90%')
    .startWidth('0.1%')
    .endWidth('0.1%')
    .middleWidth('0.1%');
    
  gauge.cap().radius('3%').enabled(true).fill('#545f69');
    
  gauge.range(0, {
    from: -3,
    to: -1.1,
    position: 'inside',
    fill: '#dd2c00 0.4',
    startSize: '50%',
    endSize: '50%',
    radius: '98%'
  });
    
  gauge.range(1, {
    from: -1.1,
    to: -0.5,
    position: 'inside',
    fill: '#ffa000 0.4',
    startSize: '50%',
    endSize: '50%',
    radius: '98%'
  });
    
  gauge.range(2, {
    from: -0.5,
    to: 0.5,
    position: 'inside',
    fill: '#009900 0.4',
    startSize: '50%',
    endSize: '50%',
    radius: '98%'
  });

  gauge.range(3, {
    from: 0.5,
    to: 1.1,
    position: 'inside',
    fill: '#ADD8E6 0.6',
    startSize: '50%',
    endSize: '50%',
    radius: '98%'
  });
    
  gauge.range(4, {
    from: 1.1,
    to: 3,
    position: 'inside',
    fill: '#0612F8 0.5',
    startSize: '50%',
    endSize: '50%',
    radius: '98%'
  });
    
  gauge
    .label(1)
    .text('Strong La Nina')
    .fontColor('#212121')
    .fontSize(14)
    .offsetY('150%')
    .offsetX('10%')
    .anchor('center');
            

    gauge
    .label(2)
    .text('Neutral')
    .fontColor('#212121')
    .fontSize(14)
    .offsetY('120%')
    .offsetX('50%')
    .anchor('center');
    

  gauge
    .label(3)
    .text('Strong El Nino')
    .fontColor('#212121')
    .fontSize(14)
    .offsetY('-150%')
    .offsetX('-10%')
    .anchor('center');
    
  gauge.container('gauge');
  gauge.draw();
});



