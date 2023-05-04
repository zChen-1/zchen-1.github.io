<?php
// Connect to the database
$db = new PDO('sqlite:vehicles.db');

// Retrieve the form data
$make = $_POST['Make'];
$model = $_POST['Model'];
$year = $_POST['Year'];

// Prepare the SQL statement to insert the data into the database
$stmt = $db->prepare('INSERT INTO vehicles (make, model, year) VALUES (:make, :model, :year)');
$stmt->bindValue(':make', $make);
$stmt->bindValue(':model', $model);
$stmt->bindValue(':year', $year);
$stmt->execute();

// Display a success message
echo "Your vehicle information has been saved in the database.";
?>

<html>
<head>
<style>
* {
  box-sizing: border-box;
}

header {
  background-color: #666;
  padding: 20px;
  text-align: center;
  font-size: 70px;
  color: white;
}

nav {
  text-align: left;
  width: 100%;
  height: 60px; 
  font-size: 30px;
  background: #ccc;
  padding: 10px;
}

article {
  float: center;
  padding: 100px;
  width: 100%;
  background-color: #f1f1f1;
  height: auto; 
}

footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>



<body>
<header>
  <h2>Enter Your Vechcle</h2>
</header>

<nav>
<a href="url"><span style='font-size:30px;'>&#127968;</span></a>
<a href="url"><span style='font-size:30px;'>&#128100;</span></a>
</nav>

<script>
  var models = {
    "Select the make": ["Select the model"],
    "Audi": ["Select the model","A4", "A5", "A6", "A7", "A8", "S4", "S5", "S6", "S7", "S8"],
    "BMW": ["Select the model","M4", "M5", "M6"],
    "Dodge":["Select the model"],
    "Honda":["Select the model"],
    "Jeep":["Select the model"],
    "Lexus":["Select the model"],
    "Mazda":["Select the model"],
    "Mercedes-Benz": ["Select the model","AMG A35","AMG A45","AMG C43","AMG C63","C250", "C300", "E300"],
    "Nissan":["Select the model"],
    "Toyota":["Select the model"],
    "Volvo":["Select the model"],
    // Add more makes and models here
  };

  var years = ["Select the year","2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020"];
  function updateModels() {
			var make = document.getElementById("Make").value;
			var modelSelect = document.getElementById("Model");

			// Remove existing options
			modelSelect.innerHTML = "";

			// Add new options based on selected Make
			for (var i = 0; i < models[make].length; i++) {
				var option = document.createElement("option");
				option.value = models[make][i];
				option.text = models[make][i];
				modelSelect.add(option);
			}
		}

		function updateYears() {
			var yearSelect = document.getElementById("Year");

			// Remove existing options
			yearSelect.innerHTML = "";

			// Add new options
			for (var i = 0; i < years.length; i++) {
				var option = document.createElement("option");
				option.value = years[i];
				option.text = years[i];
				yearSelect.add(option);
			}
		}
</script>
<article>
<h3>Enter you Vehicle Information</h3>

<div>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
		<label for="Make">Make</label>
		<select id="Make" name="Make" onchange="updateModels()">
      <option value="Select the make">Select the make</option>
      <option value="Audi">Audi</option>
      <option value="BMW">BMW</option>
      <option value="Dodge">Dodge</option>
      <option value="Honda">Honda</option>
      <option value="Jeep">Jeep</option>
      <option value="Lexus">Lexus</option>
      <option value="Mazda">Mazda</option>
      <option value="Mercedes-Benz">Mercedes-Benz</option>
      <option value="Nissan">Nissan</option>
      <option value="Toyota">Toyota</option>
      <option value="Volvo">Volvo</option>
			<!-- Add more makes here -->
		</select><br><br>

		<label for="Model">Model</label>
		<select id="Model" name="Model"></select><br><br>

		<label for="Year">Year</label>
		<select id="Year" name="Year"></select><br><br>

		<input type="submit" value="Submit" onclick="goToMap()">
	</form>

	<script>
		updateModels();
		updateYears();
		function goToMap() {
				// Retrieve the selected vehicle information from the form
				var make = document.getElementById("Make").value;
				var model = document.getElementById("Model").value;
    				var year = document.getElementById("Year").value;
				// Construct the query string
    				var queryString = "?make=" + encodeURIComponent(make) +
                      		"&model=" + encodeURIComponent(model) +
                      		"&year=" + encodeURIComponent(year);

    				// Redirect to the Map View page with the query string
    				window.location.href = "MapView.html" + queryString;
}

	</script>
</div>
</article>

<footer>CPSC 491</footer>

</body>
</html>
								      

