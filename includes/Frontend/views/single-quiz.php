

<?php
$quizID = explode('=',$_SERVER['QUERY_STRING'])[1];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<style>
  .my-card{
    background-color: black;
    color: white;
    font-size: 20px;
  }
  .title{
    background-color: black;
    padding: 8px;
    border-bottom: 10px solid #b29042;
  }
  .title h1{
    color: #fff;
  }
  .vote-wrap {
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #222222;
    transition: 0.25s linear;
    border-bottom: 10px solid #b29042;
    text-align: left;
    padding: 30px 15px;
    position: absolute;
}
.vote-wrap:before {
    content: "";
    border-top: 0 solid transparent;
    border-bottom: 10px solid #b29042;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    position: absolute;
    bottom: -1px;
    left: 50%;
    transform: translateX(-50%);
}

.vote-wrap.is-show {
    display: none;
}
.card img{
  cursor: pointer;
}
.vote-wrap h1{
  color: #fff;
  font-weight: bold;
}
.vote-wrap h5{
  color: #fff;
}
.vote-wrap h5{
  color: #fff;
}

</style>

<?php 
        
        // $quizId = $_GET['quiz'];
        
        
        // $quizURL = "https://quiz.coconutforlife.org/api/quiz-detail/" . $quizId;
        // $response = wp_remote_get($quizURL);
        // if(is_array($response)){
        //     $quiz = json_decode($response['body']);      
        
        global $wpdb;
        $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}st_quizes WHERE id = $quizID" );
        
        // $quiz = json_decode($results['body']);
        // $id = $_GET['id'];
        //$image = $wpdb->get_var( "SELECT image FROM {$wpdb->prefix}quizes WHERE id = $quizID");
        //$title = $wpdb->get_var( "SELECT title FROM {$wpdb->prefix}quizes WHERE id = $quizID");
        // var_dump($title);
        // $title = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes WHERE id = $quizID" );
        // $questions = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}quiz_questions WHERE quiz_id = $quizID" );
        
?>

<div class="container">
<?php foreach($results as $question){ ?>
  <div class="title">
    <h1><?php echo $question->title ?></h1>
</div>
  <div class="row">
    <div class="card col-md-6" style="width: 38rem;">
        <img class="card-img-top" id="myImg" src="<?php echo wp_get_original_image_url( $question->image_one ); ?>" alt="Card image cap">
        <div class="card-body my-card">
            <p class="card-text"><?php echo $question->title_one ?></p>
        </div>
        <div class="vote-wrap is-show">
            <h1 class="total-vote">Hello Over</h1>
            <h5 class="ans-text"><?php echo 'Choose' ?></h5>
            <h5 class="total-people"><?php echo 'Total <span id="lblShow">0</span> People answered this question' ?></h5>
        </div>
    </div>

    <div class="card col-md-6" style="width: 38rem;">
        <img class="card-img-top" src="<?php echo wp_get_original_image_url( $question->image_two ); ?>" alt="Card image cap">
        <div class="card-body my-card">
            <p class="card-text"><?php echo $question->title_two ?></p>
        </div>

        <div class="vote-wrap is-show">
            <h1 class="total-vote">Hello Over</h1>
            <h5 class="ans-text">Hello Over</h5>
            <h5 class="total-people">Hello Over</h5>
        </div>
    </div>

  </div>
  <?php } ?>
</div>




<script>

$(document).ready(function(){
  $("img").click(function(){
    $("div").removeClass("is-show");
  });
});


$(document).ready(function()
  {
    $(function(){
    let i=0;
     $('#myImg').click(function(){
        $(this).html(i++);
        $('#lblShow').text(i);
        // console.log(i);
       });
     });
  });
  

  function clickCounter() {
  if (typeof(Storage) !== "undefined") {
    if (localStorage.clickcount) {
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    } else {
      localStorage.clickcount = 1;
    }
    document.getElementById("result").innerHTML = "You have clicked the button " + localStorage.clickcount + " time(s).";
  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
  }
}


   var count = 0;
        var btn = document.getElementsByClassName("onClickTextOverImage");
        var disp = document.getElementById("display");
  
        btn.onclick = function () {
            count++;
            disp.innerHTML = count;
        }

    var textOverImages = document.getElementsByClassName("onClickTextOverImage");
var previousTextOverImage;
for (var i = 0; i < textOverImages.length; i++) {
  textOverImages[i].onclick = function() {
    var classes = this.classList;
    if (classes.contains("show")) {
      classes.remove("show");
    } else {
      if (previousTextOverImage != null)
        previousTextOverImage.classList.remove("show");
      previousTextOverImage = this;
      classes.add("show");
    }
  }
}

function stopPropagation(event){
  event.stopPropagation();
}
</script>

