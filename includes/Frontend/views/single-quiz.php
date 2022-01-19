

<?php
$quizID = explode('=',$_SERVER['QUERY_STRING'])[1];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<style>

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
  <div class="row">
    <div class="card col-md-6" style="width: 38rem;">
        <img class="card-img-top" src="<?php echo wp_get_original_image_url( $question->image_one ); ?>" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card col-md-6" style="width: 38rem;">
        <img class="card-img-top" src="<?php echo wp_get_original_image_url( $question->image_two ); ?>" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
  </div>
  <?php } ?>
</div>




<script>
    
</script>

