google.load('search','1');
var i = 0;
var images;
$(document).ready(function(){
	$("#search").click(function(){
		images = $("#getwords").val().split(" ");
		if (images.length == 3){
		$("#story").val($("#getwords").val());
		load_up(images[0], "search-1");
		load_up(images[1], "search-2");
		load_up(images[2], "search-3");
		i=0;
		}else
		{ 
		//Alert user to stupidness
		}
		})
	});

/*
 *  How to search for images and restrict them by size.
 *  This demo will also show how to use Raw Searchers, aka a searcher that is
 *  not attached to a SearchControl.  Thus, we will handle and draw the results
 *  manually.
 */

function searchComplete(searcher) {
	// Check that we got results
	if (searcher.results && searcher.results.length > 0) {
		//i++; // oh god maintaining state across callback functions!
		i = images.indexOf(searcher.gf)+1;

		// Grab our content div, clear it.
		var contentDiv = document.getElementById("search-"+i);//(images.indexOf(searcher.gf)));
		contentDiv.innerHTML = '';
		// Loop through our results, printing them to the page.
		var results = searcher.results;
		//for (var i = 0; i < 1 /*results.length*/; i++) {
		// For each result write it's title and image to the screen
		var result = results[Math.floor(Math.random()*(results.length-1))];
		var imgContainer = document.createElement('div');

		//var title = document.createElement('h2');
		// We use titleNoFormatting so that no HTML tags are left in the title
		//title.innerHTML = result.titleNoFormatting;

		var newImg = document.createElement('img');
		// There is also a result.url property which has the escaped version
		newImg.src = result.tbUrl;
		document.getElementById("image"+(i)).value  = result.tbUrl;
		//imgContainer.appendChild(title);
		imgContainer.appendChild(newImg);

		// Put our title + image in the content
		contentDiv.appendChild(imgContainer);
		//}
	}
}

function load_up(image, idVar) {
	// Our ImageSearch instance.
	var imageSearch = new google.search.ImageSearch();

	// Restrict to extra large images only
	imageSearch.setRestriction(google.search.ImageSearch.RESTRICT_IMAGESIZE,
	                           google.search.ImageSearch.IMAGESIZE_LARGE);
	//alert("before: " + imageSearch.getResultSetSize());
	imageSearch.setResultSetSize(8);
	//alert("after: " + imageSearch.getResultSetSize());
	// Here we set a callback so that anytime a search is executed, it will call
	// the searchComplete function and pass it our ImageSearch searcher.
	// When a search completes, our ImageSearch object is automatically
	// populated with the results.
	imageSearch.setSearchCompleteCallback(this, searchComplete, [imageSearch]);

	// Find me a beautiful car.
	imageSearch.execute(image);
}
