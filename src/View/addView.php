{% include 'head.html' %}
        <p class="error">{{data.error}}</p>
        </br>
        <form method="post">
            <input type="text" name="name" placeholder="name"><br>
            {% if data.type == 'students' %}
            <input type="text" name="age" placeholder ="age"><br>
            {% else %}
            <input type="text" name="author" placeholder ="author"><br>
            {% endif %}
            <input type="submit" name="submit" value="add">
        </form>
        </hr>
        {% if data.type == 'students' %}
        <a href="/test">Return to students list</a>
        {% else %}
        <a href="/test/books">Return to books list</a>
        {% endif %}
    </body>
</html>