$(document).ready(function() {
    // you may need to change this code if you are not using Bootstrap Datepicker
    if ($("#reservation-view").length) {
        let disableDay = '';
        const nameResto = $("#reservation-title").html();
        $.ajax({
            url: "http://127.0.0.1:8000/reservations/getDispoDate/" + nameResto,
            method: "GET"
        })
            .done(function (response) {
                disableDay = response;
                $('.js-datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: "today",
                    daysOfWeekDisabled: disableDay.toString(),
                });
            })
            .fail(function () {
                // Si la requete echoue j'initialise quand même mon date picker sans desactiver les jours où le resto est fermé
                $('.js-datepicker').datepicker({
                    language: "fr",
                    format: 'yyyy-mm-dd',
                });
            })

        $(document).on('change', '#reservation_dateReservation', function () {
            var $dateReservation = $('#reservation_dateReservation');
            // ... retrieve the corresponding form.
            var $form = $(this).closest('form');
            // Simulate form data, but only include the selected sport value.
            var data = {};
            let url = $form[0].action.split('reservations')[0];
            const date = new Date($dateReservation.val())
            // Submit data via AJAX to the form's action path.
            $.ajax({
                url: url + 'reservations/getHourOpen/' + nameResto + '/' + date.getDay(),
                method: "GET"
            })
                .done(function (response) {
                    let $selectHour = $("#reservation_stock_heure_arrive");
                    $selectHour.empty();
                    $.each(response, function (key, value) {
                        console.log(value.date);
                        $selectHour.append($("<option></option>")
                            .attr("value", value.date).text(key));
                    });
                })
        });
    }
});



// When sport gets selected ...
$(document).ready(function () {


})


$(function(){
    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Continue",
            previous: "Retour",
            finish: 'Confirmer la réservation'
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if ( newIndex >= 1 ) {
                $('.steps ul li:first-child a img').attr('src','../../images/stepperImages/step-1.png');
            } else {
                $('.steps ul li:first-child a img').attr('src','../../images/stepperImages/step-calendar-active.png');
            }

            if ( newIndex === 1 ) {
                $('.steps ul li:nth-child(2) a img').attr('src','../../images/stepperImages/step-horloge-active.png');
            } else {
                $('.steps ul li:nth-child(2) a img').attr('src','../../images/stepperImages/step-2.png');
            }

            if ( newIndex === 2 ) {
                $('.steps ul li:nth-child(3) a img').attr('src','../../images/stepperImages/step-personne-active.png');
            } else {
                $('.steps ul li:nth-child(3) a img').attr('src','../../images/stepperImages/step-3.png');
            }

            if ( newIndex === 3 ) {
                $('.steps ul li:nth-child(4) a img').attr('src','../../images/stepperImages/step-done-active.png');
                $('.actions ul').addClass('step-4');
                $('.actions .step-4 li a[href$=\'#finish\']').attr('style','display: none;');
                $('.actions .step-4 li:last').append('<button class="btn btn-success" type="submit" >Confirmer la réservation</button>')

            } else {
                $('.steps ul li:nth-child(4) a img').attr('src','../../images/stepperImages/step-4.png');
                $('.actions .step-4 li:last button').remove()
                $('.actions ul').removeClass('step-4');

            }
            return true;
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
        $("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Click to see password
    $('.password i').click(function(){
        if ( $('.password input').attr('type') === 'password' ) {
            $(this).next().attr('type', 'text');
        } else {
            $('.password input').attr('type', 'password');
        }
    })
    // Create Steps Image
    $('.steps ul li:first-child').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-calendar-active.png" alt=""> ').append('<span class="step-order d-none d-md-block">Sélectionnez une date</span>');
    $('.steps ul li:nth-child(2)').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-2.png" alt="">').append('<span class="step-order d-none d-md-block">Horraire disponible</span>');
    $('.steps ul li:nth-child(3)').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-3.png" alt="">').append('<span class="step-order d-none d-md-block">Nombre de personnes</span>');
    $('.steps ul li:last-child a').append('<img src="../../images/stepperImages/step-4.png" alt="">').append('<span class="step-order d-none d-md-block">Information complémentaires</span>');
    // Count input
    $(".quantity span").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.hasClass('plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });
})

