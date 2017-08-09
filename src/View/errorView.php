{% include 'head.html' %}
    <body>
        <p class="error">
            {% if data.error %}
            {{data.error}}
            {% else %}
            {{data}}
            {% endif %}
        </p>
    <hr>
    </body>
</html>