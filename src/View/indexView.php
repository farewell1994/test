{% include 'head.html' %}
    <body>
        <ol>
            {% for info in data %}

            <li>
                <p>Name = {{ info.name }}</p>
                <p>Age = {{ info.age }}</p>
                <a href="main/edit/{{ info.id }}-{{ info.name }}-{{ info.age }}">edit</a> | <a href="main/delete/{{ info.id }}">delete</a>
            </li>
            {% endfor %}

        </ol>
        <a href="/test/main/add">Add Student</a>
    </body>
</html>