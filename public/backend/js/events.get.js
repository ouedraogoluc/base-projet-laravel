$(document).ready(function () {
    // Récupérer les événements depuis le serveur
    $.ajax({
        url: '{{ route("events.get") }}',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            var events = response.map(function (event) {
                return {
                    title: event.title,
                    start: new Date(event.start), // Convertir la date en objet Date
                    end: new Date(event.end),
                    className: event.category
                };
            });

            // Initialiser jQuery UI Datepicker avec les événements
            $('#event-calendar').datepicker({
                beforeShowDay: function (date) {
                    var eventDate = date.toISOString().split('T')[0]; // Convertir la date en format 'YYYY-MM-DD'
                    var event = events.find(function (event) {
                        return event.start.toISOString().split('T')[0] === eventDate;
                    });

                    if (event) {
                        return [true, 'highlight', event.title];
                    } else {
                        return [true, '', ''];
                    }
                }
            });
        },
        error: function () {
            alert('Impossible de charger les événements.');
        }
    });
});
