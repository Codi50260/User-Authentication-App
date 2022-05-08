<?php include('connect.php');
    session_start();

    $sql = "SELECT user_name FROM users";
    $sql2 = "SELECT book_name, year, genre, age_group FROM books";
    $sql3 = "SELECT author_name, age, genre, book_id FROM authors";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);

    $name = [];

    $book_name = [];
    $year = [];
    $genre = [];
    $age_group = [];

    $author_name = [];
    $age = [];
    $genre_author = [];
    $book_id = [];

    if($result){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                array_push($name, $row["user_name"]);
            }
        }
    } else {
        echo "Error selecting table " . $conn->error;
    }
    if($result2){
        if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()) {
                array_push($book_name, $row["book_name"]);
                array_push($year, $row["year"]);
                array_push($genre, $row["genre"]);
                array_push($age_group, $row["age_group"]);
            }
        }
    } else {
        echo "Error selecting table " . $conn->error;
    }
    if($result3){
        if($result3->num_rows > 0){
            while($row = $result3->fetch_assoc()) {
                array_push($author_name, $row["author_name"]);
                array_push($age, $row["age"]);
                array_push($genre_author, $row["genre"]);
                array_push($book_id, $row["book_id"]);
            }
        }
    } else {
        echo "Error selecting table " . $conn->error;
    }
    function deleteBook($delName){
        $sql = "DELETE FROM books WHERE book_name ='".$delName."';";
        if ($conn->query($sql) === TRUE) {
            echo "Book has been successfully deleted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<html lang="zxx">
<head>        

        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <!-- Title -->
        <title>Main Page</title>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

        <!-- Stylesheet -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script>
            function move(num, num2){
                for (var x=0; x < 1; x++){
                    $(num).after().appendTo(num2);
                }
            }
            function sortBooks(){
                $('.sort-me').sort(function(a, b) {
                    if (a.textContent < b.textContent) {
                        return -1;
                    } else {
                        return 1;
                    }
                }).appendTo('.here');
            }
            function sortAuthors(){
                for (let i=1; i < 10; i++) {
                    move(".".concat(i), ".t".concat(i));
                }
                $('.sort-me').sort(function(a, b) {
                    if (a.textContent < b.textContent) {
                        return -1;
                    } else {
                        return 1;
                    }
                }).appendTo('.here');
                for (let i=1; i < 10; i++) {
                    move(".t".concat(i), ".r".concat(i));
                }
            }
            function sortGenres(){
                for (let i=1; i < 10; i++) {
                    move(".".concat(i), ".t".concat(i));
                }
                for (let i=1; i < 10; i++) {
                    move(".a".concat(i), ".at".concat(i));
                }
                $('.sort-me').sort(function(a, b) {
                    if (a.textContent < b.textContent) {
                        return -1;
                    } else {
                        return 1;
                    }
                }).appendTo('.here');
                for (let i=1; i < 10; i++) {
                    move(".t".concat(i), ".r".concat(i));
                }
                for (let i=1; i < 10; i++) {
                    move(".at".concat(i), ".ar".concat(i));
                }
            }
            function sort(){
                value = document.getElementById('sort-by').value;
                if (value == 'Title'){
                    sortBooks();
                } else if (value == 'Author'){
                    sortAuthors(); 
                } else if (value == 'Genre'){
                    sortGenres();
                }
            }
            function search_books() {
                let input = document.getElementById('searchbar').value
                input=input.toLowerCase();
                let y = document.getElementsByClassName('sort-me');
                let x = document.getElementsByClassName('search-here');
                
                for (i = 0; i < x.length; i++) {
                    if (!x[i].innerHTML.toLowerCase().includes(input)) {
                        y[i].style.display="none";
                    }
                    else {
                        y[i].style.display="inline-block";				
                    }
                }
            }
            function showEditBook(book_name, year_pub, book_genre, age_group, book_ID){
                document.getElementById('editBook').style.display = "block";
                document.getElementById('Book_ID_update').value = book_ID;
                document.getElementById('Book_name_update').value = book_name;
                document.getElementById('Year_Published_update').value = year_pub;
                document.getElementById('Genre_update').value = book_genre;
                document.getElementById('Age_Group_update').value = age_group;
                
            }
            function showEditAuthor(author_name, author_age, author_genre, book_ID){
                document.getElementById('editAuthor').style.display = "block";
                document.getElementById('Author_Name_const').value = author_name;
                document.getElementById('Author_Name_update').value = author_name;
                document.getElementById('Author_Age_update').value = author_age;
                document.getElementById('Author_Genre_update').value = author_genre;
                document.getElementById('Book_ID_update_Auth').value = book_ID;
            }
        </script>

    </head>

    <body>
        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-full-width">
                        <div class="container">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="filter-box">
                                    <h3><?php echo "Welcome Back ".$_SESSION['userName']."! <p></p>What are you looking for?";?></h3>
                                    <div style="align-items: center;">

                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" id="searchbar" onkeyup="search_books()" type="text" name="search" placeholder="Search by Keyword">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3">
                                            <select name="orderby" id="sort-by">
                                                <option value="Title" selected="selected">Sort by Title</option>
                                                <option value="Author">Sort by Authors</option>
                                                <option value="Genre">Sort by Genre</option>
                                            </select>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="button" value="Sort" onclick="sort()">
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" type="button" value="Switch to Member mode:" onclick="window.location.href='library_member.php'" style="width: 250px">
                                            </div>
                                        </div>

                                        <form method="post">
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Book name" id="Book_name" name="Book_name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Year Published" id="Year_Published" name="Year_Published" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Genre" id="Genre" name="Genre" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Age Group" id="Age_Group" name="Age_Group" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="submit" value="Add New Book" name="newBook">
                                                </div>
                                            </div>
                                        </form>

                                        <form method="post">
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Author Name" id="Author_Name" name="Author_Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Author Age" id="Author_Age" name="Author_Age" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Author Genre" id="Author_Genre" name="Author_Genre" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Book Reference (ID)" id="Book_ID" name="Book_ID" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="submit" value="Add Author" name="addAuthor">
                                                </div>
                                            </div>
                                        </form>

                                        <form method="post" style="display: None" id="editBook">
                                            <input class="form-control" id="Book_ID_update" name="Book_ID_update" type="text" style="display: None">
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Book_name_update" name="Book_name_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Year_Published_update" name="Year_Published_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Genre_update" name="Genre_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Age_Group_update" name="Age_Group_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="submit" value="Update Book" name="editBook">
                                                </div>
                                            </div>
                                        </form>

                                        <form method="post" style="display: None" id="editAuthor">
                                            <input class="form-control" id="Author_Name_const" name="Author_Name_const" type="text" style="display: None">
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Author_Name_update" name="Author_Name_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Author_Age_update" name="Author_Age_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Author_Genre_update" name="Author_Genre_update" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3" style="width: 20.8%;">
                                                <div class="form-group">
                                                    <input class="form-control" id="Book_ID_update_Auth" name="Book_ID_update_Auth" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="submit" value="Update Author" name="editAuthor">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </section>
                            <!-- End: Search Section -->
                            
                            <div class="booksmedia-fullwidth">
                                <ul class="here">
                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Gatsby.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r1"></h4>
                                                    <h4 class="1"><?php echo $book_name[0]?></h4>
                                                    <p class="ar1"><strong></strong></p>
                                                    <p class="a1"><strong>Author: </strong><?php echo $author_name[0]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[0]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[0]?> on the <?php echo $year[0]?>. It is for the ages of <?php echo $age_group[0]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[0]?>', '<?php echo $year[0]?>', '<?php echo $genre[0]?>', '<?php echo $age_group[0]?>', '<?php echo $book_id[0]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[0]?>', '<?php echo $age[0]?>', '<?php echo $genre_author[0]?>', '<?php echo $book_id[0]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[0]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[0]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[0]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\TLOR.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r2"></h4>
                                                    <h4 class="2"><?php echo $book_name[1]?></h4>
                                                    <p class="ar2"><strong></strong></p>
                                                    <p class="a2"><strong>Author: </strong><?php echo $author_name[1]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[1]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[1]?> on the <?php echo $year[1]?>. It is for the ages of <?php echo $age_group[1]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[1]?>', '<?php echo $year[1]?>', '<?php echo $genre[1]?>', '<?php echo $age_group[1]?>', '<?php echo $book_id[1]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[1]?>', '<?php echo $age[1]?>', '<?php echo $genre_author[1]?>', '<?php echo $book_id[1]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[1]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[0]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[1]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Harry Potter.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r3"></h4>
                                                    <h4 class="3"><?php echo $book_name[2]?></h4>
                                                    <p class="ar3"><strong></strong></p>
                                                    <p class="a3"><strong>Author: </strong><?php echo $author_name[2]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[2]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[2]?> on the <?php echo $year[2]?>. It is for the ages of <?php echo $age_group[2]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[2]?>', '<?php echo $year[2]?>', '<?php echo $genre[2]?>', '<?php echo $age_group[2]?>', '<?php echo $book_id[2]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[2]?>', '<?php echo $age[2]?>', '<?php echo $genre_author[2]?>', '<?php echo $book_id[2]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[2]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[1]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[2]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Scouting.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r4"></h4>
                                                    <h4 class="4"><?php echo $book_name[3]?></h4>
                                                    <p class="ar4"><strong></strong></p>
                                                    <p class="a4"><strong>Author: </strong><?php echo $author_name[3]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[3]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[3]?> on the <?php echo $year[3]?>. It is for the ages of <?php echo $age_group[3]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[3]?>', '<?php echo $year[3]?>', '<?php echo $genre[3]?>', '<?php echo $age_group[3]?>', '<?php echo $book_id[3]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[3]?>', '<?php echo $age[3]?>', '<?php echo $genre_author[3]?>', '<?php echo $book_id[3]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[3]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[2]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[3]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Hobbit.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r5"></h4>
                                                    <h4 class="5"><?php echo $book_name[4]?></h4>
                                                    <p class="ar5"><strong></strong></p>
                                                    <p class="a5"><strong>Author: </strong><?php echo $author_name[1]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[4]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[1]?> on the <?php echo $year[4]?>. It is for the ages of <?php echo $age_group[4]?></p><div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[4]?>', '<?php echo $year[4]?>', '<?php echo $genre[4]?>', '<?php echo $age_group[4]?>', '<?php echo $book_id[4] - $book_id[0]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[1]?>', '<?php echo $age[1]?>', '<?php echo $genre_author[1]?>', '<?php echo $book_id[4] - $book_id[0]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[4]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[4] - $book_id[0]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[1]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Mockingbird.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r6"></h4>
                                                    <h4 class="6"><?php echo $book_name[5]?></h4>
                                                    <p class="ar6"><strong></strong></p>
                                                    <p class="a6"><strong>Author: </strong><?php echo $author_name[4]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[5]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[4]?> on the <?php echo $year[5]?>. It is for the ages of <?php echo $age_group[5]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[5]?>', '<?php echo $year[5]?>', '<?php echo $genre[5]?>', '<?php echo $age_group[5]?>', '<?php echo $book_id[4]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[4]?>', '<?php echo $age[4]?>', '<?php echo $genre_author[4]?>', '<?php echo $book_id[4]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[5]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[4]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[4]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Anna.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r7"></h4>
                                                    <h4 class="7"><?php echo $book_name[6]?></h4>
                                                    <p class="ar7"><strong></strong></p>
                                                    <p class="a7"><strong>Author: </strong><?php echo $author_name[5]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[6]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[5]?> on the <?php echo $year[6]?>. It is for the ages of <?php echo $age_group[6]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[6]?>', '<?php echo $year[6]?>', '<?php echo $genre[6]?>', '<?php echo $age_group[6]?>', '<?php echo $book_id[5]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[5]?>', '<?php echo $age[5]?>', '<?php echo $genre_author[5]?>', '<?php echo $book_id[5]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[6]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[5]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[5]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\One Hundred.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r8"></h4>
                                                    <h4 class="8"><?php echo $book_name[7]?></h4>
                                                    <p class="ar8"><strong></strong></p>
                                                    <p class="a8"><strong>Author: </strong><?php echo $author_name[6]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[7]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[6]?> on the <?php echo $year[7]?>. It is for the ages of <?php echo $age_group[7]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[7]?>', '<?php echo $year[7]?>', '<?php echo $genre[7]?>', '<?php echo $age_group[7]?>', '<?php echo $book_id[6]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[6]?>', '<?php echo $age[6]?>', '<?php echo $genre_author[6]?>', '<?php echo $book_id[6]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[7]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[6]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[6]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>

                                    <li class="sort-me">
                                        <figure>
                                            <a href="books-media-detail-v2.html"><img src="images\Books Images\Invisible man.jpg" alt="Book"></a>
                                            <figcaption>
                                                <header class="search-here">
                                                    <h4 class="r9"></h4>
                                                    <h4 class="9"><?php echo $book_name[8]?></h4>
                                                    <p class="ar9"><strong></strong></p>
                                                    <p class="a9"><strong>Author: </strong><?php echo $author_name[7]?></p>
                                                    <p><strong>Genre: </strong><?php echo $genre[8]?></p>
                                                </header>
                                                <p>This book was written by <?php echo $author_name[7]?> on the <?php echo $year[8]?>. It is for the ages of <?php echo $age_group[8]?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a onclick="showEditBook('<?php echo $book_name[8]?>', '<?php echo $year[8]?>', '<?php echo $genre[8]?>', '<?php echo $age_group[8]?>', '<?php echo $book_id[7]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit book">
                                                                <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-book" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a onclick="showEditAuthor('<?php echo $author_name[7]?>', '<?php echo $age[7]?>', '<?php echo $genre_author[7]?>', '<?php echo $book_id[7]?>')" href="#content" data-toggle="blog-tags" data-placement="top" title="Edit Author">
                                                                <button style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user" style="color: black"></i></button>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="BookName" style="display: None" value="<?php echo $book_name[8]?>">
                                                                <input name="id" style="display: None" value="<?php echo $book_id[7]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Book" style="color: #eb4034" name="deleteBook">
                                                                    <button name="deleteBook" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-trash" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form method="post">
                                                                <input name="AuthorName" style="display: None" value="<?php echo $author_name[7]?>">
                                                                <a data-toggle="blog-tags" data-placement="top" title="Delete Author" style="color: #eb4034" name="deleteAuthor">
                                                                    <button name="deleteAuthor" style="background-color: transparent; padding: 0px 0px 0px 0px"><i class="fa fa-user-times" style="color: red"></i></button>
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>
                                </ul>
                            </div>
                            <nav class="navigation pagination text-center">
                                <h2 class="screen-reader-text">Posts navigation</h2>
                                <div class="nav-links">
                                    <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> Previous</a>
                                    <a class="page-numbers current" href="#.">1</a>
                                    <a class="page-numbers" href="#.">2</a>
                                    <a class="page-numbers" href="#.">3</a>
                                    <a class="page-numbers" href="#.">4</a>
                                    <a class="next page-numbers" href="#.">Next <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </nav>
                            <div class="t1"></div>
                            <div class="t2"></div>
                            <div class="t3"></div>
                            <div class="t4"></div>
                            <div class="t5"></div>
                            <div class="t6"></div>
                            <div class="t7"></div>
                            <div class="t8"></div>
                            <div class="t9"></div>
                            <div class="at1"></div>
                            <div class="at2"></div>
                            <div class="at3"></div>
                            <div class="at4"></div>
                            <div class="at5"></div>
                            <div class="at6"></div>
                            <div class="at7"></div>
                            <div class="at8"></div>
                            <div class="at9"></div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <br><br>
        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="js/bxslider.min.js"></script>
        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="js/main_book.js"></script>

    </body>
</html>
<?php if ($_POST){
    if(isset($_POST["newBook"])){
        $name = $_POST['Book_name'];
        $year = $_POST['Year_Published'];
        $genre = $_POST['Genre'];
        $age = $_POST['Age_Group'];
        $sql = "INSERT INTO books (book_name, year, genre, age_group)
        VALUES ('$name', '$year', '$genre', '$age')";
        if ($conn->query($sql) === TRUE) {
            echo "New Book has been successfully created";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(isset($_POST["addAuthor"])){
        $name = $_POST['Author_Name'];
        $age = $_POST['Author_Age'];
        $genre = $_POST['Author_Genre'];
        $bookID = $_POST['Book_ID'];
        $sql = "INSERT INTO authors (author_name, age, genre, book_id)
        VALUES ('$name', '$age', '$genre', '$bookID')";
        if ($conn->query($sql) === TRUE) {
            echo "New Author has been successfully created";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(isset($_POST["deleteBook"])){
        $delName = $_POST['BookName'];
        $id = $_POST['id'];
        $sql = "UPDATE authors SET book_id = NULL WHERE book_id =$id;";
        $sql2 = "DELETE FROM books WHERE book_name ='".$delName."';";
        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
        if ($conn->query($sql2) === TRUE) {
            echo "Book has been successfully deleted";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
    if(isset($_POST["deleteAuthor"])){
        $delAuthor = $_POST['AuthorName'];
        $sql = "DELETE FROM authors WHERE author_name ='".$delAuthor."';";
        if ($conn->query($sql) === TRUE) {
            echo "Author has been successfully deleted";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(isset($_POST["editBook"])){
        $book_id = $_POST['Book_ID_update'];
        $addBook = $_POST['Book_name_update'];
        $addYear = $_POST['Year_Published_update'];
        $addGenre = $_POST['Genre_update'];
        $addGroup = $_POST['Age_Group_update'];
        $sql = "UPDATE books SET book_name = '".$addBook."', year = '".$addYear."', genre = '".$addGenre."', age_group = '".$addGroup."' WHERE book_id = '".$book_id."';";
        if ($conn->query($sql) === TRUE) {
            echo "Book has been successfully updated";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if(isset($_POST["editAuthor"])){
        $AuthName = $_POST['Author_Name_const'];
        $addAuthName = $_POST['Author_Name_update'];
        $addAuthAge = $_POST['Author_Age_update'];
        $addAuthGenre = $_POST['Author_Genre_update'];
        $addBookID = $_POST['Book_ID_update_Auth'];
        $sql = "UPDATE authors SET author_name = '".$addAuthName."', age = '".$addAuthAge."', genre = '".$addAuthGenre."', book_id = '".$addBookID."' WHERE author_name = '".$AuthName."';";
        if ($conn->query($sql) === TRUE) {
            echo "Author has been successfully updated";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>