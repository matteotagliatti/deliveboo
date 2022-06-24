<div>
    <div id="hero" class="position-relative bg-dark">
        <div id="text-hero" class="text-center my-py-13 text-white position-absolute">
            <h1>Cerca</h1>
            <form action="{{ route('search.update') }}" method="post">
                @csrf

                <select name="types" id="types">
                    <option>-- Scegli la tipologia --</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->nome }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Cerca">
            </form>

        </div>
    </div>
