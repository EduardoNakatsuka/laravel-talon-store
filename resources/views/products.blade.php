<div>
    <div style="background-color: lightgray; width: 100%; border: 2px solid gray;">
        @if (! $products['total'])
            <h2>
                Não foram encontrados nemhum resultado!
            </h2>
        @endif

        @foreach ($products['data'] as $product)
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

                <button
                    type="button"
                    style="background-color: green; color: white;"
                >
                    Adicionar Ao Carrinho
                </button>
            </div>
        @endforeach
    </div>
</div>
