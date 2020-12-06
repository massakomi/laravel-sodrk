
app = {}

app.init = function() {

    $('textarea').keyup(app.formconfig)
    $('textarea').each(app.formconfig)

    $('#add-form').find('#validatedGeneralFiles').on('change', app.browse);

    $('form').submit(function (e) {
        e.preventDefault()
        app.loading()
        app.save(this)
        return false;
    })
}

app.formconfig = function() {
    if (this.value.length > 300) {
    	this.style.height = '200px'
    }
    if (this.value.length > 600) {
    	this.style.height = '300px'
    }
}

app.loading = function(hide) {
    if (typeof(hide) == 'undefined') {
        $('#add-form').find('[type="submit"]').attr('disabled', true)
        $('#add-form').find('[type="submit"] .text').prop('text', $('#add-form').find('[type="submit"] .text').text())
        $('#add-form').find('[type="submit"] .text').html('Подождите...')
        $('#add-form').find('.spinner-border').show()
    } else {
        $('#add-form').find('[type="submit"]').attr('disabled', false)
        $('#add-form').find('[type="submit"] .text').html($('#add-form').find('[type="submit"] .text').prop('text'))
        $('#add-form').find('.spinner-border').hide()
    }
}

app.offerCopy = function (btn)
{
    var el = $('.offer-copy').clone().removeClass('offer-copy').get()
    $(el).find('label:not(.custom-file-label)').hide()
    $(el).appendTo('#offers-body');
}


app.browse = function() {
    var files = this.files
    chooser = this;

    if (!files.length) {
        return;
    }
    $('#img-preview').html('')

    var images = [];

    for (var i=0, file; file = files[i]; i++) {
        if (file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-preview').append('<img src="'+e.target.result+'" style="width:100px;" alt="" />');
            }
            reader.readAsDataURL(file);
        }
    }
}

app.save = function(form) {

    var formData = new FormData(form);
    $.ajax({
        url : form.action,
        type : 'POST',
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success : $.proxy(function(data) {
            app.loading(false)

            if (typeof(data['id']) != 'undefined') {
            	$(form).prepend('<div class="alert alert-success">Успешно добавлено!</div>')
                $(form).find('[type="text"]').val('')
                return ;
            }

            $('.is-invalid').removeClass('is-invalid')
            $('.invalid-tooltip').remove()
            
            for (var field in data) {
                var msg = data[field];
                var input = $(form).find('[name="'+field+'"], [name^="'+field+'"]:first');
                if (!input.length) {
                    console.error('Не найдено поле "'+field+'" с ошибкой "'+msg+'"')
                    continue;
                }
                input.addClass('is-invalid').after('<div class="invalid-tooltip">'+msg+'</div>')
            }

            setTimeout(function() {
                $('.invalid-tooltip').remove()
            }, 5000);

        }, this)
    });
}

app.init()