<?php
/*
Template Name: Quiz Details
Template Post Type: post, page, event
*/
?>

<?php
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>

<?php get_header(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<style>
html,body{
    background:#fff !important;
}
.question-slider-images {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}

.question {
    width: 50%;
    margin: 30px auto;
}

.answers{
    margin:0;
}

.answers .answer {
    background: #f9f9f9;
    padding: 10px;
    margin-bottom: 5px;
    border-bottom: 1px solid #75c41b;
    text-transform: capitalize;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.d-none{
    display:none;
}

.question-carousel .owl-dots {
    position: absolute;
    top: 0;
    left: 0;
}

.owl-theme .owl-nav.disabled+.owl-dots {
    margin-top: -25px;
}

.text-success {
    color: #38c172 !important;
}

.text-danger {
    color: #e3342f !important;
}

.cover img {
    width: 100% !important;
}

.show{
    display:block !important;
}

.hide{
    display:none !important;
}

.fade:not(.show) {
    opacity: 0;
}


.modal {
    z-index: 1072;
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
    background: #0000004f;
}

.fade {
    transition: opacity .15s linear;
}
.modal.fade .modal-dialog {
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out,-webkit-transform .3s ease-out;
    -webkit-transform: translate(0,-50px);
    transform: translate(0,-50px);
}

.modal-dialog {
    position: relative;
    width: auto;
    margin: .5rem;
    pointer-events: none;
}

.modal-dialog-scrollable {
    display: -ms-flexbox;
    display: flex;
    max-height: calc(100% - 1rem);
}

.modal-dialog-centered {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    min-height: calc(100% - 1rem);
}


@media (min-width: 576px){

    .modal-dialog-scrollable {
        max-height: calc(100% - 3.5rem);
    }


    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    outline: 0;
    background: #ffffff;
    border-radius: 7px;
    overflow:hidden;
}

.modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}

button.close {
    width: 25px;
    height: 25px;
    position: absolute;
    right: 0;
    border: none;
    background: red;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    cursor:pointer;
    z-index: 1;
}

.font-ubuntu{
    font-family: Ubuntu;
}

@media only screen and (max-width: 767px){
    .question {
        width: 90%;
        margin: 20px auto;
    }
}
</style>

<div class="quiz-banner-image">
    <img src="https://coconutforlife.org/wp-content/uploads/2021/03/quiz-banner.jpg" />
</div>
<?php 
        
        $quizId = $_GET['quiz'];
        
        
        $quizURL = "https://quiz.coconutforlife.org/api/quiz-detail/" . $quizId;
        $response = wp_remote_get($quizURL);
        if(is_array($response)){
            $quiz = json_decode($response['body']);             
?>
<?php  if($uriSegments[1] == 'bn'){ ?>


    <div class="question">
        <div class="cover">
            <img class="img-fluid" src="<?php echo $quiz->thumbnail; ?>" alt="">
        </div>
        <div class="title">
            <h1 class="py-3 font-ubuntu" style="margin-bottom:50px;">
                <?php echo $quiz->quizBn; ?>
            </h1>
        </div>


    
    <div class="owl-carousel owl-theme question-carousel">
        <?php foreach($quiz->questions as $key => $question){ ?>
            <div class="item">
                <div class="question-slider-images">
                <img src="<?php echo $question->thumbnailBn; ?>" alt=""/>
                </div>
                <ul class="answers">
                    <?php foreach($question->answers as $answer){?>
                    <li class="answer d-flex align-items-center justify-content-between font-ubuntu"
                        data-quiz="<?php echo $quiz->quizEn; ?>" data-question="<?php echo $question->id; ?>"
                        data-answer="<?php echo $answer->id; ?> ">
                        <?php echo $answer->answerBn; ?> 
                        <div class="icon">
                            <i class="fas fa-check-circle text-success d-none"></i>
                            <i class="fas fa-times-circle text-danger d-none"></i>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<?php }else{ ?>

    <div class="question">
        <div class="cover">
            <img class="img-fluid" src="<?php echo $quiz->thumbnail; ?>" alt="">
        </div>
        <div class="title">
            <h1 class="py-3 font-ubuntu" style="margin-bottom:50px;">
                <?php echo $quiz->quizEn ?>
            </h1>
        </div>


    
    <div class="owl-carousel owl-theme question-carousel">
        <?php foreach($quiz->questions as $key => $question){ ?>
            <div class="item">
                <div class="question-slider-images">
                <img src="<?php echo $question->thumbnail; ?>" alt=""/>
                </div>
                <ul class="answers">
                    <?php foreach($question->answers as $answer){?>
                    <li class="answer d-flex align-items-center justify-content-between font-ubuntu"
                        data-quiz="<?php echo $quiz->quizEn; ?>" data-question="<?php echo $question->id; ?>"
                        data-answer="<?php echo $answer->id; ?> ">
                        <?php echo $answer->answerEn; ?> 
                        <div class="icon">
                            <i class="fas fa-check-circle text-success d-none"></i>
                            <i class="fas fa-times-circle text-danger d-none"></i>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<?php } ?>


<?php } ?>


<!-- Congrats Modal -->
<div class="modal congrats-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="congratulations"></div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        let langurls = $('.wpml-ls-link');
        let urlbn = "<?php echo $quiz->urlBn;?>";
        let urlen = "<?php echo $quiz->urlEn;?>";
        $.each(langurls, function(index, langurl){
            console.log($(langurl).attr('href').split("/")[3]);
            if($(langurl).attr('href').split("/")[3] == 'en'){
                $(langurl).attr('href', `https://coconutforlife.org/en/quiz/detail/?quiz=${urlen}`);
            }else if($(langurl).attr('href').split("/")[3] == 'bn'){
                $(langurl).attr('href', `https://coconutforlife.org/bn/quiz/detail/?quiz=${urlbn}`);
            }
        });
    });
</script>


<script>
    $(document).ready(function(){
        let questionSlider = $('.owl-carousel');  
         let rightAnswers = 0;
        let wrongAnswers = 0;
        let slideCount = 0;
        let totalQuestion = "<?php echo count($quiz->questions); ?>";

        $(document).on('click','.answer',function() {
            let questionId = $(this).attr('data-question');
            let _this = this;
            let answerId = $(this).attr('data-answer');
            let url = "https://quiz.coconutforlife.org/api/answer/"+questionId;

            $.ajax({
                type:'POST',
                url:url,
                dataType:'json',
                success:function(data){
                    $.each(data, function(key, answer){
                        if(answer.id === parseInt(answerId) && answer.answer){
                            $(_this).children().children(':first-child').removeClass('d-none');
                            ++rightAnswers;
                        }else if(answer.id === parseInt(answerId) && !answer.answer){
                            ++wrongAnswers;
                            $.each(data, function(key, answer2){
                                $(_this).siblings().each(function() {
                                    if(answer2.answer && answer2.id === parseInt($(this).attr('data-answer'))){
                                        $(this).children().children(':first-child').removeClass('d-none')
                                    }
                                });
                            });
                            $(_this).children().children(':last-child').removeClass('d-none')
                        }
                    })
                    ++slideCount;
                    setTimeout(() => {
                        questionSlider.trigger('next.owl.carousel');
                    }, 1000);
                },
                complete: function(data) {
                    let percentage = (rightAnswers / (rightAnswers + wrongAnswers)) * 100;
                    if(slideCount == parseInt(totalQuestion)){
                        $('.congrats-modal').addClass('show');
                       if(Math.round(percentage) < 60){
                                $('.congratulations').html(`
                            <h3 class="font-ubuntu">You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! Do you want to try again?
Also, don't forget to share this quiz with your friends!</h3>
                            `)
                            }else if(Math.round(percentage) >= 60 && Math.round(percentage) <= 70){
                                $('.congratulations').html(`
                            <h3 class="font-ubuntu">You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! 
Don't forget to share this quiz with your friends!</h3>
                            `)
                            }else if(Math.round(percentage) > 70){
                                $('.congratulations').html(`
                            <h3 class="font-ubuntu">Congratulations! You've scored <span class="percentage">${Math.round(percentage)}%</span> on this quiz! 
Don't forget to share this quiz with your friends!</h3>
                            `)
                            }                    
                    }
                }
            })
        });
        
        $(document).on('click','.close', function(){
            window.location.reload();
        })

        questionSlider.owlCarousel({
            navigation : false,
            loop:false,
            margin:10,
            nav:false,
            mouseDrag:false,
            dots:true,
            autoplay:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })

        $( '.owl-dot' ).on( 'click', function() {
            return false;
        })
    })
</script>
<?php get_footer(); ?>
