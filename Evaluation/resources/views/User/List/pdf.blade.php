<!DOCTYPE html>
<html>
<head>
  <title>Événement</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }
    
    .event {
      width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .event-container {
      display: flex;
      align-items: flex-start;
    }
    
    .event img {
      max-width: 300px;
      height: auto;
      margin-right: 20px;
    }
    
    .event-details {
      color: #666;
    }
    
    .event-details p {
      margin: 5px 0;
    }
    
    .artist-list {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
    }
    
    .artist {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      width: 50%;
    }
    
    .artist img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }
    
    .artist-name {
      font-weight: bold;
      color: #333;
    }
    
    .ticket-list {
      margin-top: 20px;
    }
    
    .ticket-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .ticket-table th,
    .ticket-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }
    
    .ticket-price {
      color: #333;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="event">
    <div class="event-container">
      <img src="aldo-game.png">
      <div class="event-details">
        <h1 class="event-title">{{$event->nom}}</h1>
        <p>Date: {{$event->datedebut}}</p>
        <p>Heure: {{$event->heure}}</p>
        <p>Lieu: {{$event->lieu->nom}}</p>
      </div>
    </div>
    <br>
    <br>
    <h3>Les artistes : </h3>
    <div class="artist-list">
        @foreach ($eventArtiste as $eventArtistes)
      <div class="artist">
        <img src="image1.png">
        <p class="artist-name">{{$eventArtistes->artiste->nom}}</p>
      </div>    
      @endforeach
    </div>
    <br>
    <br>
    <h3>Les places : </h3>
    <div class="ticket-list">
      <table class="ticket-table">
        @foreach ($eventPlace as $eventPlaces)
        <tr>
          <td>{{$eventPlaces->types->nom}}</td>
          <td class="ticket-price">{{$eventPlaces->prix}} AR</td>
        </tr>   
        @endforeach
      </table>
    </div>
  </div>
</body>
</html>
