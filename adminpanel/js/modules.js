$(document).ready(function() {
	$('a').click(function() {

		var url = $(this).attr('href');
		var toggle = $(this).attr('data-toggle');
		if (toggle=='modal'||url=='#') return 0;
		var explode = url.split('?');
		if (count(explode)==2) urls=url+'&modal=1';
		else urls=url+'?modal=1';
		NProgress.start();
		ex = url.split('/');
		ex = ex[count(ex)-1].split('?');
		ex = ex[0];

		$.ajax({
			url:     urls,
			async: true,
			success: function(data){
				$('.wrapper').html(data);

				NProgress.done();
			}
		});

		if(url != window.location){
			window.history.pushState(null, null, url);

		}

		return false;
	});

	$(window).bind('popstate', function() {
		NProgress.start();

		$.ajax({
			url:     location.pathname + '?modal=1',
			async: true,
			success: function(data) {
				$('.wrapper').html(data);
				NProgress.done();
			}
		});
	});
	var pos = $('table thead').offset().top;
	var left = $('table thead').offset().left;
	var getTd = $('table tbody tr:eq(0)').html().split('<td');
	var countTR = count($('table tbody').html().split('<tr'))-2;

	for(k=0;k<count(getTd);k++)
	$('table thead th:eq('+k+')').css('width',($('table tbody tr:eq(0) td:eq('+k+')').width()+20)+'px');

	$(window).scroll(function () {
		if ($('html').width()>1023&&$(this).scrollTop() > pos&&$(this).scrollTop()<$('table tbody tr:eq('+countTR+')').offset().top) {

			$('table thead').css('background-color','#fff');
			$('table thead').css('position','fixed');
			$('table thead ').css('left',left+'px');
			$('table thead ').css('top','60px');



		}
		else{
			$('table thead').css('position','relative');
			$('table thead ').css('left','0px');
			$('table thead ').css('top','0px');

		}

	});
});