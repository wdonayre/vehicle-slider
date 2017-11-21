// CAR SELECTOR - GLT
var cars = [
  {
      "car_name": "Vios",
      "car_color_variations": [
          {
           "color_name": "Red Vios",
           "color_hex": "#ff0011",
           "color_car_image": "assets/img/red.png"
          },
          {
           "color_name": "Blue Vios",
           "color_hex": "#004eff",
           "color_car_image": "assets/img/blue.png"
          },
          {
           "color_name": "Orange Vios",
           "color_hex": "#f58a05",
           "color_car_image": "assets/img/orange.png"
          },
          {
           "color_name": "Black Vios",
           "color_hex": "#000000",
           "color_car_image": "assets/img/black.png"
          },
          {
           "color_name": "Brown Vios",
           "color_hex": "#572807",
           "color_car_image": "assets/img/brown.png"
          }
      ]
  }
];
// -------------------------------------------------------------------------------------------------------------------------------------------------------//



(function ($) {
  // FUNCTIONS
	function gltCarousel() {
    var j = 0;
      for(var b = 0; b < cars.length; b++){
        b = j;

        $('<div class="header"><h3>'+cars[b].car_name+'</h3></div>').prependTo('.single-slider');
      }
      for(var c = 0; c < cars[j]['car_color_variations'].length; c++){
        var c_name = (cars[j]['car_color_variations'][c]['color_name'])
        var c_hex = (cars[j]['car_color_variations'][c]['color_hex'])
        var c_car_image = (cars[j]['car_color_variations'][c]['color_car_image'])

        $fixture = $([
        	  "<div data-id='"+b+"'>",
          	  "<figure>",
                "<a href='#' class='link-to-post'></a>",
                "<div class='img-wrap'>",
                  "<img itemprop='image' src="+c_car_image+">",
                "</div>",
                "<figcaption>",
                  "<div class='thumb-info'>",
                    "<h4 itemprop='car_attr'>"+c_name+"</h4>",
                    "<span itemprop='car_attr' data-color="+c_name+" data-hex="+c_hex+"></span>",
                  "</div>",
                "</figcaption>",
          	  "</figure>",
        	  "</div>"
        	].join("\n"));
        $fixture.appendTo('#owl-demo')
      }
	}

  function carouselInit(){
    $('#owl-demo').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        singleItem: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:1
            }
        }
    });
    $('.owl-dots').wrap("<div class='owl-controls'></div>");
  }

  function carouselBullets(){
    $("#owl-demo .owl-item").each(function(index) {
      var me = $(this);
      var color_name = me.find("span[itemprop='car_attr']").data("color");
      var color_hex = me.find("span[itemprop='car_attr']").data("hex");
      var idx = me.index();
      var bullet = $(".owl-dots .owl-dot");
      console.log(index + color_name);
      console.log(index + color_hex);

      bullet.eq(idx).find("span").css("background-color",color_hex);
    });
  }

	$(document).ready(function(){
		// gltCarousel();
    carouselInit();
    carouselBullets();
	});

} (window.jQuery || window.$) );
