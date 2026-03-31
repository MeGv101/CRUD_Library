fetch('./charts/chart_fecha.php')
  .then(res => res.json())
  .then(data => {
    const ctx = document.getElementById('grafico_fecha');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.map(d => d.anio),
        datasets: [{
          label: 'Libros por año',
          data: data.map(d => d.total),
          fill: false
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  });