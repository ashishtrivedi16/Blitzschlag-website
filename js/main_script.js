function change_bg(index,nextIndex,direction){
  if(direction=='down'){
    $("#bg"+index).slideUp(500);
  }else {
    $("#bg"+nextIndex).slideDown(500);
  }
}

window.onload = function(){
    stopLoading();
    
    $.notify.addStyle('notifications', {
  html: "<div id='container'><div data-notify-html='title'/></div>",
  classes: {
    base: {
      "width":"25vw",
      "padding-top": "1.5vh",
      "padding-bottom": "1.5vh",
      "padding-left": "1vw",
      "padding-right": "1vw",
      "background-color": "rgba(255,255,255,0.5)",
      "border": "1px solid #000",
      "position":"left",
      "color":"#000"
    }
  }
  });


$.ajax({
    type: "POST",
    url: "php/getNotifications.php",
    success: function( result ){
      console.log(result);
      try{
          Notifications = $.parseJSON(result);
          console.log(Notifications);
          addNotifications();
        }catch(exception){
        }
    }
  });
}

var Notifications;

$(document).ready(function() {
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 || screen.height>screen.width
 ){
    //window.location.href="http://blitzschlag.org";
  }

      initLoading();
    $('#fullpage').fullpage({
        easing: 'swing',
      onLeave:function(index,nextIndex,direction){
          change_bg(index,nextIndex,direction);
      }
    });
      $.fn.fullpage.setScrollingSpeed(600);
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 100,
      "density": {
        "enable": true,
        "value_area": 1000
      }
    },
    "color": {
      "value": "#fff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 3
      },
      "image": {
        "src": "images/tathva-man.png",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 1,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 10,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 6,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 75,
      "color": "#fff",
      "opacity": 1,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 3,
      "direction": "random",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": true,
        "rotateX": 60000,
        "rotateY": 12000
      }
    }
  },
  "interactivity": {
    "detect_on": "window",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "repulse"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});

$("#fullpage").click (function(){
    $("#login_popup").css({display:'none',opacity:'0'});
});

$("#fullpage").hover (function(){
    $("#user_menu").css({display:'none',opacity:'0'});
});

$(".burger").hover(function(){
    $("#user_menu").css({display:'block',opacity:'1'});
});

$("body").on('mousewheel DOMMouseScroll', function(e) {
  $.fn.fullpage.setAllowScrolling(false);
  $.fn.fullpage.setKeyboardScrolling(false);
    if($(e.target).parents('div.secondary_contact').length){
    }else{
      $.fn.fullpage.setAllowScrolling(true);
      $.fn.fullpage.setKeyboardScrolling(true);
    }
    
  });

});

function closeIframe(){
  $("#login_popup").css({display:'none',opacity:'0'});
  location.reload();
}

function loginClick(){
  $("#login_popup").css({display:'block',opacity:'1'});
}

function logout(){
  $("#user_menu").css({display:'none',opacity:'0'});
  initLoading();
  $.ajax({
      type: "POST",
      url: "../Register/logout.php",
      success: function( result ){
        if(result=='success'){
          location.reload();
          stopLoading();
        }else{
          alert('No Internet Connection');
        }
      }
    });
}

var indexN=0;
function addNotifications(){
  var heading = $("<div class='notificationHeading'/>").append(Notifications[indexN].heading);
  var message = $("<div class='notificationMessage'/>").append(Notifications[indexN].message);
  var notif = $("<div/>").append(heading);
  var notif = notif.append(message);
  $.notify({
    title: notif
  },{
    style: 'notifications',
    globalPosition: 'bottom right',
    autoHideDelay: '5000',
    showDuration: '5000'
  });
  if(indexN<Notifications.length-1){
    indexN++;
    setTimeout(addNotifications,700);
  }else{
    indexN=0;
  }
}
