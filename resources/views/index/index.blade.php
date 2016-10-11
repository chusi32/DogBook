<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="author" content="DogBook,mascotas,perros,genete" />
  <title>DogBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- attach CSS styles -->
  {!!Html::style('css/bootstrap/bootstrap.min.css')!!}
  {!!Html::style('css/index/index.css')!!}
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
  
  <!-- first section - Home -->
  <div id="home" class="home">
      <div class="text-vcenter">
          <h1 class="text-success">DogBook</h1>
          <h3 class="text-success">Red Social para amantes de los canes</h3>
          <a href="#about" class="btn btn-default btn-lg">Continue</a>
      </div>
  </div>
  <!-- /first section -->
  
  <!-- second section - About -->
  <div id="about" class="pad-section">
      <div class="container">
          <div class="row">
              <div class="col-sm-6">
                  <img src="images/logo.png" alt="" />
              </div>
              <div class="col-sm-6 text-center">
                  <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in sem cras amet.</h2>
                  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed interdum metus et ligula venenatis, at rhoncus nisi molestie. Pellentesque porttitor elit suscipit massa laoreet metus.</p>
              </div>
          </div>
      </div>
  </div>
  <!-- /second section -->
  
  <!-- third section - Services -->
  <div id="services" class="pad-section">
      <div class="container">
          <h2 class="text-center">Our Services</h2> <hr />
          <div class="row text-center">
              <div class="col-sm-3 col-xs-6">
                  <i class="glyphicon glyphicon-cloud"> </i>
                  <h4>Service 1</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in sem cras amet. Donec in sem cras amet.</p>
              </div>
              <div class="col-sm-3 col-xs-6">
                  <i class="glyphicon glyphicon-leaf"> </i>
                  <h4>Service 2</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in sem cras amet. Donec in sem cras amet.</p>
              </div>
              <div class="col-sm-3 col-xs-6">
                  <i class="glyphicon glyphicon-phone-alt"> </i>
                  <h4>Service 3</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in sem cras amet. Donec in sem cras amet.</p>
              </div>
              <div class="col-sm-3 col-xs-6">
                  <i class="glyphicon glyphicon-bullhorn"> </i>
                  <h4>Service 4</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in sem cras amet. Donec in sem cras amet.</p>
              </div>
          </div>
      </div>
  </div>
  <!-- /third section -->
  
  <!-- fourth section - Information -->
  <div id="information" class="pad-section">
      <div class="container">
          <div class="row">
              <div class="col-sm-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h2 class="panel-title">Additional information</h2>
                      </div>
                      <div class="panel-body lead">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit adipiscing blandit. Aliquam placerat, velit a fermentum fermentum, mi felis vehicula justo, a dapibus quam augue non massa. Duis euismod, augue et tempus consequat, lorem mauris porttitor quam, consequat ultricies mauris mi a metus. Phasellus congue, leo sed ultricies tristique, nunc libero tempor ligula, at varius mi nibh in nisi. Aliquam erat volutpat. Maecenas rhoncus, neque facilisis rhoncus tempus, elit ligula varius dui, quis amet. 
                      </div>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h2 class="panel-title">Additional information</h2>
                      </div>
                      <div class="panel-body lead">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit adipiscing blandit. Aliquam placerat, velit a fermentum fermentum, mi felis vehicula justo, a dapibus quam augue non massa. Duis euismod, augue et tempus consequat, lorem mauris porttitor quam, consequat ultricies mauris mi a metus. Phasellus congue, leo sed ultricies tristique, nunc libero tempor ligula, at varius mi nibh in nisi. Aliquam erat volutpat. Maecenas rhoncus, neque facilisis rhoncus tempus, elit ligula varius dui, quis amet. 
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- /fourth section -->
  
  <!-- fifth section -->
  <div id="services" class="pad-section">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 text-center">
                  <h3>Parallax scrolling effect is in action</h3>
                  <h4>The next is the address on Google maps</h4>
              </div>
          </div>
      </div>
  </div>
  <!-- /fifth section -->

  <!-- google map -->
  <div id="google_map"></div>
  <!-- /google map -->

  <!-- footer -->
  <footer>
      <hr />
      <div class="container">
          <p class="text-right">Copyright &copy; Your Company 2014</p>
      </div>
  </footer>
  <!-- /footer -->



  <!-- attach JavaScripts -->
  {!!Html::script('js/jquery/jquery-3.1.0.min.js')!!}
  {!!Html::script('js/bootstrap/bootstrap.min.js')!!}
  {!!Html::script('js/scripts/main.js')!!}
</body>
</html>