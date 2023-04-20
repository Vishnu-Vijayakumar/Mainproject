from flask import Flask, request
import pandas as pd
import math

app = Flask(__name__)

def euclidean_distance(x1, x2):
    # Calculates the Euclidean distance between two points
    return math.sqrt(sum([(x1[i] - x2[i])**2 for i in range(len(x1))]))

class BookKNN:
    def __init__(self, k=3):
        self.k = k
        
    def fit(self, X, y):
        self.X_train = X
        self.y_train = y
        
    def predict(self, X):
        predictions = []
        for x in X:
            # Calculate distances between the test book and all training books
            distances = [euclidean_distance(x, x_train) for x_train in self.X_train]
            # Get the k nearest neighbors
            k_nearest_neighbors = sorted(range(len(distances)), key=lambda i: distances[i])[:self.k]
            # Get the labels (i.e., ratings) of the k nearest neighbors
            k_nearest_labels = [self.y_train[i] for i in k_nearest_neighbors]
            # Make a prediction based on the weighted average rating of the k nearest neighbors
            prediction = sum(k_nearest_labels) / len(k_nearest_labels)
            predictions.append(prediction)
        return predictions

# Load book ratings data
ratings_data = pd.read_csv('main_dataset.csv')

# Extract features and labels
X = ratings_data[['category']].values
y = ratings_data['name'].values

# Create KNN model and fit data
knn_model = BookKNN(k=3)
knn_model.fit(X, y)

@app.route('/recommend', methods=['POST'])
def recommend_book():
    category = request.form.get('category') # Get the category from the POST data
    test_book = [1 if c == category else 0 for c in ['category']] # Create a feature vector for the test book
    book_title = knn_model.predict([test_book])[0] # Make a prediction for the test book
    return str(book_title) # Return the recommended book title as a string

if __name__ == '__main__':
    app.run(debug=True)
