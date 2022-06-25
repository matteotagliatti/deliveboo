@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="/dashboard">
                    &#8592; Ritorna alla Dashboard</a>
                <h1>Ordini ricevuti</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table mb-5">
                    <thead>
                        <tr>
                            <th scope="col">ID Ordine</th>
                            <th scope="col">Piatti (Quantità)</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Data e Ora</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cognome</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td scope="row">
                                    @foreach ($order->dishes as $dish)
                                        {{ $dish->nome }} ({{ $dish->pivot->quantita }})<br>
                                    @endforeach
                                </td>
                                <td scope="row">{{ $order->prezzo }}</td>
                                <td scope="row">{{ $order->indirizzo }}</td>
                                <td scope="row" class="datetime">{{ $order->data_e_ora }}</td>
                                <td scope="row">{{ $order->nome }}</td>
                                <td scope="row">{{ $order->cognome }}</td>
                                <td scope="row">{{ $order->telefono }}</td>
                                <td scope="row">{{ $order->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row">Nessun ordine ricevuto.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <h1>Statistiche</h1>
                <p>Totale ordini: {{ count($orders) }}</p>
                <div class="row">
                    <div class="col-6">
                        <p>Ordini per mese</p>
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-6">
                        <p>Ordini per anno</p>
                        <div>
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const datetimes = document.querySelectorAll('.datetime');
        const datetimesValues = Array.from(datetimes).map(datetime => datetime.textContent);
        const dates = datetimesValues.map(datetime => datetime.split(' ')[0]);
        const years = dates.map(date => date.split('-')[0]);
        const months = dates.map(date => date.split('-')[1]);
        // set months with no iteration to 0 count every istance of each month in months array
        const monthsCount = months.reduce((acc, curr) => {
            acc[curr] = acc[curr] ? acc[curr] + 1 : 1;
            return acc;
        }, {});
        const yearsCount = years.reduce((acc, curr) => {
            acc[curr] = acc[curr] ? acc[curr] + 1 : 1;
            return acc;
        }, {});

        const labels = [
            'Gennaio',
            'Febbraio',
            'Marzo',
            'Aprile',
            'Maggio',
            'Giugno',
            'Luglio',
            'Agosto',
            'Settembre',
            'Ottobre',
            'Novembre',
            'Dicembre'
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Ordini ricevuti',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [monthsCount['01'], monthsCount['02'], monthsCount['03'], monthsCount['04'], monthsCount[
                        '05'], monthsCount['06'], monthsCount['07'], monthsCount['08'], monthsCount['09'],
                    monthsCount['10'], monthsCount['11'], monthsCount['12']
                ]
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        /* Seconda chart */
        const labels2 = [
            '2020',
            '2021',
            '2022',
        ];

        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'Ordini ricevuti dopo il 2020',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [yearsCount['2020'], yearsCount['2021'], yearsCount['2022']]
            }]
        };

        const config2 = {
            type: 'bar',
            data: data2,
            options: {}
        };

        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>
@endsection
