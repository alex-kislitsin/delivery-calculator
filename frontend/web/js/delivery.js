$('body')
    .on('submit', '#form-delivery-calculate-js', function (e) {
        e.preventDefault();
        let form = $(this);
        let distance = form.find('#getcostform-distance').val();
        if (!parseInt(distance)) {
            alert('Необходимо ввести число');
            return false;
        }
        $.ajax({
            url: form.attr('action'),
            method: 'post',
            data: form.serializeArray(),
            success: function (response) {
                if (typeof response !== 'undefined') {
                    if (parseInt(response)) {
                        form.find('#getcostform-cost').val(response);
                    } else {
                        alert(response);
                    }
                }
            }
        });
    })
    .on('input', '#getcostform-distance', function (e) {
        e.preventDefault();
        $('#getcostform-cost').val(null);
    })