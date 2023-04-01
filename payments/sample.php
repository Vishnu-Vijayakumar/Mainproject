<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    
var options = {
    "key": "rzp_test_bpkYObmj5H0Qba", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Ad_Sol(Solution for Ads)",
    "description": "Test Transaction",
    "image": "https://example.com/",
    "handler":function(response){
        console.log(response);

    }
};

var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>


<!-- import csv
from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/recommend_books', methods=['POST'])
def recommend_books():
    category = request.form['category']
    
    # Load the book data from a CSV file
    with open('main_dataset.csv', newline='') as f:
        reader = csv.DictReader(f)
        books = [row for row in reader if row['category'] == category]
    
    # Sort the books by rating (if rating exists)
    books = sorted(books, key=lambda x: float(x['rating']) if 'rating' in x else 0, reverse=True)
    
    # Return the top 5 books as JSON
    result = [{'title': book['name'], 'author': book['author'], 'image': book['image']} for book in books[:5]]
    return jsonify(result) -->
