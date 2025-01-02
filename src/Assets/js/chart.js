function genChart(id, labels, data) {
    let result = {
      values: [],
      counts: [],
    };

    for (let key of labels) {
      result.values.push(data[key].val);
      result.counts.push(data[key].counts);
    }

    var ctx = document.getElementById(`${id}`).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Liczba',
            data: result.counts,
            backgroundColor: [
              'rgba(54, 162, 235)'
            ],
            borderWidth: 1
          },
          {
            label: 'Wartość',
            data: result.values,
            backgroundColor: [
              'rgba(255, 99, 132)'
            ],
            borderWidth: 1
          }
        ]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
    });   
}