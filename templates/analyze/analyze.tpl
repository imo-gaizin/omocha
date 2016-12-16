{% extends "common/base.tpl" %}
{% block title %}{{ parent() }}{% endblock %}
{% block css %}
  {{ parent() }}
  <link rel="stylesheet" href="apps/css/hands.css">
{% endblock %}
{% block js %}
  {{ parent() }}
  <script src="apps/js/hands.js"></script>
{% endblock %}

{% block main %}
<div class="row-fluid">
  <div class="span4">
    <h3>input form</h3>
    <form action='/' method='POST' autocomplete="off" class='form-group'>
      <textarea name="deck_list" rows=20 style="max-width: 100%; width: 100%;">
        {{ list }}
      </textarea>
      <button type="submit" name="run_analyze" class='btn btn-primary btn-block'>analyze</button>
    </form>
  </div>
  <!-- end:span4 -->

  <div class="span8">
    <h3>result</h3>

    <div class="row-fluid">

    <div class="span4">
    <h4>number of cords</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>total</th>
            <th>spel</th>
            <th>land</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ result.count.total }}</td>
            <td>{{ result.count.spel }}</td>
            <td>{{ result.count.land }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
    <!-- end:span4 -->

    <!-- start:span8 -->
    <div class="span8">
    <h4>color count of lands</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
{% for color, count in result.land %}
            <th>{{ color }}</th>
{% endfor %}
          </tr>
        </thead>
        <tbody>
          <tr>
{% for color, count in result.land %}
            <td>{{ count }}</td>
{% endfor %}
          </tr>
        </tbody>
      </table>
    </div>
    </div> <!-- col-md-8 row /col-md-8 -->
    </div> <!-- col-md-8 /row -->

    <h4>need cost of each turn</h4>
{% for turn, costs in result.spel %}
    {% if loop.first %}
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
        {% for color, cost in costs %}
            {% if loop.first %}
            <th>Turn(cost)</th>
            {% endif %}
            <th>{{ color }}</th>
        {% endfor %}
          </tr>
        </thead>
        <tbody>
    {% endif %}
          <tr>
    {% for color, cost in costs %}
        {% if loop.first %}
            <th>{{ turn }}</th>
        {% endif %}
            <td>{{ cost }}</td>
    {% endfor %}
          </tr>
    {% if loop.last %}
        </tbody>
      </table>
    </div>
    {% endif %}
{% endfor %}
  </div>
  <!-- end:span8 -->
</div>
<!-- /row -->

<div class="row-fluid">
  <div class="span12">
    <h3>sample hands</h3>
{% for key, card in hands %}
  {% if loop.first %}
    <div class="card-deck-wrapper">
    <div id='sortable' class="card-deck">
  {% endif %}
      {#114.179.102.50 class="col-xs-2" style='width:120px; height:170px; background:url(img/back.jpg) no-repeat; background-size: contain;' #}
      <div class="span1 box">
        <div class="card">
          <div class="card-block">
            <h4 class="card-title">{{ card.getName }}</h4>
            <p class="card-text">{{ card.getManaRaw }}</p>
            <p class="card-text">{{ card.getType }}</p>
          </div>
        </div>
      </div>
  {% if loop.last %}
    </div>
    </div>
  {% endif %}
{% endfor %}
  </div> <!-- /col-md-12 -->
  <button type="button" id="reset" class='btn btn-danger'>restart</button>
  <button type="button" id="drow" class='btn btn-success'>drow</button>
</div> <!-- /row -->

<div class="row-fluid">
  <div class="span12">
    <h3>expect list</h3>
{% for line_key, expect_line in expect_lines %}
  {% if loop.first %}
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
      {% for key, expect in expect_line %}
          {% if loop.first %}
            <th>Turn/land</th>
          {% endif %}
            <th>{{ key }}</th>
      {% endfor %}
          </tr>
        </thead>
        <tbody>
  {% endif %}
          <tr>
  {% for expect in expect_line %}
      {% if loop.first %}
            <td>{{ line_key }}</td>
      {% endif %}
            <td>{{expect}}</td>
  {% endfor %}
          </tr>
  {% if loop.last %}
        </tbody>
      </table>
    </div>
  {% endif %}
{% endfor %}
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->

{% endblock %}
