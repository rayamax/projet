<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
		<link href="public/css/blog.css" rel="stylesheet"> 
    </head>
    <body>
    	<?php include("header.php"); ?>
        <?= $content ?>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	    <script src="assets/js/vendor/popper.min.js"></script>
	    <script src="dist/js/bootstrap.min.js"></script>
	    <script src="assets/js/vendor/holder.min.js"></script>
	    <script>
	      Holder.addTheme('thumb', {
	        bg: '#55595c',
	        fg: '#eceeef',
	        text: 'Thumbnail'
	      });
    	</script>
    </body>
    <?php include("footer.php"); ?>
</html>