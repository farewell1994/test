    {% extends "app.html" %}
    {% block content %}
    <p class="list">Choose a student</p>
        <form method="post">
            <select name="id">
                {% for students in data %}
                <option value="{{students.id}}">{{students.name}}</option>
                {% endfor %}
            </select>
            <input type="submit" name="submit" value="Bind">
        </form>
        <hr>
        <a href="/test/books">Return to books list</a>
    {% endblock %}