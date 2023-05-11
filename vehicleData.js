const csvUrl = 'vehicle.csv';

fetch(csvUrl)
  .then((response) => response.text())
  .then((csvText) => {
    Papa.parse(csvText, {
      header: true,
      complete: (results) => {
        const vehicles = results.data;
        const vehicle = findVehicle(vehicles, 'Audi', 'A4', 2021);
        console.log(vehicle);
      },
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
