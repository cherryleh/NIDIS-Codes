
var request = require('request');
request.get('https://origin.cpc.ncep.noaa.gov/products/analysis_monitoring/ensostuff/detrend.nino34.ascii.txt', function (error, response, body) {
    if (!error && response.statusCode == 200) {
        var csv = body;
        // Continue with your processing here.
        let test = csv.split(' ');
        oni = test[test.length - 1];
        console.log(oni);

    }
});