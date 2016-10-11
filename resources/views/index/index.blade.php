<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="author" content="DogBook,mascotas,perros,genete" />
  <title>DogBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- attach CSS styles -->
  {!!Html::style('css/bootstrap/bootstrap.min.css')!!}
  <link href="css/style.css" rel="stylesheet" />
</head>
<body>

  <!--  BODY PAGE CONTENT -->
  
  <!-- navigation panel -->
  <!-- navigation panel -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Your Brand Name</a>
          </div>

          <div class="collapse navbar-collapse" id="navbar-collapse-main">
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="#home">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#information">Information</a></li>
                  <li><a href="#google_map">Contact</a></li>
                  <li><a href="https://www.script-tutorials.com/bootstrap-one-page-template-with-parallax-effect/">Back to tutorial</a></li>
              </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>

  <!-- attach JavaScripts -->
  {!!Html::script('js/jquery/jquery-3.1.0.min.js')!!}
  {!!Html::script('js/bootstrap/bootstrap.min.js')!!}
  {!!Html::script('js/scripts/main.js')!!}
</body>
</html>