var autocomplete = [];
jQuery(document).ready(function($) {

	var options = {
		$FillMode: 2,
		$AutoPlay: false,
		$AutoPlayInterval: 4000,
		$PauseOnHover: 0,
		$ArrowKeyNavigation: true,
		
		$SlideshowOptions: { 
			$Class: $JssorSlideshowRunner$, 
			Transitions: [{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:$JssorEasing$.
						$EaseInQuad}] 
		},
	
		$PlayOrientation: 1,
		$DragOrientation: 1,
		$ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$,
			$ChanceToShow: 1, 
			$AutoCenter: 2,
			$Steps: 1
			}
    };

	$("#slider1_container").css("display", "block");

	var jssor_slider1 = new $JssorSlider$("slider1_container", options);

	function ScaleSlider() {
    	var bodyWidth = document.body.clientWidth;
	
		if (bodyWidth)
       		jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
		else
			window.setTimeout(ScaleSlider, 30);
	}
	
	ScaleSlider();
	$(window).bind("load", ScaleSlider);
	$(window).bind("resize", ScaleSlider);
	$(window).bind("orientationchange", ScaleSlider);

	window.addDashes = function addDashes(f) {
		var r = /(\D+)/g,
			npa = '',
			nxx='',
			last4='';
		f.value = f.value.replace(r,'');
		npa = f.value.substr(0,3);
		nxx = f.value.substr(3,3);
		last4 = f.value.substr(6, 4);
		f.value = npa + '-' + nxx + '-' + last4;

	}

	
	$(document).ready(function() {
			
		var destDiv = $('#form-wrapper');
		var i = $('#form-wrapper p').size() + 1;

		$('#add').click(function() {
		document.getElementById('count').value = i;
		$('#form-wrapper').append('<p><label for="destin"><input type="text" name="destins' + i +'" size="20" id="destins' + i +'" class="controlsInput" value="" placeholder="Destination" /></label><a href="#" id="remove">&nbspRemove</a></p>');

		var newInput = [];
		var newEl = document.getElementById('destins' + i);
		newInput.push(newEl);
		setupAutocomplete(autocomplete, newInput, 0);
		i++;
		//	return false;

		});
		
		$('body').on('click', '#remove',function(){
			if (i > 2) {
				$(this).parents('p').remove();
				i--;
				document.getElementById('count').value = i - 1;
			}
		//	return false;
		});
		
		var inputs = document.getElementsByClassName("controlsInput");
		for (var j = 0; j < inputs.length; j++) {
			setupAutocomplete(autocomplete, inputs, j);
		}


	});

	function setupAutocomplete(autocomplete, inputs, j){
		var autocompleteOptions = {
			types: ['(cities)'],
			componentRestrictions: {country: "us"}
		};

		autocomplete.push(new google.maps.places.Autocomplete(inputs[j],autocompleteOptions));
	}	

});


