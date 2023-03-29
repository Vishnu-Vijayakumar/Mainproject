import csv
from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/recommend_books', methods=['POST'])
def recommend_books():
    category = request.form['category']
    
    # Load the book data from a CSV file
    with open('main_dataset.csv', newline='') as f:
        reader = csv.DictReader(f)
        books = [row for row in reader if row['category'] == category]
    
    # Sort the books by rating
    books = sorted(books, key=lambda x: x['rating'], reverse=True)
    
    # Return the top 5 books as JSON
    result = [{'title': book['title'], 'author': book['author']} for book in books[:5]]
    return jsonify(result)
