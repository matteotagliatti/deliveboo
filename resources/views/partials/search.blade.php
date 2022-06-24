<div id="hero" class="position-relative bg-dark">
    <div id="text-hero" class="text-center my-py-13 text-white position-absolute">
        <h1>Cerca</h1>
        <form action="{{ route('search.update') }}" method="post">
            @csrf

            <select class="form-control mb-2" name="types" id="types">
                <option>Scegli la tipologia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ ucFirst($type->nome) }}</option>
                @endforeach
            </select>
            <input class="btn btn-primary" type="submit" value="Cerca">
        </form>

    </div>
</div>
