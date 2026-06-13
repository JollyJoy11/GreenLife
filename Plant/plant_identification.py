from flask import Flask, request, jsonify
from keras.models import load_model
from PIL import Image, ImageOps
import numpy as np

app = Flask("Plant Identification")

# Load the model and class names
try:
    model = load_model("keras_Model.h5", compile=False)
    print("Model loaded successfully!")
except Exception as e:
    print("Error loading model:", e)
    model = None

class_names = ['Actinodaphne mushaensis','Dipterocarpus elongatus','Canarium subulatum','Others']

# Testing connect to server
@app.route('/test', methods=['GET']) 
def test(): 
    print("Test endpoint called")
    return "Test endpoint is working!"

@app.route('/predict', methods=['POST'])
def predict():
    if not model: 
        return jsonify({"error": "Model not loaded"}), 500
    try:
        # Check if the file is included in the request
        if 'image' not in request.files:
            return jsonify({"error": "No image uploaded"}), 400

        print("Image found in request")
        # Get the uploaded image
        file = request.files['image']
        image = Image.open(file).convert("RGB")

        # Preprocess the image
        size = (224, 224)
        image = ImageOps.fit(image, size, Image.Resampling.LANCZOS)
        image_array = np.asarray(image)
        normalized_image_array = (image_array.astype(np.float32) / 127.5) - 1
        data = np.ndarray(shape=(1, 224, 224, 3), dtype=np.float32)
        data[0] = normalized_image_array

        print("Image preprocessing completed")
        # Get predictions
        prediction = model.predict(data)
        results = {class_names[i]: f"{float(prob) * 100:.2f}" for i, prob in enumerate(prediction[0])} 
        results = dict(sorted(results.items(), key=lambda item: float(item[1]), reverse=True)) 
        print(results)

        # Return predictions as JSON
        return jsonify(results)

    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)