<!DOCTYPE html>
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


<article>
<h3>Enter you Vehicle Information</h3>

<div>
  <form action="/action_page.php">
    <label for="Make">Make</label>
    <select id="Make" name="Make">
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

    </select>

    <label for="Model">Model</label>
    <select id="Model" name="Model" Make="Audi">
      <option value="Select the model">Select the make</option>
      <option value="A8">A8</option>
      <option value="A7">A7</option>
      <option value="A6">A6</option>
    </select>

    <label for="Year">Year</label>
    <select id="Year" name="Year" Model="A8">
    <option value="Select the year">Select the year</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option> 

   </select>
  
<input type="submit" value="Submit">
  </form>
</div>
</article>

<footer>CPSC 490</footer>

</body>
</html>
