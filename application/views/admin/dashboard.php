<div class="main-konten">

    <!-- /Konten -->
    <div class="stat">
        <h1>RINGKASAN DATA</h1>
        <div class='banner'>
            <div class="kartu">
                <i class='ti ti-wallet'></i>
                <div class="kartu-konten">
                    <h3>Saldo Dompet</h3>
                    <h4>Rp. 999.999.999,-</h4>
                </div>
            </div>
            <div class="kartu">
                <i class='ti ti-credit-card'></i>
                <div class="kartu-konten">
                    <h3>Uang Hari Ini</h3>
                    <h4>Rp. 999.999.999,-</h4>
                </div>
            </div>
            <div class="kartu">
                <i class='ti ti-stats-up'></i>
                <div class="kartu-konten">
                    <h3>Pemasukan Bulan Ini</h3>
                    <h4>Rp. 999.999.999,-</h4>
                </div>
            </div>
            <div class="kartu">
                <i class='ti ti-stats-down'></i>
                <div class="kartu-konten">
                    <h3>Pengeluaran Bulan Ini</h3>
                    <h4>Rp. 999.999.999,-</h4>
                </div>
            </div>
        </div>
        <div class="splitter"></div>
    </div>

    <div class='overview'>
        <center>
            <h1>OVERVIEW</h1>
        </center>
        <div class="split">
            <div class='chart-line'>
                <h2>Visualisasi Keuangan Mingguan</h2>
                <div class="clBeranda"></div>
            </div>
            <div class='chart-bar'>
                <h2>Perbandingan Pemasukan dan Pengeluaran</h2>
                <div class="cbBeranda"></div>
            </div>
        </div>
    </div>
    <!-- <div class="konten-footer">
						<img src="img/duitdompet-logo.png">
						<h5>Kelompok 7 &copy; <script>document.write(today.getFullYear());</script></h5>
						<h5>Hak Cipta dilindungi Undang-undang.</h5>
                    </div> -->
    <script type="text/javascript">
		$(document).ready(function() {
            // Chart Script
            var clBerandaOpt = {
                chart: {
                    type: 'line',
                    zoom: {
                        enabled: false	
                    },
                    height: 300,
                },
                series: [{
                    name: 'Saldo',
                    data: [
                        25000,
                        200000,
                        120000,
                        50000,
                        90000
                    ]
                }],
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            var x = value / 1000;
                            if(x < 1000000)
                                return x + ' RB';
                            else if(x >= 1000000 && x < 1000000000)
                                return x + ' JT';
                            else if(x >= 1000000000)
                                return x + ' M';
                        }
                    }
                },
                xaxis: {
                    categories: [
                        getLastWeek(5),
                        getLastWeek(4),
                        getLastWeek(3),
                        getLastWeek(2),
                        getLastWeek(1)
                    ]
                },
                tooltip: {
                    enabled: true
                },
                stroke: {
                    curve: 'smooth',
                    colors: [
                        cssroot.getPropertyValue('--abu-dark').toString()
                    ]
                }
            }
            var clBeranda = new ApexCharts(document.querySelector(".clBeranda"), clBerandaOpt);
            clBeranda.render();

            var cbBerandaOpt = {
                series: [2000000,5000000],
                labels: ["Pemasukan", "Pengeluaran"],
                chart: {
                    type: 'donut',
                    height: 300
                },
                colors: ['#00bc50', '#FF4560'],
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                },
                                value: {
                                    show: true,
                                    formatter: function(value) {
                                        if(value < 1000000)
                                        {
                                            var x = value / 1000;
                                            return x + ' RB';
                                        }
                                        else if(value >= 1000000 && value < 1000000000)
                                        {
                                            var x = value / 1000000;
                                            return x + ' JT';
                                        }
                                        else if(value >= 1000000000)
                                        {
                                            var x = value / 1000000000;
                                            return x + ' M';
                                        }
                                    }
                                }
                            },
                        }
                    }
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: true,
                },

                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: [
                        dateMonth(1),
                        dateMonth(2),
                        dateMonth(3),
                        dateMonth(4),
                        dateMonth(5),
                        dateMonth(6),
                        dateMonth(7)
                    ],
                    labels: {
                        formatter: function(value) {
                            if(value < 1000000)
                            {
                                var x = value / 1000;
                                return x + ' RB';
                            }
                            else if(value >= 1000000 && value < 1000000000)
                            {
                                var x = value / 1000000;
                                return x + ' JT';
                            }
                            else if(value >= 1000000000)
                            {
                                var x = value / 1000000000;
                                return x + ' M';
                            }
                        },
                    }
                },
            };
            var cbBeranda = new ApexCharts(document.querySelector(".cbBeranda"), cbBerandaOpt);
            cbBeranda.render();
        });
	
	</script>
</div>