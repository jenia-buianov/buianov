
function redirect(url){document.location.href=url;}
h = screen.height;
w = screen.width;

function count(mixed_var, mode) {
  var key, cnt = 0;
  if (mixed_var === null || typeof mixed_var === 'undefined') {
    return 0;
  } else if (mixed_var.constructor !== Array && mixed_var.constructor !== Object) {
    return 1;
  }
  if (mode === 'COUNT_RECURSIVE') {
    mode = 1;
  }
  if (mode != 1) {
    mode = 0;
  }

  for (key in mixed_var) {
    if (mixed_var.hasOwnProperty(key)) {
      cnt++;
      if (mode == 1 && mixed_var[key] && (mixed_var[key].constructor === Array || mixed_var[key].constructor ===
        Object)) {
        cnt += this.count(mixed_var[key], 1);
      }
    }
  }
  return cnt;
}

w = screen.width;
h = screen.height;
loading_value='no';
loading_done='yes';
find_errors_value=0;
languages_system_error=0;
pages_system_error=0;
loading_count = 0;
refresh_count = 0;
system_error = document.getElementsByTagName('system_error');

function loading(type,e)
{
	if (loading_now=='no')
	{
		if (type=='body')
		{
			loading_count++;
			$('body').html('<div class="loading-part animated-quick fadeOut display-none"><div class="loader-part animated-quick fadeIn" style="width: 100%; height: 100%"><div class="loader-circle"></div><div class="loader-text">BUIANOV</div></div></div>');
		}
	}
}

function loading(type,where)
{

	if (loading_value=='no'){
		if (type=='content'){loading_count++;w1=(w-214)*0.5+'px';h1=(h-138-200)*0.5+'px';
		if(loading_count==1){setTimeout($("#"+where).append('<div id="loading-background"></div>'),5000);}else{$("#loading-background").fadeIn(1000);}$("#"+where).append('<div id="loading-content'+loading_count+'" style="margin-left:'+w1+'"></div>').fadeIn(1000);}
		if (type=='body'){w1=(w-214)*0.5+'px';h1=(h-138-200)*0.5+'px';setTimeout($("body").append('<div class="loading-part animated-quick fadeOut display-none"><div class="loader-part animated-quick fadeIn" style="width: 100%; height: 100%"><div class="loader-circle"></div><div class="loader-text">BUIANOV</div></div></div>'),5000);}
		if (type=='small'){loading_count = loading_count+1;w1=(w-214)*0.5+'px';$("#"+where).append('<div id="loading-text'+loading_count+'" style="margin-left:'+w1+'">Loading</div>').fadeIn(1000);}
		loading_value='yes';
	}
}


function find_errors()
{
	content = $("html").html();
	if (parseInt(count(content.split('id="error"')))>1)
	{
		error_ = $("#error").html();
		$("body").html('<div id="error">'+error_+'</div>');
		return true;
	}
	else{
		return true;
	}

}


function loading_off(type,where)
{
	if (loading_value=='yes'){
		if (type=='content'){$("#loading-content"+loading_count).css('display','none');$("#loading-background").css('display','none');}
		if (type=='body'){clearTimeout($("body").append('<div class="loading-part animated-quick fadeOut display-none"><div class="loader-part animated-quick fadeIn" style="width: 100%; height: 100%"><div class="loader-circle"></div><div class="loader-text">BUIANOV</div></div></div>'));$(".loading-part").css('display','none');}
		if (type=='small'){$("#loading-text"+loading_count).css('display','none');}
		loading_value='no';
	}

}
function open_window(lnk)
{
	loading('body','');
	$.post(home_url+'o', {lnk:lnk},function(data){
		$("body").html(data);
		if (find_errors()) loading_off('body','');
	});
}