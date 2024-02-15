//Скрипт для проверки заполнения форм данными
function validateForm(event) {
    var fullName = document.getElementById("full-name").value;
    var deliveryAddress = document.getElementById("delivery-address").value;
    var email = document.getElementById("email").value;

    if (fullName == "" || deliveryAddress == "" || email == "") {
        if (fullName == "") {
            alert("Пожалуйста, введите ФИО");
            return false
        }
        if (deliveryAddress == "") {
            alert("Пожалуйста, введите адрес доставки");
            return false
        }
        if (email == "") {
            alert("Пожалуйста, введите адрес электронной почты");
            return false
        }
    } else {
        alert("Ваш заказ оформлен. Спасибо, что обратились в наш магазин!");
        return true
    }
}