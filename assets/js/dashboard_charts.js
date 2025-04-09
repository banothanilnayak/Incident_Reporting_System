document.addEventListener("DOMContentLoaded", function () {
  fetch("get_chart_data.php")
    .then((response) => response.json())
    .then((data) => {
      // Incident Status Pie Chart
      const ctx = document.getElementById("incidentsChart").getContext("2d");
      new Chart(ctx, {
        type: "pie",
        data: {
          labels: ["Open", "Resolved"],
          datasets: [
            {
              label: "Incident Status",
              data: [data.open, data.resolved],
              backgroundColor: ["#f39c12", "#00a65a"],
            },
          ],
        },
      });

      // Incident Category Bar Chart
      const barCtx = document.getElementById("categoryChart").getContext("2d");
      new Chart(barCtx, {
        type: "bar",
        data: {
          labels: data.categories.map((item) => item.name),
          datasets: [
            {
              label: "Categories",
              data: data.categories.map((item) => item.count),
              backgroundColor: "#3c8dbc",
            },
          ],
        },
      });
    })
    .catch((error) => console.error("Error loading chart data:", error));
});
