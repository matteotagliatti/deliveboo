<div id="hero" class="position-relative bg-dark">
    <img  src="/img/search_ok.jpg" alt="">
    <div id="text-hero" class="text-center my-py-13 text-white position-absolute">

        <h1>Cerca</h1>
        <p>Scegli e ordina subito i tuoi piatti preferiti.</p>

        <form action="{{ route('search.update') }}" method="post">
            @csrf

            <select class="form-control mb-4" name="types" id="types">
                <option>Scegli la tipologia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ ucFirst($type->nome) }}</option>
                @endforeach
            </select>
            <input class="btn btn-primary" type="submit" value="Cerca">
        </form>

    </div>
</div>
