document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById("incidentsChart").getContext("2d");
  const incidentsChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Open", "Resolved"],
      datasets: [
        {
          label: "Incident Status",
          data: [12, 8],
          backgroundColor: ["#f39c12", "#00a65a"],
        },
      ],
    },
  });

  const barCtx = document.getElementById("categoryChart").getContext("2d");
  const categoryChart = new Chart(barCtx, {
    type: "bar",
    data: {
      labels: ["Phishing", "Malware", "Unauthorized Access"],
      datasets: [
        {
          label: "Categories",
          data: [5, 3, 2],
          backgroundColor: "#3c8dbc",
        },
      ],
    },
  });
});
