<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?=BACKEND_URL?>favicon.ico" />
<title>Ver para creer</title>
<link rel="stylesheet" href="<?=BACKEND_URL?>css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?=BACKEND_URL?>css/jquery.autocomplete.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?=BACKEND_URL?>css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?=BACKEND_URL?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?=BACKEND_URL?>js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?=BACKEND_URL?>js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?=BACKEND_URL?>js/jquery/jquery.bind.js" type="text/javascript"></script>
<script src="<?=BACKEND_URL?>js/jquery/jquery.autocomplete.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?=BACKEND_URL?>js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>


<![endif]>

<!--  styled select box script version 2 -->
<script src="<?=BACKEND_URL?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 -->
<script src="<?=BACKEND_URL?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script -->
<script src="<?=BACKEND_URL?>js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({
          image: "<?=BACKEND_URL?>images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="<?=BACKEND_URL?>js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- Tooltips -->
<script src="<?=BACKEND_URL?>js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?=BACKEND_URL?>js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true,
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?=BACKEND_URL?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body>
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
<!--  start nav-outer -->
<div class="nav-outer">

		<!-- start nav-right -->
		<div id="nav-right">

			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><?=$user->nombre;?></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="<?=BACKEND_URL?>logout/" id="logout"><img src="<?=BACKEND_URL?>images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
                    <div class="table">
                        <?php
                        /*echo dirname($_SERVER["REQUEST_URI"]);*/
                        $uri = dirname($_SERVER["REQUEST_URI"])."/";
                        /*echo $uri;*/
                        $current = "";
                        foreach($menu as $items=>$item){
                        $class = "";
                        if($uri == dirname($item->url)."/"){$current = $item->name;$class="current";}else{$class="select";}
                        ?>
                        <ul class="<?=$class?>">
                            <li>
                                <a href="<?=$item->url?>"><b><?=$item->name?></b><!--[if IE 7]><!--></a><!--<![endif]-->
                            </li>
                        </ul>
                        <div class="nav-divider">&nbsp;</div>
                        <?
                        }
                        ?>
                    </div>
        	</div>
		<!--  start nav -->

</div>

<!--  start nav-outer -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".icon-2").click(function(e){
            var bool = false;
            bool = confirm("¿Seguro que desea borrar este <?=$current?>?");
            if(bool)
            {
                document.location = ""+$(this).attr("href")+"" ;
            }
            else
            {
               e.preventDefault();
            }
        });
    });
</script>
</div>
<!--  start nav-outer-repeat................................................... END -->