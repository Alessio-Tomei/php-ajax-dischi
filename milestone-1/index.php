<?php

$ArrayDisc = [
    [
    poster => "https://www.onstageweb.com/wp-content/uploads/2018/09/bon-jovi-new-jersey.jpg",
    title => "New Jersey",
    author => "Bon Jovi",
    genre => "Rock",
    year => "1988"
    ],
    [
    poster => "https://img.discogs.com/vknPDdrqRbT92pNRX0W4I5N91jg=/fit-in/300x300/filters:strip_icc():format(jpeg):mode_rgb():quality(40)/discogs-images/R-1246953-1448927086-6590.jpeg.jpg",
    title => "Live at Wembley 86",
    author => "Queen",
    genre => "Pop",
    year => "1992"
    ],
    [
    poster => "https://images-na.ssl-images-amazon.com/images/I/41JD3CW65HL.jpg",
    title => "Ten's Summoner's Tales",
    author => "Sting",
    genre => "Pop",
    year => "1993"
    ],
    [
    poster => "https://cdn2.jazztimes.com/2018/05/SteveGadd-800x723.jpg",
    title => "Steve Gadd Band",
    author => "Steve Gadd Band",
    genre => "Jazz",
    year => "2018"
    ],
    [
    poster => "https://images-na.ssl-images-amazon.com/images/I/810nSIQOLiL._SY355_.jpg",
    title => "Brave new World",
    author => "Iron Maiden",
    genre => "Metal",
    year => "2000"
    ],
    [
    poster => "https://upload.wikimedia.org/wikipedia/en/9/97/Eric_Clapton_OMCOMR.jpg",
    title => "One more car, one more raider",
    author => "Eric Clapton",
    genre => "Rock",
    year => "2002"
    ],
    [
    poster => "https://images-na.ssl-images-amazon.com/images/I/51rggtPgmRL.jpg",
    title => "Made in Japan",
    author => "Deep Purple",
    genre => "Rock",
    year => "1972"
    ],
    [
    poster => "https://images-na.ssl-images-amazon.com/images/I/81r3FVfNG3L._SY355_.jpg",
    title => "And Justice for All",
    author => "Metallica",
    genre => "Metal",
    year => "1988"
    ],
    [
    poster => "https://img.discogs.com/KOBsqQwKiNKH-q927oHMyVdDzSo=/fit-in/596x596/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-6406665-1418464475-6120.jpeg.jpg",
    title => "Hard Wired",
    author => "Dave Weckl",
    genre => "Jazz",
    year => "1994"
    ],
    [
    poster => "https://m.media-amazon.com/images/I/71K9CbNZPsL._SS500_.jpg",
    title => "Bad",
    author => "Michael Jacjson",
    genre => "Pop",
    year => "1987"
    ]
];

[$genreList, $authorList] = generateGenreList($ArrayDisc);

function generateGenreList($discList) {
    $resultDisc = []; 
    $resultAuthor = [];
    foreach ($discList as $key => $discItem) {
        if (! in_array($discItem['genre'], $resultDisc)) {
            $resultDisc[] = $discItem['genre'];
        }
        if (! in_array($discItem['author'], $resultAuthor)) {
            $resultAuthor[] = $discItem['author'];
        }
    }
    return [$resultDisc, $resultAuthor];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="app">
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="ms_img-container">
                            <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_RGB_Green.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section>
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-12">
                        <div class="search-bar">
                            <input 
                            type="text" 
                            placeholder="Cerca un album..."
                            >
                            <div>
                                <label for="genre">Genere: </label>
                                <select name="" id="genre" >
                                    <option value="">All</option>
                                    <?php
                                        foreach ($genreList as $key => $genre) {
                                            echo '<option value="">' . $genre . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="authors">Autori: </label>
                                <select name="" >
                                    <option value="">All</option>
                                    <?php
                                        foreach ($authorList as $key => $author) {
                                            echo '<option value="">' . $author . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php    
                    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 gy-4 gx-5">';
                        foreach ($ArrayDisc as $key => $disc) {
                            echo '<div class="col">';
                                echo '<div class="ms_disc-box">';
                                    echo '<div class="ms_scale-1-2">';
                                        echo '<div>';
                                            echo '<div class="ms_scale-1-1">';
                                                echo '<img src="' . $disc['poster'] . '" alt="">';
                                            echo '</div>';
                                            echo '<h4>' . $disc['title'] . '</h4>';
                                            echo '<p>' . $disc['author'] . '</p>';
                                            echo '<p>' . $disc['year'] . '</p>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                    ?>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ms_loading">
                                <div>
                                    <i class="fas fa-spinner"></i>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </section>
        </main>
        <Footer/>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>

