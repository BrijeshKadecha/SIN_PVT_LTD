$(function () {
		
	var filterList = {
	
		init: function () {
		
			// https://mixitup.kunkalabs.com/
			$('#gallery').mixItUp({
				selectors: {
  			  target: '.gallery-item',
  			  filter: '.filter'	
  		  },
  		  load: {
    		  filter: '.industrial, .commercial, .csr, .residential, .specialprojects' // show all items on page load.
    		}     
			});								
		
		}

	};
	
	// Filter ALL the things
	filterList.init();
	
});