{% extends "common/base.tpl" %}
{% block title %}{{ parent() }}{% endblock %}
{% block css %}
  {{ parent() }}
  <link rel="stylesheet" href="apps/css/lunch.css">
{% endblock %}
{% block js %}
  {{ parent() }}
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFKcXCk6AcAWZvbypfdxH-0KKHHz_eKko"></script>
  <script type="text/javascript" src="apps/js/gmap3/gmap3.min.js"></script>
  <script src="apps/js/gmap3Menu.js"></script>
  <script src="apps/js/lunch.js"></script>
{% endblock %}

{% block main %}
<div class="row-fluid">
  <div class="span12">
    <div class="map-embed">
    	<div id="map-canvas">ここに地図が表示されます</div>
    </div>
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->
{% endblock %}
