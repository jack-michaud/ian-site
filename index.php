<?php 

require_once 'vendor/rmccue/requests/library/Requests.php';
Requests::register_autoloader();

$response = Requests::get("http://api.tumblr.com/v2/blog/ian-gelman.tumblr.com/posts/?type=text&api_key=Ikq6zkk2fgBZe74S94oZSlqtmVk2kTpa4n5SKUUAHYNsiHhxkS");

$json = json_decode($response->body);

#var_dump($json);

$posts = $json->response->posts;
$number = rand(0, count($posts));


?>

<html>

<title> Where's the dingle dangle </title>

<style>

@font-face { font-family: bebas; src: url('BebasNeue.otf'); }

html{
	background: url(86bhcBM.gif) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

body{
	width: 100%;
	height: 100%;
}

div{
	position: absolute; height: 100%; width: 100%;
	display: table;
}

p{
	font-family: bebas;
	font-size: 3em;
	color: white;	

	display: table-cell;
	vertical-align: middle;
	text-align: center;
}

.link {
	position:fixed;
	left:0px;
	bottom:0px;
	height:30px;
	width:100%;
	background: none;
	font-family: bebas;
	color: white;
}

</style>

<body>
	<div>
		<p><?php  echo $posts[$number]->summary ?></p>
	</div>
	<div class="link">
		<a href="<?php echo $posts[$number]->short_url ?>">src</a> 
	</div>
</body>

</html>