<div>
    <div style="width: 100%; display: flex; justify-content: space-between; height: 50px; background-color: darkseagreen; padding-top: 1rem; padding-left: 1rem;">
        <form action="/products/search" method="GET">
            <input
                placeholder="Procure os produtos"
                type="text"
                name="search"
                value=""
            >

            <button
                style="background-color: gray; color: white;"
                type="submit"
            >
                Pesquisar
            </button>
        </form>

        <form action="/login" method="POST">
            @csrf
            <div style="float: right; display: flex;">
                <div style="margin-right: 1rem;">
                    <input
                        placeholder="E-mail"
                        type="email"
                        name="email"
                        value=""
                    >
                </div>

                <div style="margin-right: 1rem;">
                    <input
                        placeholder="Senha"
                        type="password"
                        name="password"
                        value=""
                    >
                </div>

                <div style="margin-right: 1rem;">
                    <button
                        style="background-color: gray; color: white;"
                        type="submit"
                    >
                        Logar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <h1>
        Bem Vindo A Talon Store!
    </h1>

    <a href="/cart">
        Ir para o carrinho
    </a>

    <div style="background-color: lightgray; width: 100%; border: 2px solid gray;">
        @if (Auth::user())
            <p>
                <form action="/products/add" method="POST">
                    @csrf

                    <input
                        placeholder="Nome Do Produto"
                        type="text"
                        required="true"
                        name="name"
                        value=""
                    >

                    <input
                        placeholder="Preço"
                        type="number"
                        required="true"
                        name="price"
                        value=""
                    >

                    <input
                        placeholder="Descrição"
                        type="text"
                        name="description"
                        value=""
                    >

                    <button
                        type="submit"
                        style="background-color: blue; color: white;"
                    >
                        Adicionar Novo Produto
                    </button>
                </form>
            </p>
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
                    Preço: R$ {{ $product['price'] }}
                </p>

                <form action="/products/{{ $product['id'] }}/add" method="GET">
                    <button
                        type="submit"
                        style="background-color: green; color: white;"
                    >
                        Adicionar Ao Carrinho
                    </button>
                </form>

                @if (Auth::user())
                    <form action="/products/{{ $product['id'] }}/delete" method="GET">
                        <button
                            type="submit"
                            style="background-color: red; color: white;"
                        >
                            Deletar Produto
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
