<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

     if(!empty($_GET['parking'])) {
         $parking = $_GET['parking'];
         $filteredHotels = [];
         foreach($hotels as $hotel){
             if($parking === "true" && $hotel['parking'] === true) {
                 $filteredHotels[] = $hotel;
             }
             elseif ($parking === "false" && $hotel['parking'] === false) {
                 $filteredHotels[] = $hotel;
             }
         }
     }
     else {
          $filteredHotels = $hotels;
     }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Hotel</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <select name="parking" id="parking">
            <option value="" selected>Choose</option>
            <option value="true">free parking</option>
            <option value="false">without parking</option>
        </select>
        <button type="submit">Search</button>
    </form>

    <span> <?php var_dump($hotels) ?> </span>

    <ul>
        <?php foreach ($filteredHotels as $hotel) { ?>
            <li class=<?php echo $hotel['name'] ?>>
                <?php foreach($hotel as $key => $value){ ?>
                    <span><?php echo $key .' = '. $value .' / ' ?></span>
                <?php } ?>
            </li> 
        <?php } ?>
    </ul>
</body>
</html>