<?php
/*
Template Name: Quiz
Template Post Type: post, page, event
*/
?>

<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>



<?php //get_header(); ?>
<style>

</style>


<?php 
    // $quizURL = 'https://quiz.coconutforlife.org/api/beauty-quiz';
    // $response = wp_remote_get($quizURL);

    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}st_quizes" );
    // $quiz = $wpdb->get_var( "SELECT * FROM {$wpdb->prefix}quizes" );
    
    // if(is_array($response)){
    //     $quezzes = json_decode($response['body']);
        foreach($results as $quiz){
?>
<?php  if($uriSegments[1]){ ?>
 <div class="row quiz-wrap mb-3">
    <div class="col-md-4 p-lg-0">
        <a href="http://localhost/beatnik/quizes/detail/?quiz=<?php echo $quiz->id;?>" class="d-block">
            <img class="img-fluid" src="<?php echo wp_get_original_image_url( $quiz->image ); ?>" />
        </a>
    </div>
</div>
<?php }
        }
?>







<!--<section id="quizzesWrap" class="section-bottom-gap section-top-gap section-light-bg">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-8 col-md-8">-->
<!--                <div class="col-lg-12 col-md-12">-->
<!--                    <div id="quizzes"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<?php //get_footer(); ?>

