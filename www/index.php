<?php
if (!empty($_GET['q'])) {
	switch ($_GET['q']) {
		case 'info':
			phpinfo();
			exit;
			break;
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laragon</title>
	<link href="./resources/fonts/karla.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="./resources/laricon.png" type="image/png">
	<style>
		*,
		:after *,
		:before * {
			box-sizing: border-box
		}

		body {
			margin: 0;
			min-height: 100vh;
			font: 100 18px Karla
		}

		aside,
		header,
		main,
		nav {
			padding: 1rem;
			margin: auto;
			max-width: 1200px;
			text-align: center
		}

		header {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center
		}

		.header__item {
			margin: 0;
			padding: 1rem
		}

		.header--logo {
			height: 8rem
		}

		h1 {
			font-size: 5rem
		}

		main {
			background-color: #f5f5f5
		}

		nav {
			width: 100%
		}

		ul {
			list-style: none;
			padding: 0;
			margin: auto
		}

		a {
			color: #37adff;
			font-weight: 900;
			text-decoration: none
		}

		a:hover {
			color: red;
			font-weight: 900;
			transition: .3s
		}

		main a {
			color: grey
		}

		nav a {
			display: block;
			margin: 1rem 0
		}

		nav a:after {
			content: '→';
			margin-left: .5rem
		}

		.alert {
			color: red;
			font-weight: 900
		}

		@media (min-width:650px) {
			h1 {
				font-size: 10rem
			}
		}

		img {
			white-space: pre
		}
	</style>
</head>

<body>
	<header>
		<img class="NO-CACHE header__item header--logo" src="https://i.imgur.com/ky9oqct.png" alt="You seems to be Offline
		<No Internet Connection>">
		<h1 class="header__item header--title" title="Laragon">Laragon</h1>
	</header>
	<main>
		<p>
			<?php print($_SERVER['SERVER_SOFTWARE']); ?>
		</p>
		<p>
			PHP version: <?php print phpversion(); ?> <span><a title="phpinfo()" href="/?q=info">info</a></span>
		</p>
		<p>
			Document Root: <?php print($_SERVER['DOCUMENT_ROOT']); ?>
		</p>
		<p>
			<a title="Getting Started" href="https://laragon.org/docs">Getting Started</a>
		</p>
	</main>
	<?php
	$ini = parse_ini_file("../usr/laragon.ini", false, INI_SCANNER_RAW);
	$check = $ini['AutoVirtualHosts'];
	$ext = isset($ini['HostnameFormat']) ? substr($ini['HostnameFormat'], strrpos($ini['HostnameFormat'], '.')) : '.test';
	$dirList = glob('*', GLOB_ONLYDIR | GLOB_NOSORT);

	if ($dirList != NULL && !(count($dirList) == 1 && $dirList[0] == 'resources')) :
	?>
		<nav>
			<ul>
				<?php
				foreach ($dirList as $key => $value) :
					if ($value == 'resources') :
						$link = 'http://localhost/resources';
						$text = 'www/Resources';
					else :
						if ($check == '-1') :
							$link = 'http://' . $value . $ext;
						else :
							$link = 'http://localhost/' . $value;
						endif;
					endif;
				?>
					<a href="<?php echo $link; ?>" target="_blank"><?php echo $text ?? $link; ?></a>
				<?php
					unset($text);
				endforeach;
				?>
			</ul>
		</nav>
	<?php
	else :
	?>
		<aside>
			<p class="alert">There are no directories, create your first project now</p>
			<div>
				Hint: <b>Opens up Laragon</b> -> Rightclick anywhere inside for Laragon <b>Menu -> Quick app</b>
			</div>
		</aside>
		<?php
		if (count($dirList) == 1) : ?>
			<nav>
				<a href="http://localhost/resources" target="_blank">www/Resources</a>
			</nav>
	<?php
		endif;
	endif;
	?>
</body>
<script src="./resources/scripts/nocache.js"></script>

</html>