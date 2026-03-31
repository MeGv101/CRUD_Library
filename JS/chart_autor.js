fetch('./charts/chart_autor.php')
  .then(res => res.json())
  .then(data => {
    new Chart(document.getElementById('grafico_autor'), {
      type: 'bar',
      data: {
        labels: data.map(d => d.autor),
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