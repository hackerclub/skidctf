
phantom.addCookie({'name': 'flag', 'value': 'flag{serverside_attacks_are_for_chumps}', 'domain': 'ctf.hackevergreen.org'});

var page = require('webpage').create(), system = require('system');

var resource = system.args[1];
var target = 'http://ctf.hackevergreen.org/' + resource

page.open(target, function (status) {
    if (status !== 'success') {
        //console.log('Unable to load the address!');
        phantom.exit();
    } else {
        window.setTimeout(function () {
            page.renderBase64("PNG");
            phantom.exit();
        }, 1000); // Change timeout as required to allow sufficient time 
    }
});

