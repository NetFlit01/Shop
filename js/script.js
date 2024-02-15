//Скрипт для проверки выбранного размера перед добавление в корзину
$(document).ready(function(){
    $('.add-to-cart-form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var size = form.find('select[name="item_size"]').val();  // Получаем значение выбранного размера
        if (size === 'Размер не выбран') {
            alert('Пожалуйста, выберите размер товара');  // Выводим сообщение об ошибке
        } else {
            var formData = form.serialize();
            $.ajax({
                type: 'POST',
                url: 'php/add_to_cart.php',
                data: formData,
                dataType: 'json'
            });
        }
    });
});


//Анимация изменения текста кнопки после успешного добавления товара
function handleClick(button) {
    button.value = 'Добавлено';
    setTimeout(function() {
        button.value = 'Добавить в корзину';
    }, 1000);
}



