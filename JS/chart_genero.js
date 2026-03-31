fetch('./charts/chart_genero.php')
  .then(res => res.json())
  .then(data => {
    new Chart(document.getElementById('grafico_genero'), {
      type: 'pie',
      data: {
        labels: data.map(d => d.genero),
        datasets: [{
          data: data.map(d => d.total)
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  });