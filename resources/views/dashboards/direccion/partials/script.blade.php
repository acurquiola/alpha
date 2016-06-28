var ctx = document.getElementById("myChart");
var data = {
    labels: {!! json_encode($puertosFrecuentes) !!},
    datasets: [
        {
            label: "Procedencia",
            backgroundColor: "rgba(255, 127, 138, 1)",
            borderColor: "rgba(255, 81, 138, 1)",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(255,99,132,0.4)",
            hoverBorderColor: "rgba(255,99,132,1)",
            data: {!! json_encode($procedenciaFrecuente) !!},
        },
        {
            label: "Destino",
            backgroundColor: "rgba(46, 159, 138, 1)",
            borderColor: "rgba(71, 159, 138, 1)",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(46, 159, 138, 0.7)",
            hoverBorderColor: "rgba(71, 159, 138, 0.7)",
            data: {!! json_encode($destinoFrecuente) !!},
        }
    ]
};


var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        legend: {
            display: true
        }
    }
});