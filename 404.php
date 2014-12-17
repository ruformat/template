
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>404 Not Found</title>
  <?$static = "static/";?>
  <style type="text/css">
@font-face {
    font-family: "PT Sans";
    font-style: normal;
    font-weight: normal;
    src: url($static."fonts/pt_sans-web-regular-webfont.eot?#iefix") format("embedded-opentype"), url($static."fonts/pt_sans-web-regular-webfont.woff") format("woff"), url($static."fonts/pt_sans-web-regular-webfont.ttf") format("truetype");
}
@font-face {
    font-family: "PT Sans";
    font-style: italic;
    font-weight: normal;
    src: url($static."fonts/pt_sans-web-italic-webfont.eot?#iefix") format("embedded-opentype"), url($static."fonts/pt_sans-web-italic-webfont.woff") format("woff"), url($static."fonts/pt_sans-web-italic-webfont.ttf") format("truetype");
}
@font-face {
    font-family: "PT Sans";
    font-style: italic;
    font-weight: bold;
    src: url($static."fonts/pt_sans-web-bolditalic-webfont.eot?#iefix") format("embedded-opentype"), url($static."fonts/pt_sans-web-bolditalic-webfont.woff") format("woff"), url($static."fonts/pt_sans-web-bolditalic-webfont.ttf") format("truetype");
}
@font-face {
    font-family: "PT Sans";
    font-style: normal;
    font-weight: bold;
    src: url($static."fonts/pt_sans-web-bold-webfont.eot?#iefix") format("embedded-opentype"), url($static."fonts/pt_sans-web-bold-webfont.woff") format("woff"), url($static."fonts/pt_sans-web-bold-webfont.ttf") format("truetype");
}


.not-found {
	padding-top:80px;
	margin: 0 auto;
	text-align: center;
	font-family: 'PT Sans',sans-serif;
	font-size: 16px;
}

.not-found p {
	color: #999;
    display: block;
    font-size: 20px;
}

.not-found a {
	font-size: 16px;
	text-decoration: underline;
	color:#e92624;
}

h1 {
	font-size: 150px;
	font-weight: bold;
	margin: 100px 0 30px 0px;
}


  </style>

<div class="not-found" >
<? if(SITE_DIR!="/en/") { ?>
	<h1>404</h1>
	<p>Извините, страница не найдена или была удалена. Начните пожалуйста с главной страницы.</p>
	<a href="/" >Перейти на главную</a>
<? } else { ?>
	<h1>404</h1>
	<p>Sorry, page not found or has been removed. Start out the main page.</p>
	<a href="/en/" >Go to home</a>
<? } ?>	
</div>

