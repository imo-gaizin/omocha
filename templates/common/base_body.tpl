{% extends "common/base.tpl" %}
{% block title %}{{ parent() }}{% endblock %}
{% block css %}
  {{ parent() }}
{% endblock %}
{% block js %}
  {{ parent() }}
{% endblock %}

{% block body %}
    <!-- start: Header -->
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><span> OMOCHA within a company </span></a>
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
            <li><a href="index.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> OTRS Ticket </span></a></li>
            <li><a href="index.php?class=TensorFlow&method=index"><i class="icon-list-alt"></i><span class="hidden-tablet"> TensorFlow Predict </span></a></li>
            <li><a href="index.php?class=XmonApi&method=index"><i class="icon-list-alt"></i><span class="hidden-tablet"> X-MON Api </span></a></li>
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
{% endblock %}
