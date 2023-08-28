<!DOCTYPE html>
<html>
<head>
    <title>Sales and Purchases Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Sales and Purchases Chart</h1>
    <canvas id="salesPurchasesChart"></canvas>

    <script>
        var salesData = <?php echo json_encode($salesData, 15, 512) ?>;
        var purchaseData = <?php echo json_encode($purchaseData, 15, 512) ?>;

        var dates = salesData.map(item => item.created_at);
        var sales = salesData.map(item => item.quantity);
        var purchases = purchaseData.map(item => item.initial_quantity);

        var ctx = document.getElementById('salesPurchasesChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Sales',
                    data: sales,
                    borderColor: 'blue',
                    fill: false
                }, {
                    label: 'Purchases',
                    data: purchases,
                    borderColor: 'green',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day',
                            displayFormats: {
                                day: 'MMM D'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/Stock/sales_purchases_chart.blade.php ENDPATH**/ ?>