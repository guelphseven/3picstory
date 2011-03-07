/*
*  How to search for images and restrict them by size.
*  This demo will also show how to use Raw Searchers, aka a searcher that is
*  not attached to a SearchControl.  Thus, we will handle and draw the results
*  manually.
*/

function searchComplete(searcher, idVar) {
  // Check that we got results
  if (searcher.results && searcher.results.length > 0) {
    // Grab our content div, clear it.
    var contentDiv = document.getElementById(idVar);
    contentDiv.innerHTML = '';

    // Loop through our results, printing them to the page.
    var results = searcher.results;
    for (var i = 0; i < 1 /*results.length*/; i++) {
      // For each result write it's title and image to the screen
      var result = results[i];
      var imgContainer = document.createElement('div');

      //var title = document.createElement('h2');
      // We use titleNoFormatting so that no HTML tags are left in the title
      //title.innerHTML = result.titleNoFormatting;

      var newImg = document.createElement('img');
      // There is also a result.url property which has the escaped version
      newImg.src = result.tbUrl;
	document.getElementById("image"+idVar.split("-")[1]).value  = result.tbUrl;
      //imgContainer.appendChild(title);
      imgContainer.appendChild(newImg);

      // Put our title + image in the content
      contentDiv.appendChild(imgContainer);
    }
  }
}

function on_load()
{
	load_up("batman");
}

function load_up(image, idVar) {
  // Our ImageSearch instance.
  var imageSearch = new google.search.ImageSearch();

  // Restrict to extra large images only
  imageSearch.setRestriction(google.search.ImageSearch.RESTRICT_IMAGESIZE,
                             google.search.ImageSearch.IMAGESIZE_MEDIUM);

  // Here we set a callback so that anytime a search is executed, it will call
  // the searchComplete function and pass it our ImageSearch searcher.
  // When a search completes, our ImageSearch object is automatically
  // populated with the results.
  imageSearch.setSearchCompleteCallback(this, searchComplete, [imageSearch, idVar]);

  // Find me a beautiful car.
  imageSearch.execute(image);
}
