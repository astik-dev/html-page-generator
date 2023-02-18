<html>
    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>Admin panel</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/admin-panel.css">

    </head>
<body>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$login = $_POST['login'];
  	$password = $_POST['pass'];



	function error() {
  		echo "<div class='modal-error-wrapper'>
  				  <div class='modal-error'>
  				      <p>Error! Wrong password!</p>
  				  </div>
  			  </div>";
  		header("refresh: 4; url=index.html");
  	}



  	function openAdminPanel() {
  		echo '<div class="wrapper">
			    <header class="header">
			        <h1 class="header__title">Admin Panel</h1>
			    </header>
			    <main class="main">
			        <h2 class="main__title">Creating new HTML page:</h2>
			        <form action="create.php" method="post" enctype="multipart/form-data">
			            <div class="main__file file">
			                <div class="file__name">
			                    <h3>File name:</h3>
			                    <input type="text" name="file-name">
			                </div>
			                <div class="file__image">
			                    <h3>Image:</h3>
			                    <input type="file" name="image">
			                </div>
			                <div class="file__text-section">
			                    <h2>Text section 1</h2>
			                    <h3>Title:</h3>
			                    <input type="text" name="title-1">
			                    <h3>Text:</h3>
			                    <textarea name="text-1" rows="7"></textarea>
			                </div>
			                <div class="file__text-section">
			                    <h2>Text section 2</h2>
			                    <h3>Title:</h3>
			                    <input type="text" name="title-2">
			                    <h3>Text:</h3>
			                    <textarea name="text-2" rows="7"></textarea>
			                </div>
			                <div class="file__text-section">
			                    <h2>Text section 3</h2>
			                    <h3>Title:</h3>
			                    <input type="text" name="title-3">
			                    <h3>Text:</h3>
			                    <textarea name="text-3" rows="7"></textarea>
			                </div>
			                <div class="file__text-section">
			                    <h2>Text section 4</h2>
			                    <h3>Title:</h3>
			                    <input type="text" name="title-4">
			                    <h3>Text:</h3>
			                    <textarea name="text-4" rows="7"></textarea>
			                </div>
			                <div class="file__text-section">
			                    <h2>Text section 5</h2>
			                    <h3>Title:</h3>
			                    <input type="text" name="title-5">
			                    <h3>Text:</h3>
			                    <textarea name="text-5" rows="7"></textarea>
			                </div>
			                <div class="file__text-section">
			                    <h2>Text section 6</h2>
			                    <h3>Title:</h3>
			                    <input type="text" name="title-6">
			                    <h3>Text:</h3>
			                    <textarea name="text-6" rows="7"></textarea>
			                </div>
			                <div class="file__submit">
			                    <input type="submit" value="Create">
			                </div>
			            </div>
			        </form>    
			    </main>
			  </div>';
  	}

	if ($login === "root") {

  		if ($password === "toor") {
  			openAdminPanel();
  		} else {
  			error();
  		}

  	} else {
  		error();
  	}
}
?>

</body>
</html>