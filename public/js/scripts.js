function changeFontSize(multiplier) {
	
	var ghead = document.getElementsByTagName('fs');

		if(multiplier == "0"){
		for (i=0; i<ghead.length; i++) {
		    var fs = ghead[i];
		    fs.style.fontSize = "1em";
		}
	}
	
 
    for (i=0; i<ghead.length; i++) {
	    var fs = ghead[i];
	    if (fs.style.fontSize == "") {
	    	fs.style.fontSize = "1em";
	    }
	}
  
	for (i=0; i<ghead.length; i++) {
		var fs = ghead[i];  
		var size = parseFloat(fs.style.fontSize) +  (multiplier * 0.25) + "em";
		if(size != "2.5em" && size != "0.5em"){
			fs.style.fontSize = size;
		}
	}


/*	if(multiplier == "0"){
		for (i=0; i<ghead.length; i++) {
		    var h2 = ghead[i];
		    h2.style.fontSize = "1.5em";
		}
	}
	
 
    for (i=0; i<ghead.length; i++) {
	    var h2 = ghead[i];
	    if (h2.style.fontSize == "") {
	    	h2.style.fontSize = "1.5em";
	    }
	}
  
	for (i=0; i<ghead.length; i++) {
		var h2 = ghead[i];  
		var size = parseFloat(h2.style.fontSize) +  (multiplier * 0.25) + "em";
		if(size != "2.5em" && size != "0.5em"){
			h2.style.fontSize = size;
		}
	}
*/
 }