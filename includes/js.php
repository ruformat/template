<?$js_folder = "/template/static/".VERSION."/js";?>
<script src="<?=$js_folder?>/jquery.js"></script>
<?
$include_folder = $_SERVER["DOCUMENT_ROOT"]."/static/js/modules";
if(file_exists($include_folder))
{
	$handle = opendir($include_folder);
	while (false !== ($file = readdir($handle))) 
		if(substr($file, -3) == ".js"):?>
<script src="<?=$js_folder?>/modules/<?=$file?>"></script>	
		<?endif;
}?>
<script src="<?=$js_folder?>/init.js"></script>
<script src="<?=$js_folder?>/script.js"></script>
<!--[if lt IE 9]><script src="<?=$js_folder?>/ie9.js"></script><![endif]-->