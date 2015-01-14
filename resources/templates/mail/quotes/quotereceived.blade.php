<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>
    <h2 style="text-align: center; color: #F2842E;">We have a new quote request</h2>
      <p><span style="color: #6FCCE2;">From: </span>{{ $quote['name'] }}</p>
      <p><span style="color: #6FCCE2;">Email: </span>{{ $quote['email'] }}</p>
      <p><span style="color: #6FCCE2;">Company: </span>{{ $quote['company'] }}</p>
      <p><span style="color: #6FCCE2;">Country: </span>{{ $quote['country'] }}</p>
      <p><span style="color: #6FCCE2;">Phone: </span>{{ $quote['phone'] }}</p>
      <p><span style="color: #6FCCE2;">Budget: </span>{{ $quote['budget'] }}</p>
      <h3 style="text-align: center; color: #F2842E;">The proposed project:</h3>
      <p>{{ $quote['project'] }}</p>
</body>
</html>