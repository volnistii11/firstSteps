<h2>Ваши заказы:</h2>

<div id="accordion">
    {% if orders is defined %}

    {% for order_number, order in orders %}

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{order_number}}"
                        aria-expanded="false"
                        aria-controls="collapse{{order_number}}">
                    Номер заказа : {{order_number}}
                </button>
            </h5>
        </div>

        <div id="collapse{{order_number}}" class="collapse" aria-labelledby="heading{{order_number}}"
             data-parent="#accordion">
            <div class="card-body">
                {% for item in order %}
                    <div class="alert alert-primary" role="alert">
                        Наименование: {{item.name}} - Цена: {{item.price}}
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
    {% endfor %}
    {% endif %}
</div>
