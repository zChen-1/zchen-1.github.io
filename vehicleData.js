const csvUrl = 'vehicle.csv';

window.addEventListener('DOMContentLoaded', (event) => {
  const urlParams = new URLSearchParams(window.location.search);
  const year = urlParams.get("year");
  const make = urlParams.get("make");
  const model = urlParams.get("model");
  const yearVehicle = year;
  const modelVehicle = model;
  const makeVehicle = make;
  const receivedValue = year + " " + make + " " + model;
  document.getElementById('receivedValue').innerText = decodeURIComponent(receivedValue);
  fetch(csvUrl)
  .then((response) => response.text())
  .then((csvText) => {
    Papa.parse(csvText, {
      header: true,
      complete: (results) => {
        const vehicles = results.data;
        const vehicle = findVehicle(vehicles, makeVehicle, modelVehicle, yearVehicle);
        console.log(vehicle);
        displayCombMPG(vehicle);
      },
    });
  });

});

function findVehicle(vehicles, make, model, year) {
  return vehicles.find(
    (vehicle) =>
      vehicle.Make === make &&
      vehicle.Model === model &&
      parseInt(vehicle.Year) === year
  );
}

function displayCombMPG(vehicle) {
  if (vehicle) {
    document.getElementById('combMPG').innerHTML = `${vehicle.CombMPG}`;
  } else {
    document.getElementById('combMPG').innerHTML = 'Vehicle not found';
  }
}

function goToMapView() {
  const year = document.getElementById("Year").value;
  const make = document.getElementById("Make").value;
  const model = document.getElementById("Model").value;
  const combMPG = document.getElementById("CombMPG").value;

  window.location.href =
    "MapView.html?year=" +
    encodeURIComponent(year) +
    "&make=" +
    encodeURIComponent(make) +
    "&model=" +
    encodeURIComponent(model) +
    "&combMPG=" +
    encodeURIComponent(combMPG);
    
}

setTimeout(function() {
  window.location.href = 'MapView.html';
}, 5000);
