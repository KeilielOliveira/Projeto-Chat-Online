$(function() {
    
    $('.message').scrollTop($('.message')[0].scrollHeight );
    function insertChat() {
        if($('[name="mensagem"]').val() != '') {
            $.ajax({
                url: 'request.php',
                method: 'POST',
                data: {
                    type: 'insert',
                    table: 'tb_admin.chat',
                    values: $('[name="mensagem"]').val(),
                    user: $('[name="user"]').val()
                }
            }).done(function(result) {
                $('.message').append(result);
                $('.message').scrollTop($('.message')[0].scrollHeight );
            })
        } 
        $('[name="mensagem"]').val('');
    }

    setInterval(function() {
        recoverMessage();
    },2000)

    function recoverMessage() {
        $.ajax({
            url: 'request.php',
            method: 'POST',
            data: {
                type: 'get',
            }
        }).done(function(result) {
            $('.message').append(result);
            $('.message').scrollTop($('.message')[0].scrollHeight );
        })

    }




    $('[name="mensagem"]').keyup(function(e) {
        let code = e.keyCode || e.which;
        if(code == 13) {
            insertChat();
        }
    })

    $('form#mensagem').submit(function() {
        insertChat();
        return false;
    })

})

