{% extends "app.html" %}
{% block content %}
        <p class="error">
            {% if data.error %}
            {{data.error}}
            {% else %}
            {{data}}
            {% endif %}
        </p>
    <hr>
{% endblock %}
-