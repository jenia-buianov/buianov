var loading= "<div class='uil-ellipsis-css' style='transform:scale(1);'><div class='ib'><div class='circle'><div></div></div><div class='circle'><div></div></div><div class='circle'><div></div></div><div class='circle'><div></div></div></div></div>";


function Modal(Link)
{
	$('.modal-content').html(loading);
	$.post(admin_url+LANG+'/'+Link, {modal:true},function(data){
				$('.modal-content').html(data);
			});
}
function count(array)
{
	return array.length;
}
function is_array( mixed_var ) {	
	return ( mixed_var instanceof Array );
}

function SendForm(FormID,Refresh,Reset)
{
	empty = '';
	getIDS = $('#'+FormID+' #idFormInput').val().split(',');
	Form = Array();
	for(k=0;k<count(getIDS);k++)
	{
		Form[k] = Array();
		if(getIDS[k].substr(getIDS[k].length-1,1)!=='(')
		{
			if(getIDS[k]=='Modal'){
				Form[k][0] = getIDS[k];
				Form[k][1] = $('#'+getIDS[k]).prop('checked');
			}
			else
			{
				if($('#'+FormID+' #'+getIDS[k]).val()==''||$('#'+FormID+' #'+getIDS[k]).val()==0) empty+=', '+$('#'+FormID+' #'+getIDS[k]).attr('placeholder');
				else {
					Form[k][0] = getIDS[k];
					Form[k][1] = $('#'+FormID+' #'+getIDS[k]).val();
				}
			}
		}
		else
		{
			
			vl = getIDS[k].substr(0,getIDS[k].length-1);
			Frm = $('#'+FormID).html().split(vl);
			Form[k][1] = '';
			for(i=0;i<count(Frm)-2;i++)
			{
				title = vl+i;
				if($('#'+FormID+' #'+title).val()==''||$('#'+FormID+' #'+title).val()==0) empty+=', '+$('#'+FormID+' #'+title).attr('placeholder');
				else {
					Form[k][0] = vl;
					Form[k][1]+=$('#'+FormID+' #'+title).val()+',';
				}
			}
		}
	}
	Status = $('#'+FormID+' #FormResultStatus').val().split(',');
	if (empty!=='') 
	{
	empty = empty.substr(2,empty.length)+' ';
	
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
	toastr['error'](empty+Status[1], $('#'+FormID+' #FormTitle').val());
	}
	else
	{
		$.post($('#'+FormID).attr('action'), {modal:true,values:Form},function(data){
				
				if(data=='0')
				{
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
	toastr['success'](Status[2], $('#'+FormID+' #FormTitle').val());
	if (Refresh==1) location.replace($('#'+FormID).attr('action'));
	if (Reset==1) document.getElementById(FormID).reset();
				}
				else {
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
	toastr['error'](Status[0]+' '+data, $('#'+FormID+' #FormTitle').val());
				}
			});
	}
	return false;
}

function ChangeCountRows(FormID)
{
	
	if(parseInt($('#'+FormID+' #countRows').val())>countRows)
	{
		$.post($('#'+FormID).attr('action'), {modal:true,count:parseInt($('#'+FormID+' #countRows').val()),now:countRows},function(data){
			$('#'+FormID+' #here').append(data);
			countRows = parseInt($('#'+FormID+' #countRows').val());
		});
		
	}
	else 
	{
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
	toastr['error']('You cannot delete rows. Just change it', $('#'+FormID+' #FormTitle').val());
	}
}
var allowedSymbols = Array('0','1','2','3','4','5','6','7','8','9','q','w','e','r','t','y','u','i','o','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m','_');
	
function CreateTable(FormID)
{
	empty = '';
	
	
	getIDS = $('#'+FormID+' #idFormInput').val().split(',');
	Form = Array();
	rowNames = Array();
	if($('#'+FormID+' #tableName').val()!=='') Form[0]=$('#'+FormID+' #tableName').val();	else empty+=', '+$('#'+FormID+' #tableName').attr('placeholder');
	if(parseInt($('#'+FormID+' #countRows').val())>0) Form[1]=parseInt($('#'+FormID+' #countRows').val()); else empty+=', '+$('#'+FormID+' #countRows').attr('placeholder');
	if(parseInt($('#'+FormID+' #countRows').val())>0)
	{
		for(k=0;k<parseInt($('#'+FormID+' #countRows').val());k++)
		{
			if($('#'+FormID+' #assocName'+k).val()!=='') Form.push($('#'+FormID+' #assocName'+k).val()); else empty+=', '+$('#'+FormID+' #assocName'+k).attr('placeholder');
			if($('#'+FormID+' #rowName'+k).val()!==''&&jQuery.inArray($('#'+FormID+' #rowName'+k).val(), rowNames ) ) {Form.push($('#'+FormID+' #rowName'+k).val()); rowNames.push($('#'+FormID+' #rowName'+k).val());} else empty+=', '+$('#'+FormID+' #rowName'+k).attr('placeholder');
			if($('#'+FormID+' #rowType'+k).val()!=='') Form.push($('#'+FormID+' #rowType'+k).val()); else empty+=', '+$('#'+FormID+' #rowType'+k).attr('placeholder')+' '+$('#'+FormID+' #assocName'+k).val();
			if($('#'+FormID+' #rowLength'+k).val()!=='') Form.push($('#'+FormID+' #rowLength'+k).val()); else empty+=', '+$('#'+FormID+' #rowLength'+k).attr('placeholder')+' '+$('#'+FormID+' #assocName'+k).val();
			Form.push($('#'+FormID+' #rowPrtimary'+k).prop('checked'));
			Form.push($('#'+FormID+' #rowUniq'+k).prop('checked'));
			
		}
	}else empty+=', '+$('#'+FormID+' #countRows').attr('placeholder');
	
	
	Status = $('#'+FormID+' #FormResultStatus').val().split(',');
	if (empty!=='') 
	{
	empty = empty.substr(2,empty.length)+' ';
	
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
	toastr['error'](empty+Status[1], $('#'+FormID+' #FormTitle').val());
	}
	else
	{
		
		$.post($('#'+FormID).attr('action'), {modal:true,values:Form},function(data){
				if(data=='0')
				{
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
	toastr['success'](Status[2], $('#'+FormID+' #FormTitle').val());
	location.replace($('#'+FormID).attr('action'));
	
				}
				else {
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
	toastr['error'](Status[0]+' '+data, $('#'+FormID+' #FormTitle').val());
				}
			});
	}
	return false;
}
function FormView()
{
	varLNGS = '<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs'+numberRow+'"> <ul class="nav nav-tabs" id="Tabs'+numberRow+'" role="tablist">';
	for(i=0;i<countLangs;i++)
	{
		varLNGS+='<li role="presentation" class="';
		if (i==0) varLNGS+='active';
		varLNGS+='"><a href="#'+Langs[i].short+numberRow+'" id="'+Langs[i].short+numberRow+'-tab" role="tab" data-toggle="tab" aria-controls="'+Langs[i].short+numberRow+'" aria-expanded="false"><img src="'+Langs[i].img+'"></a> </li>';
	}
	varLNGS+='</ul><div class="tab-content" id="TContent'+numberRow+'">';
	for(i=0;i<countLangs;i++)
	{
		varLNGS+='<div class="tab-pane fade';
		if(i==0) varLNGS+=' active in';
		varLNGS+='" role="tabpanel" id="'+Langs[i].short+numberRow+'" aria-labelledby="'+Langs[i].short+numberRow+'-tab" style="margin-top: 0.8em">';
		varLNGS+='<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0.8em;padding:0px;">';
		for(k=0;k<numberRow;k++)
		{
			if ($('#MustRow'+k).prop('checked')==true) must = ' <span style="color:red">*</span>'; else must = '';
			varLNGS+='<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 0.8em;padding:0px;"><label>'+$('#rowTitle_'+k+'_'+Langs[i].langID).val()+'</label>'+must+'</div>';
			varLNGS+='<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 0.8em;padding:0px;"><label>'+selected[k]+'</label></div>';

		}
		varLNGS+='</div>';
	}
	varLNGS+='</div></div></div>';
	var w = window.open();
	var html = '<html><head><script src="'+home_url+'adminpanel/js/jquery.js"></script><script src="'+home_url+'adminpanel/js/bootstrap.min.js"></script><link href="'+home_url+'adminpanel/css/bootstrap.min.css" rel="stylesheet"><link href="'+home_url+'adminpanel/css/bootstrap-reset.css" rel="stylesheet"><link href="'+home_url+'adminpanel/css/style.css" rel="stylesheet"> </head><body>'+varLNGS;
	html+='</body></html>';

	$(w.document.body).html(html);
}