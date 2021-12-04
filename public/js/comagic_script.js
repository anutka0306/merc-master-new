$(document).ready(function () {
    var tags = /<[^>]+>/;
    var re=/(http)|(www)|(https)/;
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/;

    //подсчет символов обратный звонок
    $('#comment_call').on("keydown", function(e) {
        document.getElementById('csCall').innerHTML = "Максимальное кол-во символов 500. Введенно: "+this.value.length;
    });

    $("#comment_call").bind('paste', function() {
        setTimeout(function(e) {
            document.getElementById('csCall').innerHTML = "Максимальное кол-во символов 500. Введенно: "+$("#comment_call").val().length;
        }, 0);
    });

    //подсчет символов запись на ремонт
    $('#comment_rem').on("keydown", function(e) {
        document.getElementById('csRemModal').innerHTML = "Максимальное кол-во символов 500. Введенно: "+this.value.length;
    });

    $("#comment_rem").bind('paste', function() {
        setTimeout(function(e) {
            document.getElementById('csRemModal').innerHTML = "Максимальное кол-во символов 500. Введенно: "+$("#comment_rem").val().length;
        }, 0);
    });

    //подсчет символов задать вопрос
    $('#comment_vopros').on("keydown", function(e) {
        document.getElementById('csVopros').innerHTML = "Максимальное кол-во символов 500. Введенно: "+this.value.length;
    });

    $("#comment_vopros").bind('paste', function() {
        setTimeout(function(e) {
            document.getElementById('csVopros').innerHTML = "Максимальное кол-во символов 500. Введенно: "+$("#comment_vopros").val().length;
        }, 0);
    });

    //подсчет символов страница контакты
    $('#comment_contact').on("keydown", function(e) {
        document.getElementById('csContact').innerHTML = "Максимальное кол-во символов 500. Введенно: "+this.value.length;
    });

    $("#comment_contact").bind('paste', function() {
        setTimeout(function(e) {
            document.getElementById('csContact').innerHTML = "Максимальное кол-во символов 500. Введенно: "+$("#comment_contact").val().length;
        }, 0);
    });


    //подсчет символов страница отзывы
    $('#comment_otziv').on("keydown", function(e) {
        document.getElementById('csOtziv').innerHTML = "Максимальное кол-во символов 500. Введенно: "+this.value.length;
    });

    $("#comment_otziv").bind('paste', function() {
        setTimeout(function(e) {
            document.getElementById('csOtziv').innerHTML = "Максимальное кол-во символов 500. Введенно: "+$("#comment_otziv").val().length;
        }, 0);
    });

    //подсчет символов в форме вызова эвакуатора
    $('#comment_evac').on("keydown", function(e) {
        document.getElementById('csEvac').innerHTML = "Максимальное кол-во символов 500. Введенно: "+this.value.length;
    });

    $("#comment_evac").bind('paste', function() {
        setTimeout(function(e) {
            document.getElementById('csEvac').innerHTML = "Максимальное кол-во символов 500. Введенно: "+$("#comment_evac").val().length;
        }, 0);
    });


    /*Валидация всех форм*/
    $('.popwindow form, #form-czenyi, .callback-form').submit(function(e){
        e.preventDefault();

        var name_field = $(this).find( "input[name=user_name]" );
        if (!name_field.length) {
            name_field = $(this).find( "input[name=pagetitle]" );
        }

        var name = name_field.val();
        var phone = $(this).find( "input[name=user_phone]" ).val();
        var email_field = $(this).find( "input[name=user_email]" );
        if (!email_field.length) {
            email_field = $(this).find( "input[name=longtitle]" );
        }
        if (email_field.length) {
            var email = email_field.val();
        }

        var salon = $(this).find( "select[name=salon]" );
        if (salon.length) {
            if (!salon.val()) {
                alert('Необходимо выбрать автосервис!'); return false;
            }
        }
        //alert(salon.val());
        var comment_field = $(this).find( "textarea[name=comment]" );
        if (comment_field.length) {
            var comment = comment_field.val();
        }else{
            var comment = '';
        }

        if(name===''){alert('Заполните поле имя!'); return false;}
        else if (/[a-zA-Z]/.test(name) ) {alert('В поле Имя не могут содержаться английские буквы!'); return false;}
        else if (/[0-9]/.test(name) ) {alert('В поле Имя не могут содержаться цифры!');return false;}
        else if(phone===''){alert('Заполните поле телефон!'); return false;}
        else if(!/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/.test(phone)){alert('Некорретный номер телефона!'); return false;}
        else if(email_field.length && email!=='' && !pattern.test(email)){alert('Проверьте е-майл');return false;}
        else if(comment_field.length && comment.search(tags) !== -1){alert('Поле Комментарий не должно содержать тегов!');return false;}
        else if(comment_field.length && comment.search(re) !== -1){alert('Поле Комментарий не должно содержать ссылок!');return false;}
        else if(comment_field.length && comment.length>500){alert('Превышена длина текста в поле Комментарий!');return false;}
        /*else if(!agree){alert('Вы не дали согласие на обработку персональных данных!');return false;}*/
        else{
            if (window.ComagicWidget) {
                var t = +new Date () + 10000;


                if(salon.val()=='Научный') {
                    //alert('nizegor2');
                    var id_ploshadki='213509';
                }
                else if(salon.val()=='Лобненская') {
                    //alert('lobn2');
                    var id_ploshadki='213501';
                }
                else if(salon.val()=='Удальцова'){
                    //alert('lobn2');
                    var id_ploshadki='213507';
                }
                else if(salon.val()=='Севастопольский') {
                    //alert('lobn2');
                    var id_ploshadki='213505';
                }



                // alert (id_ploshadki);

                //return false;
                sendAjaxPopupForm('/callback_form', name, phone, salon.val(), comment);
                ComagicWidget.sitePhoneCall({phone:phone, group_id: id_ploshadki, delayed_call_time: t.toString()});

            }

            showSuccessMessage();
            return true;
        }

    });


    function sendAjaxPopupForm(url, name, phone, salon, message) {
        $.ajax({
            url:     url,
            type:     "POST", //метод отправки
            dataType: "html", //формат данных

            data: {
                'name' : name,
                'phone' : phone,
                'salon' : salon,
                'message' : message,
            },
            success: function(response) { //Данные отправлены успешно
                console.log(response);
            },
            error: function(response) { // Данные не отправлены
                console.log('error');
            }
        });
    }


    /*показ скрытых телефонов в шапке*/
    jQuery("#header_phones_expander").click(function (e) {
        e.preventDefault();
        jQuery("#header_phones").toggleClass("expanded");
        $(this).toggleClass("active");
    });
});

function showSuccessMessage() {
    const modal_wrap = jQuery(".popup-wrap1");
    modal_wrap.html(`<div class="form-msg">
                <div class="modal-header callback-popup-title">
                    <div style="width: 100%">
                        <div class="form-msg__text">Ваша заявка принята.</div>
                        <div class="form-msg__text">Мы Вам перезвоним!</div>
                     </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>`);
    if (!modal_wrap.is(':visible')) {
        alert('Ваша заявка принята.\nМы Вам перезвоним!');
    }
}