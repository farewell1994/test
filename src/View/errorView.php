{% include 'head.html' %}
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