function calculatePrice() {

    //Get selected data  
    var gamePrice = document.getElementById("gamePrice").innerHTML;

    var quantity = document.getElementById("quantity").value;

    //calculate total value  
    var total = gamePrice * quantity;
	total = total.toFixed(2);

    //print value to  PicExtPrice 
    document.getElementById("PicExtPrice").value = ("$" + total);

}