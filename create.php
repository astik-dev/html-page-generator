<html>
    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>Creating...</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">

        <style type="text/css">
        	@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        	div {
        		padding: 100px 0 0 0;
        		text-align: center;

        		font-family: 'Roboto', sans-serif;	
        	}
        	img {
        		display: inline-block;
        		width: 60px;
        		height: 60px;
        		margin: 0 0 20px 0;
        	}
        	p {
        		color: red;
        		font-size: 16px;
        		line-height: 24px;		
        	}
        </style>

    </head>
<body>

<div>
	<img src="img/loading.gif" alt="Loading Image">


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Статичные данные
	$siteName = "SITE NAME";
	$redTextUppercase = "text text text";
	$retText = "text text text";

	$fileName = $_POST['file-name'];

	if (!empty($fileName and $fileName != "index")) {

		$errorTime = 1;

	    $title = [];
	  	$text = [];

	  	// Получаем данные с формы в массивы
	  	for ($i = 1; $i <= 6; $i++) {
		    array_push($title, $_POST["title-{$i}"]);
		    array_push($text, $_POST["text-{$i}"]);
		}

		// каталог для хранения изображения
		$imgDir = "img/$fileName/"; 

	    if (!file_exists($imgDir)) {
	        // создаем каталог, если его еще нет
	        mkdir($imgDir, 0777); 
	    }
	 
	    $data = $_FILES ['image'];
	    $tmp = $data ['tmp_name'];
	    global $imgName;
	    $imgName = "#";
	 	
	 	// Проверяем, принят ли файл
	    if (file_exists($tmp)) {
	        $info = getimagesize($_FILES ['image'] ['tmp_name']); //Функция вернет размер изображения, тип файла, height, width, а также тип содержимого HTTP
	        // Проверяем, является ли файл изображением,
	        if (preg_match('{image/(.*)}is', $info['mime'], $p)) {
	            // Имя берем равным текущему времени в секундах, а
	            // расширение — как часть MIME-типа после "image".
	            
	            $imgName = "$imgDir" . "img." . $p [1];
	            // Добавляем файл в каталог с фотографиями.
	            move_uploaded_file($tmp, $imgName);
	        } else {
	            echo "<p>Error! An attempt was made to add an invalid file format!</p>";
	            $errorTime = 4;
	        }
	    } else {
	        echo "<p>Photo upload error #{$data['error']}!</p>";
	        $errorTime = 4;
	    }



	    $fileHTML = "{$fileName}.html";
	    $html = "
	    		<html>
				    <head>

				        <meta charset='UTF-8'>

				        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'>

				        <title>{$siteName}</title>
				  
				        <link rel='stylesheet' type='text/css' href='css/reset.css'>
				        <link rel='stylesheet' type='text/css' href='css/new-page.css'>

				    </head>
				<body>

				    <div class='wrapper'>
				        <header class='header'>
				            <h1 class='header__title'>{$siteName}</h1>
				            <div class='header__images'>
				                <img src='img/PHP.png' alt='Image' class='header__image'>
				                <img src='img/git.png' alt='Image' class='header__image'>
				                <img src='img/github.png' alt='Image' class='header__image'>
				            </div>
				        </header>
				        <main class='main'>
				            <section class='exclamation-point'>
				                <img src='img/HTML5.png' alt='!' class='exclamation-point__image'>
				                <div class='exclamation-point__text'>
				                    <p>{$redTextUppercase}</p>
				                    <p>{$retText}</p>
				                </div>
				            </section>
				            <hr>
				            <section class='image-content'>
				                <p>IMAGE:</p>
				                <img src='{$imgName}' alt='Image'>
				            </section>
				            <section class='content'>
				                <p class='content__item'><span class='content__bold-text'>{$title[0]} </span>{$text[0]}</p>
				                <p class='content__item'><span class='content__bold-text'>{$title[1]} </span>{$text[1]}</p>
				                <p class='content__item'><span class='content__bold-text'>{$title[2]} </span>{$text[2]}</p>
				                <p class='content__item'><span class='content__bold-text'>{$title[3]} </span>{$text[3]}</p>
				                <p class='content__item'><span class='content__bold-text'>{$title[4]} </span>{$text[4]}</p>
				                <p class='content__item'><span class='content__bold-text'>{$title[5]} </span>{$text[5]}</p>
				            </section>
				            <hr>
				            <section class='exclamation-point'>
				                <img src='img/HTML5.png' alt='!' class='exclamation-point__image'>
				                <div class='exclamation-point__text'>
				                    <p>{$redTextUppercase}</p>
				                    <p>{$retText}</p>
				                </div>
				            </section>
				        </main>
				        <footer class='footer'>
				            <p>2023 (с)</p>
				        </footer>
				    </div>

				</body>
				</html>
	            ";

	    file_put_contents($fileHTML, $html);

	    header("refresh: {$errorTime}; url={$fileHTML}");

	} else {
		echo "<p>Error! Wrong file name!</p>";
		header("refresh: 4; url=index.html");
	}
}

?>
</div>

</body>
</html>