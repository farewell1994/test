{% include 'head.html' %}
    <body>
    <p>{{data.error}}</p>
        <form method="post">
            <input type="hidden" name="id" value="{{data.0}}">
            <input type="text" name="name" value="{{data.1}}"><br>
            <input type="text" name="age" value ="{{data.2}}"><br>
            <input type="submit" name="submit" value="edit">
        </form>
        <a href="/test">Return to list</a>
    </body>
</html>