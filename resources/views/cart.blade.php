<div>
    <div style="background-color: lightgray; width: 100%; border: 2px solid gray;">
        @if (! $products )
            <h2>
                Não tem produtos no carrinho
            </h2>
        @endif

        @foreach ($products as $product)
            <div style="margin: 2rem; border: 2px solid gray;">
                <p style="font-size: xx-large; margin-right: 1rem;">
                    {{ $product['name'] }}
                </p>

                <p style="margin-right: 1rem;">
                    Descrição: {{ $product['description'] }}
                </p>

                <p style="margin-right: 1rem;">
                    {{ $product['price'] }}
                </p>

                <form action="/products/{{ $product['id'] }}/remove">
                    <button
                        type="submit"
                        style="background-color: red; color: white;"
                    >
                        Remover Do Carrinho
                    </button>
                </form>
            </div>
        @endforeach

        @if ($products)
            <p>
                <form action="/products/checkout">
                    <button
                        type="submit"
                        style="background-color: green; color: white;"
                    >
                        Finalizar Compra
                    </button>
                </form>
            </p>
        @endif
    </div>
</div>
