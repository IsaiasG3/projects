const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});

const mapLines = document.querySelector('#map-lines');
const line1 = document.querySelector('#line-1');
const line2 = document.querySelector('#line-2');
const line3 = document.querySelector('#line-3');
const line4 = document.querySelector('#line-4');

line1.setAttribute('x1', '25%');
line1.setAttribute('y1', '50%');
line1.setAttribute('x2', '50%');
line1.setAttribute('y2', '25%');

line2.setAttribute('x1', '50%');
line2.setAttribute('y1', '25%');
line2.setAttribute('x2', '75%');
line2.setAttribute('y2', '50%');

line3.setAttribute('x1', '75%');
line3.setAttribute('y1', '50%');
line3.setAttribute('x2', '50%');
line3.setAttribute('y2', '75%');

line4.setAttribute('x1', '50%');
line4.setAttribute('y1', '75%');
line4.setAttribute('x2', '25%');
line4.setAttribute('y2', '50%');