<?php # DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start() ; 

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

include('logout.html');

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM tv_show WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

 

    echo '<div class="container">
			<h1 class="display-4">'.$row['show_title'].'</h1>
		<div class="row">
			<div class="col-sm-12 col-md-4">
			  <div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src='. $row['preview'].' 
					frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>
			   </div>
			</div>
			<div class="col-sm-12 col-md-4">
				<p>'.$row['info'].'</p>
				<p>Genre: '.$row['genre'].'</p>
				<p>Year: '.$row['year'].'</p>
				<p>Language: '.$row['language'].'</p>
				<p>Duration: '.$row['duration'].'</p>
			</div>
			<div class="col-sm-12 col-md-4">
				';
	
	
	#checking for premium account
	$q1 = "SELECT * FROM type_account WHERE user_id = {$_SESSION[ 'user_id' ] }" ;
	$r1 = mysqli_query( $link, $q1 ) ;
if ( mysqli_num_rows( $r1 ) > 0 )
{
	echo'<div class ="container"><div class="col-sm-12 col-md-4"><button
    type="button"
      class="btn btn-secondary"
    data-bs-toggle="modal"
    data-bs-target="#watch1">
    Episode 1
</button> </div>

<!-- Modal -->
<div
    class="modal fade"
    id="watch1"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
	
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
        <iframe
            width="100%"
            height="200vh"
            src= '.$row['play_1'].'
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
        ></iframe>
        </div>
    </div>
    </div>
</div>';
	
echo'
<div class="col-sm-12 col-md-4"> <button
    type="button"
      class="btn btn-secondary"
    data-bs-toggle="modal"
    data-bs-target="#watch2">
    Episode 2
</button></div>

<!-- Modal -->
<div
    class="modal fade"
    id="watch2"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
	
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
        <iframe
            width="100%"
            height="200vh"
            src= '.$row['play_2'].'
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
        ></iframe>
        </div>
    </div>
    </div>
</div>';	
echo' <div class="col-sm-12 col-md-4"><button
    type="button"
      class="btn btn-secondary"
    data-bs-toggle="modal"
    data-bs-target="#watch3">
   Episode 3
</button></div>

<!-- Modal -->
<div
    class="modal fade"
    id="watch3"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
	
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
        <iframe
            width="100%"
            height="200vh"
            src= '.$row['play_3'].'
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
        ></iframe>
        </div>
    </div>
    </div>
</div>';
				
  }
  
  else {
echo'<a href="cart_index.php"> BUY PREMIUM TO WATCH</a></p>';}
  echo '<hr>
				<h4><br>Movie Reviews</h4>
				<hr>
				  <p>
				  <a href="mov-rev.php?movie_title='.$row['show_title'].'">
				  <span class="btn btn-secondary">This Show </span></a>
				  <a href="review.php?id='.$row['id'].'">
				  <span class="btn btn-secondary">All Shows</span> </a>
				</p>  
			</div>
		</div>';
  
  }

    





# Close database connection.
mysqli_close($link);


# Display footer section.
include ( 'footer.html' ) ;
?>

   