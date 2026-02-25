document.documentElement.className = document.documentElement.className.replace("no-js","js");

var autoLoadJS = [],
    autoLoadJSCount = 0,
    buildURL = window.location.host,
    buildREGX = /((\.build\.)|(\.preview\.))/;
    
    if(!buildREGX.test(buildURL)) {
        console.log = function() {}
    }


function addToAutoLoadLibs(filePath, callBack){
    
    if(callBack == undefined){
        callBack = '';
    }
    autoLoadJS.push(new Array(filePath, callBack, false));
}

function runCallbacks(loadedJsFilePath){
	for (var i = 0; i < autoLoadJS.length; i++) {
        if(autoLoadJS[i][0] == loadedJsFilePath) {
            callBackfunc = autoLoadJS[i][1];
            callBackfunc();
        }
	}
}

function autoLoadLibs() {
	var fileType,
		filePath,
		callBackfunc;

	for (var i = 0; i < autoLoadJS.length; i++) {
		filePath = autoLoadJS[i][0];

        callBackfunc = autoLoadJS[i][1];
        fileType = filePath.split('.').pop();

        console.log(fileType);

        if (fileType == 'css') {
        	if (!$('link[href$="'+ filePath +'"]').length) {
        		console.log(filePath + ' file not exist');

        		var link = document.createElement('link');
        			link.href = filePath;
        			link.rel = 'stylesheet';

				$(link).insertBefore('link[href*="component.css"]');
				console.log('%c '+ filePath + ' loaded', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
        	} else {
        		console.log('%c '+ filePath + ' already loaded', 'background-color: #FFEB3B; color: #ffffff; font-weight: bold;');
        	}
        }

        if (fileType == 'js') {
        	if (!$('script[src$="'+ filePath +'"]').length) {
        		console.log(filePath + ' file not exist');

        		var script = document.createElement( "script" );
                    script.type = "text/javascript";
                    script.src = filePath;
                    script.autoLoadJSindex = i;

                    script.onerror = function() {
                    	console.log('%c Cannot load script file : '+ filePath, 'background-color: #F44336; color: #ffffff;');
                    }
                    if(callBackfunc != ''){
                        if(script.readyState) {  // only required for IE <9
                        	script.onreadystatechange = function() {
                        		if ( script.readyState === "loaded" || script.readyState === "complete" ) {
                        			script.onreadystatechange = null;
                        			autoLoadJS[this.autoLoadJSindex][2] = true;
                        			autoLoadJSCount++;
                        			console.log('%c '+ autoLoadJS[this.autoLoadJSindex][0] + ' loaded', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
                        			runCallbacks(autoLoadJS[this.autoLoadJSindex][0]);
                        		}
                        	};
                        } else {
                        	script.onload = function() {
                        	    autoLoadJS[this.autoLoadJSindex][2] = true;
                        	    autoLoadJSCount++;
                        		console.log('%c '+ autoLoadJS[this.autoLoadJSindex][0] + ' loaded', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
                        		runCallbacks(autoLoadJS[this.autoLoadJSindex][0]);
                        	};
                        }
                    }
                    document.getElementsByTagName( "body" )[0].appendChild( script );
        	}
        }
        // console.log('+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
	}
}


$(window).on('load', autoLoadLibs)





// ////////////////////////////////////////////

// function dummyCall(){
//     console.log('%c Slick JS Loaded ', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
// }
// function dummyCalljqmina(){
//     console.log('%c dummyCall JQ MINA ', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
// }
// function dummyCalljq(){
//     console.log('%c dummyCall JQ ', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
// }
// function dummyCallSlickCSS(){
//     console.log('%c Load Slick CSS ', 'background-color: #27712a; color: #ffffff; font-weight: bold;');
// }

// //////////////////////////////////////////


// addToAutoLoadLibs('/vendor-lib/slick/slick.min.js', dummyCall);
// addToAutoLoadLibs('/vendor-lib/jquery/jquery-3.3.1.mina.js', dummyCalljqmina);
// addToAutoLoadLibs('/vendor-lib/jquery/jquery-3.3.1.min.js', dummyCalljq);

// addToAutoLoadLibs('/vendor-lib/slick/slick.min.css', dummyCallSlickCSS);