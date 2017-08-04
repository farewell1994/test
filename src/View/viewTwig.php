<ol>
    {% for data in info %}
    <li>
        <p>Name = {{ info.name }}</p><br>
        <p>Age = {{ info.age }}</p><br>
        <a href="main/edit/{{ info.id }}-{{ info.name }}-{{ info.age }}">edit</a> | <a href="main/delete/{{ info.id }}">delete</a>
    </li>
    {% endfor %}
</ol>
<a href="/test/main/add">Add Student</a>
