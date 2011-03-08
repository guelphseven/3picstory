var images;

if(!Array.indexOf){
	    Array.prototype.indexOf = function(obj){
	        for(var i=0; i<this.length; i++){
	            if(this[i]==obj){
	                return i;
	            }
	        }
	        return -1;
	    }
	};

google.load('search','1');
$(document).ready(function(){

$("#search").click(function(){
	var ret = sanitize($("#getwords").val());
	images = ret.split(" ");
	if (images.length == 3){
		$("#story").val(ret);
		load_up(images[0], "search-1");
		load_up(images[1], "search-2");
		load_up(images[2], "search-3");
	}
	else
	{ 
		//Alert user to stupidness
	}
	});
});


