function calculatePrice() {

    //Get selected data  
    var fruitprice = document.getElementById("fruit").value;
    fruitprice = fruitprice.replace(/[^0-9.]/g, "");

    var quantity = document.getElementById("quantity").value;
    quantity = quantity.replace(/[^0-9.]/g, "");

    //calculate total value  
    var total = fruitprice * quantity;

    //print value to  PicExtPrice 
    document.getElementById("PicExtPrice").value = ("$" + total);

}