$( document ).ready(function() {
    // Отправка форм
    $('body').on('submit', '.form.ajax_submit', function(e) {
        e.preventDefault()

        var url = $(this).attr('action');

        var thisForm = $(this)

        let fieldTel = $(this).find('input[name="phone"]').val()

        if (thisForm.find('input[name="phone"]').length) {
            var unformattedDate = Inputmask.unmask(fieldTel, { alias: "+38 (999) 99-99-999"});

            var lenghtVal = unformattedDate.length
        }

        if (thisForm.find('input[name="phone"]').length && lenghtVal < 10) {
            $(this).find('input[name="phone"]').addClass('error')
        }  else{
            if (thisForm.find('input[name="phone"]').length) {
                thisForm.prepend('<input type="hidden" name="truePhone" value="' + unformattedDate + '" />')
                sendAjaxForm('result_form', thisForm, url);
                thisForm.find('input[name="truePhone"]').remove()
            } else{
                sendAjaxForm('result_form', thisForm, url);
            }
        }
    })

    $('input[name="phone"]').keyup(function(){
        checkInput(this)
    });
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: ajax_form.serialize(),  // Сериализуем объект
        success: function(response) { //Данные отправлены успешно
            $.fancybox.close()

            $('body').addClass('lock');

            $('.success_wrap').addClass('visible');

            $('.overlay').fadeIn(300);

            $("form").trigger('reset');

            console.log('Success form' + response)
    	},
    	error: function(response) { // Данные не отправлены
            console.log('Failed form' + response)
    	}
 	});
}

function checkInput(el){
    let fieldTel = $(el).val()

    let unformattedDate = Inputmask.unmask(fieldTel, { alias: "+38 (999) 99-99-999"});

    let lenghtVal = unformattedDate.length

    if (lenghtVal < 10) {
        $(el).addClass('error')
    } else{
        $(el).removeClass('error')
    }
}