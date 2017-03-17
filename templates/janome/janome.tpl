{% extends "common/base_body.tpl" %}
{% block title %}{{ parent() }}{% endblock %}
{% block css %}
  {{ parent() }}
{% endblock %}
{% block js %}
  {{ parent() }}
{% endblock %}

{% block main %}
<div class="row-fluid">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon white edit"></i><span class="break"></span>API AI リクエストフォーム</h2>
      <div class="box-icon">
        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
      </div>
    </div>
    <div class="box-content">
      <form class="form-horizontal" action='/index.php?class=Janome&method=post' method='POST'>
        <fieldset>
          <div class="control-group">
            <label class="control-label span3" for="num">message</label>
            <div class="controls">
              <input type="text" class="span9" id="message" name="message" value="{{ form_data.message }}">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-success" name="submit" value="run">API</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div><!--/span-->
</div>
<div class="row-fluid">
  <div class="span12">
    <h3>ここに結果が出るといいですね</h3>

{% if message %}
    <div class='box red'>
      <p>{{ message }}<p>
    </div>
{% endif%}
{% if result %}
    <div class='box'>
      <p>{{ result }}<p>
    </div>
{% endif%}

  </div>
</div>
<!-- /row -->


{% endblock %}
