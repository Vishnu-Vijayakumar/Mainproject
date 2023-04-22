import csv
import numpy as np
from sklearn.neighbors import KNeighborsClassifier
from flask import Flask, request, jsonify

# Load the book data from a CSV file
with open('main_dataset.csv', newline='') as f:
    reader = csv.DictReader(f)
    books = [row for row in reader]

# Create a dictionary to store books by category
books_by_category = {}
for book in books:
    if book['category'] not in books_by_category:
        books_by_category[book['category']] = []
    books_by_category[book['category']].append(book)

# Create a KNN model for each category
knn_models = {}
for category, category_books in books_by_category.items():
    X = np.array([[float(book['rating']) if 'rating' in book else 0,
                   len(book['author'].split(','))] for book in category_books])
    y = np.array([book['name'] for book in category_books])
    knn = KNeighborsClassifier(n_neighbors=5, algorithm='auto')
    knn.fit(X, y)
    knn_models[category] = knn

# Initialize a Flask app
app = Flask(__name__)

# Define a route to handle book recommendation requests
@app.route('/recommend_books', methods=['POST'])
def recommend_books():
    category = request.form['category']
    
    # Find the 5 closest books in the same category
    knn = knn_models[category]
    category_books = books_by_category[category]
    X = np.array([[float(book['rating']) if 'rating' in book else 0,
                   len(book['author'].split(','))] for book in category_books])
    y = np.array([book['name'] for book in category_books])
    indices = knn.kneighbors(X)[1]
    similar_books = [category_books[i] for i in indices.flatten()[1:6]]
    
    # Return the recommended books
    return jsonify([{'title': book['name'], 'author': book['author'], 'image': book['image']} for book in similar_books])

if __name__ == '__main__':
    app.run(debug=True)
