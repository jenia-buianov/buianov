insertFiles = 0;
$(function(){

	$('#add_field').on('click', function(){
		$('input[type=file]:first')
			.clone()
			.val('')
			.add('<br />')
			.appendTo('#additional_fields');
	});
	$('#UForm').on('submit', function(e){
		var FileWay = $('#Uploader').val();
		var File_ = FileWay.split("\\");
		File_ = File_[count(File_)-1];
		toastr.options = {
			"closeButton": true,
			"debug": true,
			"progressBar": true,
			"positionClass": "toast-bottom-right",
			"onclick": null,
			"showDuration": "0",
			"hideDuration": "0",
			"timeOut": "0",
			"extendedTimeOut": "0",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		toastr['info']('Uploading...', Uploading+' '+File_);
		e.preventDefault();
		var $that = $(this),
			formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму

		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			async: true,
			success: function(json){
				$.post(admin_url+LANG+'/filemanager/?path='+Getpath+'&modal=1', {modal:false},function(data){
					$('.wrapper').html(data);

				});
				toastr.options = {
					"closeButton": true,
					"debug": false,
					"progressBar": false,
					"positionClass": "toast-bottom-right",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
				dt = JSON.parse(json);
				if (dt.error) toastr['error'](dt.error, Uploading+''+File_);
				else{
					FileInfo(admin_url+LANG+'/filemanager/?modal=0&path'+dt.path+'&file='+dt.file);
					toastr['success'](dt.file+dt.res, Uploading+' '+File_);
					setTimeout(CopyFile,500);

				}


			}
		});
	});
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

});

function SaveRenamed() {
	ID = $('#fileInfo .form-inline a:eq(0)').attr('href').split('=');
	ID = ID[1];
	vl = $('#Rename').val();
	if(vl.length>0)
	{
		$.post(admin_url+LANG+'/filemanager/?action=rename', {modal:false,fileID:ID,value:vl},function(data){
			toastr['success']('', Renamed+' '+vl);
			$('#fileInfo h3').html(vl);
			FileInfo(admin_url+LANG+'/filemanager/?modal=0&path='+Getpath+'&file='+vl);

		});
	}
}

function Rename()
{
	Title = $('#fileInfo h3').html();
	$('#fileInfo h3').html('<input type="text" id="Rename" onchange="SaveRenamed()" value="'+Title+'" class="form-control">');
	$('#Rename').focus();
}
function CopyFile()
{
	var clipboard = new Clipboard('#CopyBtn', {
		text: function() {
			toastr['success']('', WasCopied);
			return $('#CopyBtn').attr('data-text');
		}
	});
}
function OnDisplay()
{
	if (screen.availWidth<1024) var height = parseInt(screen.availHeight)-parseInt($('#DivFileManager').offset().top) -10;
	else var height = parseInt(screen.availHeight)-parseInt($('#DivFileManager').offset().top) -150;

	$('#DivFileManager').css('height',height+'px');
}
setTimeout(OnDisplay,1000);
function CreateFld(path)
{

	if ($('#newfolder').val().length==0) return false;

	$.post(admin_url+LANG+'/filemanager/?action=newfolder', {modal:true,values:$('#newfolder').val(),path:path},function(data){
		//alert(data);
		loaction.reload(true);
		return false;

	});
}
function CreateFolder(path)
{
	var HTML = $('#createfolder').html();
	var Form = '<form action="#" method="post" id="CreateFld" onsubmit="return CreateFld(';
	Form+="'"+path+"')";
	Form+='" style="display: inline"><input type="text" id="newfolder" class="form-control" onchange="CreateFld(';
	Form+="'"+path+"')";
	Form+='"/></form>';
	$('#createfolder').html(Form);

}

function FileInfo(url)
{
	$.post(url, {modal:false},function(data){

		$('#fileInfo').html(data);

	});
}