<html>
          {
            @foreach($reservations as $reservation)
              starts_at: "{{ $reservation->starts_at }}", ends_at: "{{ $reservation->ends_at }}"
            @endforeach
          }


</html>
