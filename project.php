<?php
	$project = '';
	$firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true : false;
	$chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru"> 
<head>
	<title>Проект</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css" />
	<style type="text/css">
		.container {
			width: 400px;
			padding: 50px;
		}
		.actions {
			padding-left: 120px;
		}
		small {
			font-size: 90%;
			color: #777;
		}
		h1 small {
			display: block;
		}
		h2 {
			color: #555;
		}
		table td {
			vertical-align: middle;
		}
		table td .btn.small {
			padding: 2px 5px;
		}
	</style>

</head>	
<body>

	<div class="container">

		<h1>
			Проект <?php if (strlen($project)){ ?>&laquo;<?php echo $project; ?>&raquo;<?php } ?>
			<small>Список страниц</small>
		</h1>

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
		?>

		<table id="pages" class="condensed-table">
			<thead>
				<tr>
					<th>#</th>
					<th>Название</th>
					<th>Имя файла</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($files as $file) { ?><?php if ($file!='.' && $file!='..' && is_dir($file)==false && $file[0]!='_' && $file[0]!='.' && $file!='project.php' && (contains('.htm',$file) || contains('.php',$file))) { ?>
				<tr>
					<td style="width:20px;"><?php echo ++$counter; ?>.</td>
					<td><a href="<?php echo $file; ?>" target="_blank"><?php
							$title = str_replace('-',' ',$file);
							$title = str_replace('_',' ',$title);
							$title = str_replace('.php','',$title);
							$title = str_replace('.html','',$title);
							$title = str_replace('.htm','',$title);
							$title = ucwords($title);
							echo $title; ?></a></td>
					<td><small><?php echo $file; ?></small></td>
				</tr>
				<?php } ?>
			<?php } ?><tbody>
		</table>

	</div>

</body>
</html>