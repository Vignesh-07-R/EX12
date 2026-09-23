<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XML Book Library</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            min-height: 100vh;
            color: #1e293b;
        }

        /* HEADER */

        .header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            padding: 45px 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .header h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 17px;
            opacity: 0.9;
        }

        /* MAIN CONTAINER */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
        }

        /* SEARCH BOX */

        .search-section {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .search-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 16px 50px 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        .search-box input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
        }

        .search-icon {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 22px;
        }

        /* BOOK COUNT */

        .book-count {
            margin-bottom: 20px;
            font-size: 16px;
            color: #64748b;
        }

        .book-count span {
            color: #4f46e5;
            font-weight: bold;
        }

        /* BOOK GRID */

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        /* BOOK CARD */

        .book-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(79, 70, 229, 0.18);
        }

        .book-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 25px;
            margin-bottom: 18px;
        }

        .book-title {
            font-size: 21px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 18px;
        }

        .book-info {
            margin: 10px 0;
            color: #64748b;
            font-size: 15px;
        }

        .book-info strong {
            color: #334155;
        }

        .price {
            display: inline-block;
            margin-top: 12px;
            padding: 8px 14px;
            background: #ecfdf5;
            color: #059669;
            border-radius: 20px;
            font-weight: bold;
        }

        /* NO RESULT */

        .no-result {
            display: none;
            background: white;
            padding: 40px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .no-result h2 {
            margin-bottom: 10px;
            color: #475569;
        }

        .no-result p {
            color: #94a3b8;
        }

        /* FOOTER */

        footer {
            margin-top: 50px;
            background: #1e293b;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer p {
            font-size: 14px;
            opacity: 0.8;
        }

        /* RESPONSIVE */

        @media (max-width: 600px) {

            .header h1 {
                font-size: 28px;
            }

            .header p {
                font-size: 14px;
            }

            .container {
                width: 94%;
            }

            .book-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- HEADER -->

<div class="header">

    <h1>📚 XML Book Library</h1>

    <p>Read and Display Books Using PHP & XML</p>

</div>


<!-- MAIN CONTENT -->

<div class="container">


    <!-- SEARCH -->

    <div class="search-section">

        <div class="search-title">
            🔎 Search Books
        </div>

        <div class="search-box">

            <input
                type="text"
                id="searchInput"
                placeholder="Search by title, author, year or price..."
                onkeyup="searchBooks()"
            >

            <div class="search-icon">
                🔍
            </div>

        </div>

    </div>


    <!-- BOOK COUNT -->

    <div class="book-count">

        Total Books:
        <span id="bookCount">
            <?php

                $xml = simplexml_load_file("books.xml")
                       or die("Error: Cannot load XML file.");

                echo count($xml->book);

            ?>
        </span>

    </div>


    <!-- BOOK GRID -->

    <div class="book-grid" id="bookGrid">


        <?php

        // Load XML file

        $xml = simplexml_load_file("books.xml")
               or die("Error: Cannot load XML file.");


        // Display each book

        foreach ($xml->book as $book) {

        ?>

            <div class="book-card">

                <div class="book-icon">
                    📖
                </div>

                <div class="book-title">
                    <?php echo $book->title; ?>
                </div>

                <div class="book-info">
                    ✍️ <strong>Author:</strong>
                    <?php echo $book->author; ?>
                </div>

                <div class="book-info">
                    📅 <strong>Year:</strong>
                    <?php echo $book->year; ?>
                </div>

                <div class="price">
                    💰 $<?php echo $book->price; ?>
                </div>

            </div>

        <?php

        }

        ?>

    </div>


    <!-- NO SEARCH RESULT -->

    <div class="no-result" id="noResult">

        <h2>📚 No Books Found</h2>

        <p>
            Try searching with another title, author, year or price.
        </p>

    </div>


</div>


<!-- FOOTER -->

<footer>

    <p>
        XML Book Library | PHP + XML + HTML + CSS + JavaScript
    </p>

</footer>


<!-- JAVASCRIPT SEARCH -->

<script>

function searchBooks() {

    // Get search text

    let searchText =
        document.getElementById("searchInput")
        .value
        .toLowerCase();


    // Get all book cards

    let books =
        document.getElementsByClassName("book-card");


    let visibleBooks = 0;


    // Search each book

    for (let i = 0; i < books.length; i++) {

        let bookText =
            books[i].innerText.toLowerCase();


        // Check search text

        if (bookText.includes(searchText)) {

            books[i].style.display = "block";

            visibleBooks++;

        }

        else {

            books[i].style.display = "none";

        }

    }


    // Update book count

    document.getElementById("bookCount").innerText =
        visibleBooks;


    // Show no-result message

    if (visibleBooks === 0) {

        document.getElementById("noResult")
        .style.display = "block";

    }

    else {

        document.getElementById("noResult")
        .style.display = "none";

    }

}

</script>


</body>

</html>