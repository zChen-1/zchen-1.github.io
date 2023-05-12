from flask import Flask, render_template, request
import pandas as pd
from sklearn.impute import SimpleImputer
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_squared_error
from sklearn.metrics import r2_score
import pandas as pd
import seaborn as sns
import numpy as np
app = Flask(__name__)


def index():
    return render_template('vehicle.html')

@app.route('/process_form', methods=['POST'])
def process_form():
    # Load the data
    data = pd.read_csv('Fossil fuel.csv')
    features = ['Displ', 'Cyl']
    target = 'Cmb MPG'

    # Impute missing values with the mean
    imputer = SimpleImputer(strategy='mean')
    data[features] = imputer.fit_transform(data[features])

    # Split the data into training and testing sets
    X_train, X_test, y_train, y_test = train_test_split(data[features], data[target], test_size=0.2)

    # Train a random forest regressor
    rf = RandomForestRegressor(n_estimators=100, max_depth=10, random_state=42)
    rf.fit(X_train, y_train)

    # Make predictions on the test set
    y_pred = rf.predict(X_test)

    # Evaluate the model using mean squared error
    mse = mean_squared_error(y_test, y_pred)

    # Calculate mean squared error and root mean squared error
    mse = mean_squared_error(y_test, y_pred)
    rmse = mse ** 0.5

    # Calculate R-squared
    r2 = r2_score(y_test, y_pred)

    # Example input values
    #displ = float(request.form['displ'])
    #cyl = int(request.form['cyl'])
    displ = 2.0
    cyl = 4

    # Create a DataFrame with the input values
    input_data = pd.DataFrame({'Displ': [displ], 'Cyl': [cyl]})

    # Impute missing values with the mean (if any)
    input_data = imputer.transform(input_data)

    # Make the prediction
    predicted_mpg = rf.predict(input_data)
    print('Predicted Combined MPG:', predicted_mpg[0])

    return predicted_mpg[0]

if __name__ == '__main__':
    app.run(debug=True)