{% extends "app.html" %}
{% block content %}
<a class="add" href="/test/books/add">Add Book</a>
<hr>
<ol>
    {% for info in data %}
    <li class="list">
        <p>{{ info.author }} - <b>"{{ info.title }}"</b></p>
        {% if info.name == null %}
        <p>available. <a href="/test/books/bind/{{ info.id }}">Bind book to student</a></p>
        {% else %}
        <p> The book is now with the student <b>{{info.name}}</b>. <a href=/test/book/unbind/{{ info.id }}>Unbind</a></p>
        {% endif %}
        <a href='books/edit/{{ info.id }}-{{ info.title|replace({ " ": "_" }) }}-{{ info.author|replace({ " ": "_" }) }}'>edit</a> | <a href="books/delete/{{ info.id }}">delete</a>
    </li>
    <hr>
    {% endfor %}

</ol>
{% endblock %}