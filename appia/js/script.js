$(function(){
	$(".b1").click(function(){
		$(".u1:not(:animated)").slideToggle("slow");
		});
	});

$(function(){
	$(".b2").click(function(){
		$(".u2:not(:animated)").slideToggle("slow");
		});
	});
	
$(function(){
	$(".b3").click(function(){
		$(".u3:not(:animated)").slideToggle("slow");
		});
	});
	
$(function(){
	$(".b4").click(function(){
		$(".u4:not(:animated)").slideToggle("slow");
		});
	});
	
$(function(){
	$(".b5").click(function(){
		$(".u5:not(:animated)").slideToggle("slow");
		});
	});
	
$(function(){
	$(".b6").click(function(){
		$(".u6:not(:animated)").slideToggle("slow");
		});
	});

//歯車
$(function(){
	var rotation = function (){
   $(".bic").rotate({
      angle:100, 
      animateTo:360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});

$(function(){
	var rotation = function (){
   $(".bic2").rotate({
      angle:-300, 
      animateTo:-360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});

$(function(){
	var rotation = function (){
   $(".bic3").rotate({
      angle:200, 
      animateTo:360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});

$(function(){
	var rotation = function (){
   $(".bic4").rotate({
      angle:-200, 
      animateTo:-360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});
$(function(){
	var rotation = function (){
   $(".bic5").rotate({
      angle:300, 
      animateTo:360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});
$(function(){
	var rotation = function (){
   $(".bic6").rotate({
      angle:-300, 
      animateTo:-360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});
$(function(){
	var rotation = function (){
   $(".bic7").rotate({
      angle:-300, 
      animateTo:-360, 
      callback: rotation,
      easing: function (x,t,b,c,d){        // t: current time, b: begInnIng value, c: change In value, d: duration
          return c*(t/d)+b;
      }
   });
}
rotation();
});
//ドリンク

$(function(){	
$(".beer").rotate({ 
   bind: 
     {
        mouseover : function() { 
            $(this).rotate({animateTo:80})
		},
	 
        mouseout : function() { 
            $(this).rotate({animateTo:0})
        }
     }
	
   
});

$(".cola").rotate({ 
   bind: 
     { 
        mouseover : function() { 
            $(this).rotate({animateTo:-30})
        },
        mouseout : function() { 
            $(this).rotate({animateTo:0})
        }
     } 
   
});
$(".teq").rotate({ 
   bind: 
     { 
        mouseover : function() { 
            $(this).rotate({animateTo:40})
        },
        mouseout : function() { 
            $(this).rotate({animateTo:0})
        }
     } 
   
});
$(".wine").rotate({ 
   bind: 
     { 
        mouseover : function() { 
            $(this).rotate({animateTo:-30})
        },
        mouseout : function() { 
            $(this).rotate({animateTo:0})
        }
     } 
   
});
});


	
