<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo h($heading)?></title>
</head>
<body>
	<div id="container">
		<h1><?php echo h($heading)?></h1>
		<?php echo$message?>
		<a href="<?php echo getBaseUrl()?>">トップへ</a>
	</div>
</body>
</html>