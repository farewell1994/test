{% include 'head.html' %}
    <body>
        <a class="add" href="/test/main/add">Add Student</a>
        <ol>
            {% for info in data %}
            <hr>
            <li class="list">
                <p>Name = {{ info.name }}</p>
                <p>Age = {{ info.age }}</p>
                <a href="main/edit/{{ info.id }}-{{ info.name }}-{{ info.age }}">edit</a> | <a href="main/delete/{{ info.id }}">delete</a>
            </li>
            {% endfor %}

        </ol>
    </body>
</html>