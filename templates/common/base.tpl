<!DOCTYPE html>
<html lang="ja">
  <head>
    <!-- start: Meta -->
    <meta charset="UTF-8">
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
{% block title %}
    <title>OMOCHA</title>
{% endblock %}

{% block css %}
    <link id="bootstrap-style" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="bootstrap/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="bootstrap/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
{% endblock %}

{% block js %}
  <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
  <script src="bootstrap/js/jquery-migrate-1.0.0.min.js"></script>
  <script src="bootstrap/js/jquery-ui-1.10.0.custom.min.js"></script>
  <script src="bootstrap/js/jquery.ui.touch-punch.js"></script>
  <script src="bootstrap/js/modernizr.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/jquery.cookie.js"></script>
  <script src='bootstrap/js/fullcalendar.min.js'></script>
  <script src='bootstrap/js/jquery.dataTables.min.js'></script>
  <script src="bootstrap/js/excanvas.js"></script>
  <script src="bootstrap/js/jquery.flot.js"></script>
  <script src="bootstrap/js/jquery.flot.pie.js"></script>
  <script src="bootstrap/js/jquery.flot.stack.js"></script>
  <script src="bootstrap/js/jquery.flot.resize.min.js"></script>
  <script src="bootstrap/js/jquery.chosen.min.js"></script>
  <script src="bootstrap/js/jquery.uniform.min.js"></script>
  <script src="bootstrap/js/jquery.cleditor.min.js"></script>
  <script src="bootstrap/js/jquery.noty.js"></script>
  <script src="bootstrap/js/jquery.elfinder.min.js"></script>
  <script src="bootstrap/js/jquery.raty.min.js"></script>
  <script src="bootstrap/js/jquery.iphone.toggle.js"></script>
  <script src="bootstrap/js/jquery.uploadify-3.1.min.js"></script>
  <script src="bootstrap/js/jquery.gritter.min.js"></script>
  <script src="bootstrap/js/jquery.imagesloaded.js"></script>
  <script src="bootstrap/js/jquery.masonry.min.js"></script>
  <script src="bootstrap/js/jquery.knob.modified.js"></script>
  <script src="bootstrap/js/jquery.sparkline.min.js"></script>
  <script src="bootstrap/js/counter.js"></script>
  <script src="bootstrap/js/retina.js"></script>
  <script src="bootstrap/js/custom.js"></script>
{% endblock %}
  </head>

  <body>
    <!-- start: Header -->
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><span>OMOCHA</span></a>
          <!-- start: Header Menu -->
  				<div class="nav-no-collapse header-nav">
  					<ul class="nav pull-right">
            </ul>
          </div>
          <!-- end: Header Menu -->
        </div>
      </div>
    </div>
    <!-- end: Header -->

    <!-- start: Main -->
    <div class="container-fluid-full">
    <div class="row-fluid">

      <!-- start: Main Menu -->
      <div id="sidebar-left" class="span2">
        <div class="nav-collapse sidebar-nav">
          <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet">Analyze</span></a></li>
            <li><a href="lunch.php"><i class="icon-bar-chart"></i><span class="hidden-tablet">LunchMap</span></a></li>
          </ul>
        </div>
      </div>
      <!-- end: Main Menu -->

      <!-- start: Error -->
      <noscript>
        <div class="alert alert-block span10">
          <h4 class="alert-heading">Warning!</h4>
          <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
      </noscript>
      <!-- end: Error -->

      <!-- start: Content -->
      <div id="content" class="span10">
{% block main %}

{% endblock %}
      </div>
      <!-- end: Content -->
    </div>
    </div>
    <!-- end: Main -->

    <footer>
      <p>
        <span style="text-align:left;float:left">OMOCHA 2016</span>
      </p>
    </footer>
  </body>
</html>
