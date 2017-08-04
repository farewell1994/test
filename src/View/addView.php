{% include 'head.html' %}
    <body>
        <p>{{data}}</p>
        </br>
        <form method="post">
            <input type="text" name="name" placeholder="name"><br>
            <input type="text" name="age" placeholder ="age"><br>
            <input type="submit" name="submit" value="add">
        </form>
        <hr>
        <a href="/test">Return to list</a>
    </body>
</html>