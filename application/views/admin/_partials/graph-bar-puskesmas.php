<script>
<?php

$noo = 1;
foreach ($namaGrafik as $ng): ?>


var dataGraph = [];

<?php if ($ng == "Jumlah Pasien"): ?>

dataGraph = [<?php foreach ($graph1 as $g1): ?> <?=$g1->jml?>, <?php endforeach?>];

<?php elseif ($ng == "Buku KTA"): ?>

// dataGraph = [4215, 5312, 6251, 7841, 9821, 9000];
dataGraph = [<?php foreach ($graph2 as $g2): ?> <?=$g2->jml?>, <?php endforeach?>];

<?php else: ?>

dataGraph = [<?php foreach ($graph3 as $g3): ?> <?=$g3->jml?>, <?php endforeach?>];

<?php endif;?>

var ctx = document.getElementById("myy<?=$noo++;?>");
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php foreach ($wilayah->result() as $item): ?> "<?=$item->kelurahan?>",
            <?php endforeach;?>
        ],
        datasets: [{
            label: "Revenue",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: dataGraph,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 6
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 10,
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ' ' + number_format(tooltipItem.yLabel);
                }
            }
        },
    }
});

<?php endforeach;?>
</script>