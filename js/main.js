$(function() {
    
    function insertChat() {
        $.ajax({
            url: 'request.php',
            method: 'POST',
            data: {
                type: 'insert',
                table: 'tb_admin.chat',
                values: $('[name="mensagem"]').val(),
                user: $('[name="user"]').val()
            }
        })
        $('[name="mensagem"]').val('');
    }

    $('[name="mensagem"]').keyup(function(e) {
        let code = e.keyCode || e.which;
        if(code == 13) {
            insertChat();
        }
    })

    $('form').submit(function() {
        insertChat();
        return false;
    })

})

