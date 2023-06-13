<form method="POST" action="/calculate-discount">
    @csrf
    <div>
        <label for="product_description">Product Description:</label>
        <input type="text" id="product_description" name="product_description">
    </div>
    <div>
        <label for="list_price">List Price:</label>
        <input type="number" id="list_price" name="list_price">
    </div>
    <div>
        <label for="discount_percent">Discount Percent:</label>
        <input type="number" id="discount_percent" name="discount_percent">
    </div>
    <div>
        <button type="submit">Calculate Discount</button>
    </div>
</form>