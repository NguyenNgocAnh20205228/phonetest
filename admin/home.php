
<?php
$servername = "localhost";
$database = "web2";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
$data = array();
$query = "SELECT lsp.TenLSP AS TenHang, SUM(hd.TongTien) AS DoanhThu
FROM loaisanpham lsp
JOIN sanpham sp ON lsp.MaLSP = sp.MaLSP
JOIN chitiethoadon cthd ON sp.MaSP = cthd.MaSP
JOIN hoadon hd ON cthd.MaHD = hd.MaHD
GROUP BY lsp.TenLSP";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

?>


<div class="home" style="display: flex;     display: flex;
    align-items: center;
    justify-content: space-around;" >

    <div class="canvasContainer">
        <canvas id="myChart1"></canvas>

    </div>

    <div class="canvasContainer">
        <canvas id="myChart2"></canvas>
    </div>
</div>
<script>
    $(document).ready(function () {
        show();
        show1();

    });
    function show(){
        var labels = [];
        var result = [];
        <?php foreach ($data as $row) { ?>
            labels.push("<?php echo $row['TenHang'] ?>");
            result.push(<?php echo $row['DoanhThu'] ?>);
                <?php } ?>
        var pie = $("#myChart1");
        var myChart = new Chart(pie, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [
                    {
                        data: result,
                        borderColor: ["rgba(217, 83, 79,1)","rgba(240, 173, 78, 1)","rgba(92, 184, 92, 1)"],
                        backgroundColor: ["rgba(217, 83, 79,0.2)","rgba(240, 173, 78, 0.2)","rgba(92, 184, 92, 0.2)"],
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: "Doanh Thu"
                }
            }

        });
    };
        function show1(){
            var labels = [];
            var result = [];
            <?php foreach ($data as $row) { ?>
            labels.push("<?php echo $row['TenHang'] ?>");
            result.push(<?php echo $row['DoanhThu'] ?>);
            <?php } ?>
            var options = {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        display: true
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            var myChart = {
                labels: labels,
                datasets: [
                    {
                        label: 'Số lượng bán từng hãng',
                        backgroundColor: '#17cbd1',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#0ec2b6',
                        hoverBorderColor: '#42f5ef',
                        data: result
                    }
                ]
            };

            var bar = $("#myChart2");
            var barGraph = new Chart(bar, {
                type: 'bar',
                data: myChart,
                options: options
            });
        };

</script>