
!function ($) {
    "use strict";

    var CalendarApp = function () {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
            this.$event = ('#external-events div.external-event'),
            this.$calendar = $('#calendar'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$categoryForm = $('#add-category form'),
            this.$extEvents = $('#external-events'),
            this.$calendarObj = null
    };


    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
        // retrieve the dropped element's stored Event Object
        var originalEventObject = eventObj.data('eventObject');
        var $categoryClass = eventObj.attr('data-class');
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        // assign it the date that was reported
        copiedEventObject.start = date;
        if ($categoryClass)
            copiedEventObject['className'] = [$categoryClass];
        // render the event on the calendar
        $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            eventObj.remove();
        }
    },
        /* on click on event */
        CalendarApp.prototype.onEventClick = function (calEvent, jsEvent, view) {
            var $this = this;
            var form = $("<form></form>");
            form.append("<label>Change event name</label>");
            form.append("<div class='input-group m-b-20'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-append'><button type='submit' class='btn btn-primary'>Save</button></span></div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    return (ev._id == calEvent._id);
                });
                $this.$modal.modal('hide');
            });
            $this.$modal.find('form').on('submit', function () {
                calEvent.title = form.find("input[type=text]").val();
                $this.$calendarObj.fullCalendar('updateEvent', calEvent);
                $this.$modal.modal('hide');
                return false;
            });
        },
        /* on select */

        // CalendarApp.prototype.onSelect = function (start, end, allDay) {
        //     console.log('onSelect function is triggered.'); // Message de débogage
        //     var $this = this;
        //     $this.$modal.modal({
        //         backdrop: 'static'
        //     });

        //     var form = $("<form></form>");
        //     form.attr("action", '{{ route("events.save") }}'); // Spécifiez l'URL du contrôleur pour l'action
        //     form.attr("method", "POST"); // Spécifiez la méthode HTTP (POST)

        //     form.append("<div class='row'></div>");
        //     form.find(".row")
        //         .append("<div class='col-md-6'><div class='form-group'><label>Event Name</label><input class='form-control' type='text' name='title'/></div></div>")
        //         .append("<div class='col-md-6'><div class='form-group'><label>Category</label><select class='select form-control' name='category'></select></div></div>")
        //         .append("<div class='col-md-6'><div class='form-group'><label>Start Date</label><input class='form-control' type='datetime-local' name='start'/></div></div>")
        //         .append("<div class='col-md-6'><div class='form-group'><label>End Date</label><input class='form-control' type='datetime-local' name='end'/></div></div>")
        //         .append("<div class='col-md-12'><div class='form-group'><label>Description</label><textarea class='form-control' name='description'></textarea></div></div>")
        //         .find("select[name='category']")
        //         .append("<option value='bg-danger'>Danger</option>")
        //         .append("<option value='bg-success'>Success</option>")
        //         .append("<option value='bg-info'>Info</option>")
        //         .append("<option value='bg-primary'>Primary</option>")
        //         .append("<option value='bg-warning'>Warning</option></div></div>");

        //     $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
        //         form.submit();
        //     });

        //     $this.$calendarObj.fullCalendar('unselect');

        //     $this.$modal.find('form').on('submit', function () {
        //         console.log('Form submission is attempted.'); // Message de débogage

        //         var title = form.find("input[name='title']").val();
        //         var description = form.find("textarea[name='description']").val();
        //         var categoryClass = form.find("select[name='category'] option:checked").val();
        //         var startDateTime = form.find("input[name='start']").val();
        //         var endDateTime = form.find("input[name='end']").val();

        //         if (title !== null && title.length !== 0) {
        //             $.ajax({
        //                 url: '{{ route("events.save") }}',
        //                 method: 'POST',
        //                 data: {
        //                     title: title,
        //                     category: categoryClass,
        //                     description: description,
        //                     start: startDateTime,
        //                     end: endDateTime
        //                 },

        //                 success: function (response) {
        //                     $this.$calendarObj.fullCalendar('renderEvent', {
        //                         title: title,
        //                         description: description,
        //                         start: startDateTime,
        //                         end: endDateTime,
        //                         allDay: false,
        //                         className: categoryClass
        //                     }, true);

        //                     $this.$modal.modal('hide');
        //                 },

        //                 error: function () {
        //                     alert('Une erreur s\'est produite lors de l\'enregistrement de l\'événement.');
        //                 }
        //             });
        //         } else {
        //             alert('Vous devez donner un titre à votre événement.');
        //         }

        //         return false;
        //     });
        // };


        CalendarApp.prototype.onSelect = function (start, end, allDay) {
            var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.attr("action", '{{ route("events.save") }}'); // Spécifiez l'URL du contrôleur pour l'action
            form.attr("method", "POST"); // Spécifiez la méthode HTTP (POST)

            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label>Event Name</label><input class='form-control' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label>Category</label><select class='select form-control' name='category'></select></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label>Start Date</label><input class='form-control' type='datetime-local' name='start'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label>Start time</label><input class='form-control' type='datetime-local' name='startTime'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label>End Date</label><input class='form-control' type='datetime-local' name='end'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label>End time</label><input class='form-control' type='datetime-local' name='endTime'/></div></div>")
                .append("<div class='col-md-12'><div class='form-group'><label>Description</label><textarea class='form-control' name='description'></textarea></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Dangerer</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-info'>Info</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");

            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });

            $this.$calendarObj.fullCalendar('unselect');

            $this.$modal.find('.save-event').unbind('click').click(function () {
                var title = form.find("input[name='title']").val(); // Récupérer la valeur du champ 'title'

                if (title !== null && title.length !== 0) {
                    var formData = form.serialize(); // Sérialiser les données du formulaire

                    $.ajax({
                        url: form.attr("action"), // Utiliser l'URL du formulaire comme URL de la requête
                        method: form.attr("method"), // Utiliser la méthode POST du formulaire
                        data: formData, // Utiliser les données sérialisées du formulaire
                        success: function (response) {
                            // Gérer la réponse du serveur en conséquence
                            $this.$calendarObj.fullCalendar('renderEvent', {
                                title: response.title,
                                description: response.description,
                                start: response.start,
                                startTime: response.startTime,
                                end: response.end,
                                endTime: response.endTime,
                                allDay: false,
                                className: response.category
                            }, true);

                            $this.$modal.modal('hide');
                        },
                        error: function () {
                            alert('Une erreur s\'est produite lors de l\'enregistrement de l\'événement.');
                        }
                    });
                } else {
                    //('Le champ "Event Name" ne peut pas être vide.');
                }
            });

        }


    CalendarApp.prototype.enableDrag = function () {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }
    /* Initializing */
    CalendarApp.prototype.init = function () {
        this.enableDrag();
        /* Initialize the calendar */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
    
        var defaultEvents = [{
            title: 'Event Name 1',
            start: new Date($.now() + 148000000),
            className: 'bg-danger'
        },
        {
            title: 'Test Event 2',
            start: today,
            end: today,
            className: 'bg-success'
        },
        {
            title: 'Test Event 3',
            start: new Date($.now() + 168000000),
            className: 'bg-info'
        },
        {
            title: 'Test Event 4',
            start: new Date($.now() + 338000000),
            className: 'bg-warning'
        },
        {
            title: 'Test Event 5',
            start: new Date($.now() + 238000000),
            className: 'bg-primary'
        }];
    
        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00',
            minTime: '08:00:00',
            maxTime: '19:00:00',
            defaultView: 'month',
            handleWindowResize: true,
            height: $(window).height() - 200,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: function(start, end, timezone, callback) {
                // Utilisez AJAX pour récupérer les événements depuis le serveur
                $.ajax({
                    url: '{{ route("events.get") }}',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var events = defaultEvents.concat(response); // Fusionnez les événements par défaut avec ceux récupérés
                        callback(events);
                    },
                    error: function() {
                        alert('Impossible de charger les événements.');
                    }
                });
            },
            editable: true,
            droppable: true,
            eventLimit: true,
            selectable: true,
            drop: function (date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function (calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }
        });
    
        // ...
    };
    
    

        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

    //initializing CalendarApp
    function ($) {
        "use strict";
        $.CalendarApp.init()
    }(window.jQuery);


$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        // Options et configurations de FullCalendar ici
        // Par exemple, les options de vue (month, week, day) et d'autres paramètres
        // ...
        events: {
            url: '{{ route("events.index") }}', // URL pour récupérer les événements depuis le serveur
            method: 'GET', // Méthode HTTP pour la requête (GET)
            failure: function () {
                alert('Impossible de charger les événements.');
            }
        }
    });
});

