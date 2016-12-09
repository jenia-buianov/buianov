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
	$('.panel-heading').dblclick(function() {
		if (count($('.wrapper').html().split('RenameModule'))>1) return;
		var Title = $('.panel-heading').html();
		$('.panel-heading').html('<input type="text" id="RenameModule" value="'+Title+'" class="form-control" onchange="RenameModule('+"'"+Title+"'"+');"/>');
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
function RenameModule(Title)
{
	vl = $('#RenameModule').val();
	if (vl.length==0) {
		$('.panel-heading').html(Title);
		return false;
	}
	URL = window.location.href.split('/');
	URL = URL[NUMBER_+5].split('?');
	URL = URL[0];
	$.post(admin_url+LANG+'/modules/rename/', {modal:true,module:URL,value:vl},function(data){
		toastr.options = {
			"closeButton": true,
			"debug": true,
			"progressBar": false,
			"positionClass": "toast-bottom-full-width",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "3000",
			"extendedTimeOut": "500",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		if(data=='ok')
		{
			$('.panel-heading').html(vl);
			toastr['success'](vl, Title);
		}else toastr['error'](data, Title);
	});



}