
let generalOptions = {
    legend: {display: false},
    responsive: true,
    title:{
      display: true,
      text: 'Numero de Alumnos por unidad de aprendizaje'
    },
    scales: {
        yAxes: [
            {
                ticks: {
                    stepSize: 1,
                    min: 0,
                    beginAtZero: true,

                },
                offset: true
            }
        ],

    }
}
$(function () {
    let ctxs = [
        document.getElementById('alumnosByTutoria')
    ]

    $.ajax({
        url: `http://${location.hostname}/tutorias/requests/get/GraphData.php`,
        method: 'GET',
        success(res) {
            console.log(res);
            generateGraph(ctxs[0],generalOptions,res);
        }
    })


})

function generateGraph(ctxs, options, data) {

    let labels = [];
    let values = [];
    let colors = [];
    for (i = 0; i < data.length; i++){
        let label = data[i].unidad;
        let alumnos = data[i].alumnos;
        labels.push(label);
        values.push(Number(alumnos));
        colors.push()
    }

    let max = Math.max.apply(null,values);
    let min = Math.min.apply(null,values);
    console.log(max);
    for (i = 0; i < data.length; i++){
        colors.push(parseColor(values[i],max,min))
    }
    //console.log(colors);
    new Chart(ctxs,{
        stepSize: 1,
        type: 'bar',
        data: {
            labels,
            datasets: [
                {
                    label: 'Alumnos por tutoria',
                    data: values,
                    backgroundColor: colors,
                }
            ],

        },
        options
    })
}

function parseColor(n, max, min) {
    let colorSet = {
        low: 'rgba(255, 122, 104,0.5)',
        medium: 'rgba(255, 212, 0,0.5)',
        good: 'rgba(77, 211, 0,0.5)'
    }
    console.log(max)
    if (n > (max + min)/2){
        return colorSet.good;
    } else if(n > min && n <= (max + min)/2){
        return colorSet.medium;
    } else if(n == min){
        return colorSet.low;
    }
}