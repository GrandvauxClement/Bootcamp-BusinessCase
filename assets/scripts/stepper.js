$(document).ready(function() {
    // you may need to change this code if you are not using Bootstrap Datepicker
    const idReservationPage = $("#reservation-view");
    let langActive = $('html').attr("lang");
    if (idReservationPage.length) {
        let disableDay = '';
        const nameResto = $("#reservation-title").html();
        const $form = idReservationPage.closest('form');
        // Simulate form data, but only include the selected sport value.
        let url = $form.prevObject[0].baseURI.split('reservations')[0];
        $.ajax({
            url: url + "reservations/getDispoDate/" + nameResto,
            method: "GET"
        })
            .done(function (response) {
                console.log(response)
                let stockDatePicker = $('.js-datepicker');
                disableDay = response;
                if (langActive === 'en'){
                    stockDatePicker.datepicker({
                        language: "en",
                        format: 'yyyy-mm-dd',
                        startDate: "today",
                        daysOfWeekDisabled: disableDay.toString(),
                    });
                } else {
                    stockDatePicker.datepicker({
                        language: "fr",
                        format: 'yyyy-mm-dd',
                        startDate: "today",
                        daysOfWeekDisabled: disableDay.toString(),
                    });
                }
                let formattedDate = new Date();
                let d = formattedDate.getDate();
                let m =  formattedDate.getMonth();
                m += 1;  // JavaScript months are 0-11
                let y = formattedDate.getFullYear();
                console.log(y + "-" + m + "-" + d);
                stockDatePicker.val(y + "-" + m + "-" + d);

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





$(function(){
    let langActive = $('html').attr("lang");
    if (langActive === 'en'){
        $("#wizard").steps({
            headerTag: "h4",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            transitionEffectSpeed: 300,
            labels: {
                next: "Next",
                previous: "Back",
                finish: 'confirm booking'
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
                    $('.actions .step-4 li:last').append('<button class="btn btn-success" type="submit" >Confirm Booking</button>')

                } else {
                    $('.steps ul li:nth-child(4) a img').attr('src','../../images/stepperImages/step-4.png');
                    $('.actions .step-4 li:last button').remove()
                    $('.actions ul').removeClass('step-4');

                }
                return true;
            }
        });
    } else {
        $("#wizard").steps({
            headerTag: "h4",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            transitionEffectSpeed: 300,
            labels: {
                next: "Suivant",
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
    }

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
    if (langActive === 'en'){
        $('.steps ul li:first-child').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-calendar-active.png" alt=""> ').append('<span class="step-order d-none d-md-block">Select a date</span>');
        $('.steps ul li:nth-child(2)').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-2.png" alt="">').append('<span class="step-order d-none d-md-block">Schedule available</span>');
        $('.steps ul li:nth-child(3)').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-3.png" alt="">').append('<span class="step-order d-none d-md-block">Number of persons</span>');
        $('.steps ul li:last-child a').append('<img src="../../images/stepperImages/step-4.png" alt="">').append('<span class="step-order d-none d-md-block">Complementary information</span>');
    }else {
        $('.steps ul li:first-child').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-calendar-active.png" alt=""> ').append('<span class="step-order d-none d-md-block">Sélectionnez une date</span>');
        $('.steps ul li:nth-child(2)').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-2.png" alt="">').append('<span class="step-order d-none d-md-block">Horaire disponible</span>');
        $('.steps ul li:nth-child(3)').append('<img src="../../images/stepperImages/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="../../images/stepperImages/step-3.png" alt="">').append('<span class="step-order d-none d-md-block">Nombre de personnes</span>');
        $('.steps ul li:last-child a').append('<img src="../../images/stepperImages/step-4.png" alt="">').append('<span class="step-order d-none d-md-block">Information complémentaires</span>');
    }

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

