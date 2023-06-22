import csv
import joblib
import pandas as pd
import os

loaded_gb = joblib.load(r"Model\smoking_detection_v2_gb.joblib")

def predict_smoker(new_data) :
    data = [
        new_data 
    ]

    filename = 'health_data.csv'

    with open(filename, mode='a', newline='') as file:
        writer = csv.writer(file)
        writer.writerow(['gender', 'age', 'height(cm)', 'weight(kg)', 'waist(cm)', 'systolic', 'fasting blood sugar', 'Cholesterol', 'triglyceride', 'LDL', 'hemoglobin', 'serum creatinine', 'AST', 'ALT', 'Gtp' , 'oral', 'dental caries', 'tartar'])
        writer.writerows(data)

    test_read =  pd.read_csv('health_data.csv')
    prediction = loaded_gb.predict(test_read)
    os.remove('health_data.csv')
    return prediction