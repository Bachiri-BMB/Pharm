<!DOCTYPE html>
<html>
<head>
    <title>Sales and Purchases Chart</title>
    <script src="{{ asset('jambasangsang/js/pages/chart-apex.js') }}"></script>
</head>
<body>
    <h1>Sales and Purchases Chart</h1>
    <div id="chart"></div>

    <script>
        var salesData = @json($salesData);
        var purchaseData = @json($purchaseData);

        var options = {
            chart: {
                type: 'line'
            },
            series: [
                {
                    name: 'Sales',
                    data: salesData.map(item => [new Date(item.created_at).getTime(), item.quantity])
                },
                {
                    name: 'Purchases',
                    data: purchaseData.map(item => [new Date(item.created_at).getTime(), item.initial_quantity])
                }
            ],
            xaxis: {
                type: 'datetime'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
</body>
</html>
