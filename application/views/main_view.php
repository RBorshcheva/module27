<?php 
	$_SESSION['auth'] = false;
 ?>
<div class="container">
	<h1>Сайт - галерея изображений/h1> 
	<div class="row">
		<p>
		Просмотр галереи и комментариев возможен в гостевом режиме
		</p>

		<p>
		Добавление галереи и комментариев возможно только при авторизации
		</p>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<Button type="button" class="btn btn-outline-warning"><a href="/log">Войти</a></Button>
		</div>
		<div class="col-sm-4">
			<Button  type="button" class="btn btn-outline-warning"><a href="/form">Зарегистрироваться</a></Button>
		</div>
		<div class="col-sm-4">
			<Button type="button" class="btn btn-outline-warning"><a href="/download">Гостевой режим</a></Button>
		</div>
	</div>
</div>




