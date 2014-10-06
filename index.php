<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru"> 
<head>
	<title>Верстка</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" href="http://demo.ruformat.ru/project/bootstrap.css" />
	<link rel="stylesheet" href="http://demo.ruformat.ru/project/icons.css" />
	<link rel="stylesheet" href="http://demo.ruformat.ru/project/style.css" />
</head>	
<body>

	<div class="page">
		<div class="container">

			<h1>Верстка</h1>
			<h3><i class="icon-file"></i> Список страниц</h3>

			<div class="content">

				<?php
					function contains($substring, $string) {
						$pos = strpos($string, $substring);
						if ($pos === false) {
							return false;
						} else {
							return true;
						}
					}
					$counter = 0;
					$files = array();
					$handle = opendir('.');
					while (false !== ($file = readdir($handle))) array_push($files, $file);
					sort($files);
					if (in_array('main.php',$files)){
						$index = array_search('main.php',$files);
						unset($files[$index]);
						array_unshift($files, 'main.php');
					}
				?>

				<table id="pages" class="condensed-table table">
					<thead>
						<tr>
							<th>#</th>
							<th>Название</th>
							<th>Имя файла</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($files as $file) { ?><?php if ($file!='.' && $file!='..' && is_dir($file)==false && $file[0]!='_' && $file[0]!='.' && $file!='index.php' && (contains('.htm',$file) || contains('.php',$file))) { ?>
						<tr>
							<td style="width:20px;"><?php echo ++$counter; ?>.</td>
							<td>
								<a href="<?php echo $file; ?>" target="_blank">
									<?unset($title);ob_start();include($file);ob_end_clean();
									if(!strlen($title)) $title = ucwords(str_replace(array('-','_','.php','.html','.htm'),array(' ',' ','','',''),$file));?>
									<?echo $title; ?>
								</a>
							</td>
							<td><small><?php echo $file; ?></small></td>
						</tr>
						<?php } ?>
					<?php } ?><tbody>
				</table>

			</div>

		</div>

	</div>

</body>
</html>