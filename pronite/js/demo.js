var currPage=0;
var isAnimating=false;
var musicOn=true;
window.onload = function(){
	stopLoading();
	var bLazy = new Blazy();
	isAnimating=true;
	var headline = document.querySelector('#text0');
			segmenter = new Segmenter(document.querySelector('#segment_0'), {
					onReady: function() {
						segmenter.animate();
						headline.classList.remove('trigger-headline--hidden');
						isAnimating=false;
					}
				});
	$("#date_0").css({opacity:"1"});
	$(document).keydown(function(e) {
		if(!isAnimating){
			isAnimating=true;
			var nextPage;
			switch(e.which) {
			    case 39:
			    	nextPage=(currPage+1)%6;
			    break;

			    case 37:
			   		nextPage=(currPage-1)%6;
			   		if(nextPage<0){
			   			nextPage=1;
			   		}
			    break;

			    default:
			    	isAnimating=false;
			     return;
			}
			$("#text"+currPage).addClass('trigger-headline--hidden');
			$("#date_"+currPage).css({opacity:"0"});
  			$("#song_"+currPage).get(0).pause();
			var curr=currPage;
			setTimeout(function(){
				moveSlide(curr,nextPage);
			},500);
			currPage = nextPage;
		}
	});

	$(".prev").click(function(){
		if(!isAnimating){
			isAnimating=true;
			var nextPage=(currPage-1)%6;
			if(nextPage<0){
				nextPage=3;
			}
			$("#text"+currPage).addClass('trigger-headline--hidden');
			$("#date_"+currPage).css({opacity:"0"});
	  		$("#song_"+currPage).get(0).pause();
			var curr=currPage;
			setTimeout(function(){
				moveSlide(curr,nextPage);
			},500);
			currPage = nextPage;
		}
	});
	$(".next").click(function(){
		if(!isAnimating){
			isAnimating=true;
			var nextPage=(currPage+1)%6;
			$("#text"+currPage).addClass('trigger-headline--hidden');
			$("#date_"+currPage).css({opacity:"0"});
	  		$("#song_"+currPage).get(0).pause();
			var curr=currPage;
			setTimeout(function(){
				moveSlide(curr,nextPage);
			},1000);
			currPage = nextPage;
		}
	});
}
$(document).ready(function(){
	initLoading();

	$("body").click(function(){
      $("#login_popup").css({display:'none',opacity:'0'});
  });

  $("div").not(".burger,.user_menu_entry,#user_menu,#top_bar").hover(function(event){
      $("#user_menu").css({display:'none',opacity:'0'});
  });

  $(".burger").hover(function(event){
        event.stopPropagation();
      $("#user_menu").css({display:'block',opacity:'1'});
  });

  $("#bars").click(function(){
  	if(musicOn){
  		$(".bar").removeClass('music');
  		musicOn=false;
  		$("#song_"+currPage).get(0).pause();
  	}else{
  		$(".bar").addClass('music');
  		musicOn=true;
  		$("#song_"+currPage).get(0).play();
  	}
  })

})

function moveSlide(currPage,nextPage){
	$("#page"+currPage).css({width:0});
		$("#segment_"+currPage).css({width:0});
		$("#page"+nextPage).css({width:'100vw'});
		$("#segment_"+nextPage).css({width:'100vw'});
		$("#date_"+nextPage).css({opacity:"1"});
		if(nextPage==0){
			$(".bar").css({"background-color":"#fff"});
			$("nav span").addClass('white');
			$("nav span").removeClass('yellow');
			$("nav span").removeClass('black');
			$("nav i").addClass('whiter');
			$("nav i").removeClass('yellower');
			$("nav i").removeClass('blacker');
			var headline = document.querySelector('#text0');
			segmenter = new Segmenter(document.querySelector('#segment_0'), {
					onReady: function() {
						segmenter.animate();
						headline.classList.remove('trigger-headline--hidden');
					}
				});
		}else if(nextPage==1){
			$(".bar").css({"background-color":"#fbe094"});
			$("nav span").removeClass('white');
			$("nav span").removeClass('black');
			$("nav span").addClass('yellow');
			$("nav i").removeClass('whiter');
			$("nav i").removeClass('blacker');
			$("nav i").addClass('yellower');
			var headline = document.querySelector('#text1')
			segmenter = new Segmenter(document.querySelector('#segment_1'), {
					pieces: 4,
					animation: {
						duration: 1500,
						easing: 'easeInOutExpo',
						delay: 100,
						translateZ: 100
					},
					parallax: true,
					positions: [
						{top: 0, left: 0, width: 45, height: 45},
						{top: 55, left: 0, width: 45, height: 45},
						{top: 0, left: 55, width: 45, height: 45},
						{top: 55, left: 55, width: 45, height: 45}
					],
					onReady: function() {
						segmenter.animate();
						headline.classList.remove('trigger-headline--hidden');
					}
				});
	}else if(nextPage==2){
		$(".bar").css({"background-color":"#000"});
		$("nav span").removeClass('white');
		$("nav span").removeClass('yellow');
		$("nav span").addClass('black');
		$("nav i").removeClass('whiter');
		$("nav i").removeClass('yellower');
		$("nav i").addClass('blacker');
		var headline = document.querySelector('#text2');
		segmenter = new Segmenter(document.querySelector('#segment_2'), {
					pieces: 9,
					positions: [
						{top: 30, left: 5, width: 40, height: 80},
						{top: 50, left: 25, width: 30, height: 30},
						{top: 5, left: 75, width: 40, height: 20},
						{top: 30, left: 45, width: 40, height: 20},
						{top: 45, left: 15, width: 50, height: 40},
						{top: 10, left: 40, width: 10, height: 20},
						{top: 20, left: 50, width: 30, height: 70},
						{top: 0, left: 10, width: 50, height: 60},
						{top: 70, left: 40, width: 30, height: 30}
					],
					animation: {
						duration: 2000,
						easing: 'easeInOutCubic',
						delay: 0,
						opacity: 1,
						translateZ: 85,
						translateX: {min: -20, max: 20},
						translateY: {min: -20, max: 20}
					},
					parallax: true,
					parallaxMovement: {min: 5, max: 10},
					onReady: function() {
						segmenter.animate();
						headline.classList.remove('trigger-headline--hidden');
					}
				});
	}else if(nextPage==3){
		$(".bar").css({"background-color":"#000"});
		$("nav span").removeClass('white');
		$("nav span").removeClass('yellow');
		$("nav span").addClass('black');
		$("nav i").removeClass('whiter');
		$("nav i").removeClass('yellower');
		$("nav i").addClass('blacker');
		var headline = document.querySelector('#text3');
		segmenter = new Segmenter(document.querySelector('#segment_3'), {
					pieces: 9,
					positions: [
						{top: 50, left: 5, width: 40, height: 80},
						{top: 50, left: 25, width: 30, height: 30},
						{top: 5, left: 75, width: 40, height: 20},
						{top: 30, left: 45, width: 40, height: 20},
						{top: 45, left: 15, width: 50, height: 40},
						{top: 10, left: 40, width: 10, height: 20},
						{top: 20, left: 50, width: 30, height: 70},
						{top: 0, left: 10, width: 50, height: 60},
						{top: 70, left: 40, width: 30, height: 30}
					],
					animation: {
						duration: 2000,
						easing: 'easeInOutCubic',
						delay: 0,
						opacity: 1,
						translateZ: 85,
						translateX: {min: -20, max: 20},
						translateY: {min: -20, max: 20}
					},
					parallax: true,
					parallaxMovement: {min: 5, max: 10},
					onReady: function() {
						segmenter.animate();
						headline.classList.remove('trigger-headline--hidden');
					}
				});
	}else if(nextPage==4){
	$(".bar").css({"background-color":"#fbe094"});
	$("nav span").removeClass('white');
	$("nav span").removeClass('black');
	$("nav span").addClass('yellow');
	$("nav i").removeClass('whiter');
	$("nav i").removeClass('blacker');
	$("nav i").addClass('yellower');
	var headline = document.querySelector('#text4')
	segmenter = new Segmenter(document.querySelector('#segment_4'), {
			pieces: 4,
			animation: {
				duration: 1500,
				easing: 'easeInOutExpo',
				delay: 100,
				translateZ: 100
			},
			parallax: true,
			positions: [
				{top: 0, left: 0, width: 45, height: 45},
				{top: 55, left: 0, width: 45, height: 45},
				{top: 0, left: 55, width: 45, height: 45},
				{top: 55, left: 55, width: 45, height: 45}
			],
			onReady: function() {
				segmenter.animate();
				headline.classList.remove('trigger-headline--hidden');
			}
		});
}else if(nextPage==5){
	$(".bar").css({"background-color":"#fff"});
	$("nav span").addClass('white');
	$("nav span").removeClass('yellow');
	$("nav span").removeClass('black');
	$("nav i").addClass('whiter');
	$("nav i").removeClass('yellower');
	$("nav i").removeClass('blacker');
	var headline = document.querySelector('#text5');
	segmenter = new Segmenter(document.querySelector('#segment_5'), {
			onReady: function() {
				segmenter.animate();
				headline.classList.remove('trigger-headline--hidden');
			}
		});
}
	if(musicOn){
		$("#song_"+nextPage).get(0).play();
	}
	isAnimating=false;
}
