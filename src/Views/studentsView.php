{% extends "app.html" %}
{% block content %}
        <a class="add" href="/test/student/add">Add Student</a>
        <hr>
        <ol>
            {% for info in data %}
            <li class="list">
                <p>Name : {{ info.name }}</p>
                <p>Age : {{ info.age }}</p>
                {% if info.books %}
                <p>Books: <b>{{info.books}}</b></p>
                {% else %}
                <p>Student without books</p>
                {% endif %}
                <a href='student/edit/{{ info.id }}-{{ info.name|replace({ " ": "_" }) }}-{{ info.age }}'>edit</a> | <a href="student/delete/{{ info.id }}">delete</a>
            </li>
            <hr>
            {% endfor %}

        </ol>
{% endblock %}
-