<div class="container">
    <div class="bg-white rounded-md border my-8 px-6 py-6 mx-40">
        <div class="text-2xl font-semibold">Charts
        </div>
        <div class="my-6">
            <div>Last Year: {{ array_sum($lastyearorders) }}</div>
            <div>This Year: {{ array_sum($thisyearorders) }}</div>
        </div>
        <canvas id="myChart"></canvas>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June' , 'Jul' , 'Aug' , 'Sep' , 'Oct' , 'Nov' , 'Dec'],
            datasets: [{
                label: 'Last Year Orders',
                data:  {{ Js::from($lastyearorders) }},
                borderWidth: 1,
                backgroundColor: 'lighgray',
                // hoverBackgroundColor: '#f06292',
                // hoverBorderColor: 'lighgray',
            }, {
                label: 'This Year Orders',
                data: {{ Js::from($thisyearorders)}},
                borderWidth: 1,
                backgroundColor: 'lightgreen',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
