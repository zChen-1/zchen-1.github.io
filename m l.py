from flask import Flask, render_template, request
from sklearn.impute import SimpleImputer
from sklearn.ensemble import RandomForestRegressor
import pandas as pd

# Initialize the Flask application
app = Flask(__name__)

# Load the data
data = pd.read_csv('Fossil fuel.csv')

# Define the features and target
features = ['Displ', 'Cyl']
target = 'Cmb MPG'

# Impute missing values with the mean
imputer = SimpleImputer(strategy='mean')
data[features] = imputer.fit_transform(data[features])

# Train a random forest regressor
rf = RandomForestRegressor(n_estimators=100, max_depth=10, random_state=42)
rf.fit(data[features], data[target])

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/process_form', methods=['POST'])
def process_form():
    # Retrieve form data
    displ = float(request.form['displ'])
    cyl = int(request.form['cyl'])

    # Create a DataFrame with the input values
    input_data = pd.DataFrame({'Displ': [displ], 'Cyl': [cyl]})

    # Impute missing values with the mean (if any)
    input_data = imputer.transform(input_data)

    # Make the prediction
    predicted_mpg = rf.predict(input_data)

    return render_template('MapView.html', predicted_mpg=predicted_mpg[0])

if __name__ == "__main__":
    app.run(debug=True)
