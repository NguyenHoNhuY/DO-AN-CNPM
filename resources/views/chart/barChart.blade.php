<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>
  <section class="barChart">
    <div>
      <canvas id='myBarChart'></canvas>
      <script>
        //lay bien du lieu tu blade view sang script
        $(document).ready(function() {
          var getdata = @JSON($query);
          var tienphong = [];
          var tongtien = []
          var labels = [];
          getdata.forEach(element => {
            labels.push(element.NgayLap);
            tienphong.push(parseInt(element.TongTienPhong));
            tongtien.push(parseInt(element.TongTien));
          })
          /// loi k set duoc defaul
          let myChart = document.getElementById('myBarChart').getContext('2d');
          let barChart = new Chart(myChart, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                  label: 'Tổng doanh thu phòng',
                  data: tienphong,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(201, 203, 207, 0.5)',
                    'rgba(140, 236, 254, 0.5)',
                    'rgba(231, 83, 143, 0.5)',
                    'rgba(239, 108, 84, 0.5)',
                    'rgba(170, 168, 233, 0.5)',
                    'rgba(248, 27, 62, 0.5)',
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)',
                  ],
                  borderWidth: 1,
                  borderColor: '#777',
                  hoverBorderWidth: 2,
                  hoverBorderColor: '#000'
                },
                {
                  label: 'Tổng doanh thu khách sạn',
                  data: tongtien,
                  backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)',
                    'rgba(140, 236, 254, 1)',
                    'rgba(231, 83, 143, 1)',
                    'rgba(239, 108, 84, 1)',
                    'rgba(170, 168, 233, 1)',
                    'rgba(248, 27, 62, 1)',
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)',
                  ],
                  borderWidth: 1,
                  borderColor: '#777',
                  hoverBorderWidth: 2,
                  hoverBorderColor: '#000'
                }
              ]
            },
            options: {
              title: {
                display: true,
                text: 'MI MI Hotel',
                fontSize: 25
              },
              legend: {
                display: true,
                position: 'right',
                labels: {
                  fontColor: '#000'
                }
              },
              layout: {
                padding: {
                  left: 50,
                  right: 0,
                  bottom: 0,
                  top: 0
                }
              },
              tooltips: {
                enabled: true
              }
            }
          })
        });
      </script>
    </div>
  </section>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>