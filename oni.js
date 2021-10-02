fetch('https://origin.cpc.ncep.noaa.gov/products/analysis_monitoring/ensostuff/detrend.nino34.ascii.txt')
.then(response => response.text())
.then(data => {
  // Do something with your data
  console.log(data);
});