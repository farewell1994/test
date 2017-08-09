{% include 'head.html' %}
    <body>
    <p class="error">{{data.error}}</p>
        <form method="post">
            <input type="hidden" name="id" value="{{ data.0 }}">
            <input type="text" name="name" value="{{ data.1|replace({ "_": " " }) }}"><br>
            {% if data.type == 'students' %}
            <input type="text" name="age" value ="{{ data.2|replace({ "_": " " }) }}"><br>
            {% else %}
            <input type="text" name="author" value ="{{ data.2|replace({ "_": " " }) }}"><br>
            {% endif %}
            <input type="submit" name="submit" value="edit">
        </form>
        <hr>
    {% if data.type == 'students' %}
    <a href="/test">Return to students list</a>
    {% else %}
    <a href="/test/books">Return to books list</a>
    {% endif %}
    </body>
</html>