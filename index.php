<?php
session_start();
if(!empty($_GET['route'])) {
	$web_page = $_SERVER['REQUEST_URI'];
    $arr = explode( '/', trim($web_page,'/'));
    $count = count($arr);
	$k=0;
	do
	{
		$k++;
		$arr[$k] = htmlspecialchars($arr[$k],ENT_QUOTES);
	}
	while($k<$count);

}
if ($arr[1]=='o')
{
	if (empty($_POST['lnk']))
	{
		?>
		<script type="text/javascript" src="http://gnatkovsky.com.ua/files/panel/panel.js"></script>
		<?
		echo '
		<div class="panel">
    <a class="handle" href="#">Смотреть</a> <!-- Ссылка для пользователей с отключенным JavaScript -->
    <h3><span > Заглавие </span></h3><br>
    <span>
        Текст или скрипт сюда
    </span>
</div>';
	}
	else
	{
		$arr_op = explode( '/', trim($_POST['lnk'],'/'));
		$count_op = count($arr_op);
		$k=0;
		do
		{
			$k++;
			$arr_op[$k] = htmlspecialchars($arr_op[$k],ENT_QUOTES);
		}
		while($k<$count_op);
	}
	echo '<div id="background"></div>';
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
home_url = 'http://localhost/buianov/';
web_page ='<?php echo $web_page; ?>';
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="./java.js"></script>


<link rel="stylesheet" href="./buianov.css">
<?
include("bd.php");
?>

<title><?php echo $site_name; ?></title>
</head>
<body onload=open_window("")>
</body>
<script>
        $(document).ready(function() {
            $('a').click(function() {
                var url = $(this).attr('href');

                $.ajax({
                    url:     url + '?ajax=1',
                    success: function(data){
                        open_window(data);
                    }
                });

                if(url != window.location){
                    window.history.pushState(null, null, url);
                }

                return false;
            });

            $(window).bind('popstate', function() {
                $.ajax({
                    url:     location.pathname + '?ajax=1',
                    success: function(data) {
                        $('#content').html(data);
                    }
                });
            });
        });
    </script>

</html>