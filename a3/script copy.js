$(document).ready(function(){
    //Prevent auto play on carousel
    $('#avengersEndgameSlide').carousel({
        pause: true,
        interval: false
    });
    $('#theHappyPrinceSlide').carousel({
        pause: true,
        interval: false
    });
    $('#topEndWeddingSlide').carousel({
        pause: true,
        interval: false
    });
    $('#dumboSlide').carousel({
        pause: true,
        interval: false
    });
  });

  $(function(){
    $('.modal').on('hidden.bs.modal', function (e) {
      $iframe = $(this).find("iframe");
      $iframe.attr("src", $iframe.attr("src"));
    });
  });