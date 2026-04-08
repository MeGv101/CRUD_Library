function descargarPDF() {
  const elemento = document.getElementById('report');

  html2pdf()
    .from(elemento)
    .save('reporte_biblioteca.pdf');
}