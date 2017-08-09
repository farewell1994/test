{% include 'head.html' %}
<body>
<a class="add" href="/test/books/add">Add Book</a>
<hr>
<ol>
    {% for info in data %}
    <li class="list">
        <p>{{ info.author }} - <b>"{{ info.name }}"</b></p>
        {% if info.student_id == null %}
        <p>available. <a href="/test/books/attach/{{ info.id }}">Attach book to student</a></p>
        {% else %}
        <p> The book is now with the student {{info.student_id}}</p>
        {% endif %}
        <a href='books/edit/{{ info.id }}-{{ info.name|replace({ " ": "_" }) }}-{{ info.author|replace({ " ": "_" }) }}'>edit</a> | <a href="books/delete/{{ info.id }}">delete</a>
    </li>
    <hr>
    {% endfor %}

</ol>
</body>
</html>