

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

  .onClickTextOverImage{
  width:38rem;
  height:38rem;
  background-size:cover;
  display:inline-block;
  margin:4px;
  cursor:pointer;
  position:relative;
}

.onClickTextOverImage div{
  position:absolute;
  color:#fff;
  padding:8px;
  top:0;
  bottom:0;
  right:0;
  left:0;
  background-color:rgba(0,0,0,0.5);
  border-radius:16px;
  padding-top:35%;
  text-align:center;
  opacity:0;
  visibility:hidden;
  transition:.3s;
}

.onClickTextOverImage.show div{
  opacity:1;
  padding-top:40%;
  visibility:visible;
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
        <!-- <img class="card-img-top" src="<?php //echo wp_get_original_image_url( $question->image_one ); ?>" alt="Card image cap">
        <div class="card-body my-card">
            <p class="card-text"><?php echo $question->title_one ?></p>
        </div> -->
        <div class="onClickTextOverImage"
          style="background-image:url(<?php echo wp_get_original_image_url( $question->image_one );?>)">
          <div>Total Click <span id="display" onclick="stopPropagation(event)">0</span></div>
        </div>
        <div class="card-body my-card">
            <p class="card-text"><?php echo $question->title_one ?></p>
          </div>
    </div>
    <div class="card col-md-6" style="width: 38rem;">
        <img class="card-img-top" src="<?php echo wp_get_original_image_url( $question->image_two ); ?>" alt="Card image cap">
        <div class="card-body my-card">
            <p class="card-text"><?php echo $question->title_two ?></p>
        </div>
    </div>
  </div>
  <?php } ?>
</div>




<script>
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

