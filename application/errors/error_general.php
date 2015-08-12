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
		<?php if (ENVIRONMENT === 'development'):?>
		<?php echo $message?>
		<?php else:?>
		<p>しばらく時間をおいて、再度お試しください。</p>
		<?php endif?>
		<a href="<?php echo error_return_url()?>">戻る</a>
	</div>
</body>
</html>