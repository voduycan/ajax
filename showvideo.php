 <script type="text/javascript">
            // $('#list-video1').append('<div class="col-12 col-sm-8 col-md-4">\
            //                              <a class="card card-video d-flex align-items-center my-5">\
            //                                  <div class="video">\
            //                                      <img class="video-thumbnail-placeholder" src="" alt="Video">\
            //                                      <button class="play-button"><img src="<?php bloginfo('template_url'); ?>/travel/assets/play-button.svg" alt="Play"></button>\
            //                                      <div  class="play-video d-none"></div>\
            //                                 </div>\
            //                                  <div class="card-body">\
            //                                      <h5 class="card-title text-center"></h5>\
            //                                  </div>\
            //                              </a>\
            //                           </div>');

            // $('#list-video1 img.video-thumbnail-placeholder').attr('src','<?php echo $image; ?>');
            // $('#list-video1 div.play-video').text('<?php echo $link; ?>');
            // $('#list-video1 h5.card-title').text('<?php echo $title; ?>');



            var video1 = '\
                  <div class="col-12 col-sm-8 col-md-4">\
                     <a class="card card-video d-flex align-items-center my-5">\
                         <div class="video">\
                             <img class="video-thumbnail-placeholder" src="<?php echo $image; ?>" alt="Video">\
                             <button class="play-button"><img src="<?php bloginfo('template_url'); ?>/travel/assets/play-button.svg" alt="Play"></button>\
                             <div  class="play-video d-none"><?php echo $link; ?></div>\
                        </div>\
                         <div class="card-body">\
                             <h5 class="card-title text-center"><?php echo $title; ?></h5>\
                         </div>\
                     </a>\
                  </div>';


            var loading = '<img width="20" height="20" alt="loading" src="data:image/gif;base64,R0lGODlhEAAQAPIAAP///zqHrc/h6mylwjqHrYW0zJ7D1qrL2yH+GkNyZWF0ZWQgd2l0aCBhamF4bG9hZC5pbmZvACH5BAAKAAAAIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQACgABACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkEAAoAAgAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkEAAoAAwAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkEAAoABAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQACgAFACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQACgAGACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAAKAAcALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA=="/>';

            var flag2 = false;
            $(document).ready(function(){
                $('#show-more2').click(function(){



                    if(!flag2){
                        flag2 = true;
                        $.ajax({
                            url : '<?php echo admin_url('admin-ajax.php');?>',
                            type : 'post',
                            dataType : 'json',
                            data : {
                                action : 'showall',
                                id : '<?php echo $post->ID; ?>',
                            },
                            beforeSend : function(){
                                $('#show-more2').addClass('d-none');
                                $('#loading').html(loading);
                            },
                            success : function(result){
                                var html = '';
                                result.slice(1).forEach(function(data) {

                                  var html ='\
                                  <div class="col-sm-4 d-none d-md-block">\
                                     <a class="card card-video d-flex align-items-center my-5">\
                                        <div class="video">\
                                             <img class="video-thumbnail-placeholder" src="' + data['video-image'] + '" alt="Video">\
                                             <button class="play-button"><img src="<?php bloginfo('template_url'); ?>/travel/assets/play-button.svg" alt="Play"></button>\
                                             <div  class="play-video d-none">' +data['url-video'] +'</div>\
                                        </div>\
                                         <div class="card-body">\
                                             <h5 class="card-title text-center">'+data['video-title']+'</h5>\
                                         </div>\
                                     </a>\
                                  </div>';
                                  $('#list-video').append(html);
                                })

                                $('#show-more2').html('Less');
                                $('#show-more2').removeClass('d-none');
                                $('#loading').html('');
                            },
                            error: function(jqXHR,textStatus,errorThrown){
                                
                                console.log('The following error occured: ' + textStatus, errorThrown);
                            }
                        })
                        return false;
                    }
                    else{
                        $('#list-video').html(video1);
                        $('#show-more2').html('Add More 2');
                        flag2 = false;
                    }
                });
            });
        </script>

     
<div class="row div-video d-flex justify-content-center" id="list-video">
            <?php 
                $rows = get_field('add-video',$post->ID);
                $row = $rows[0];
                $image = $row['video-image'];
                $title = $row['video-title'];
                $link = $row['url-video'];
            ?>
            <div class="col-12 col-sm-8 col-md-4">
                <a class="card card-video d-flex align-items-center my-5">
                    <div class="video">
                        <img class="video-thumbnail-placeholder" src="<?php echo $image; ?>" alt="Video">
                        <button class="play-button"><img src="<?php bloginfo('template_url'); ?>/travel/assets/play-button.svg" alt="Play"></button>
                        <div  class="play-video d-none">
                            <?php echo $link; ?> 
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $title; ?></h5>
                    </div>
                </a>
            </div>
        </div> 



     <!--   <script type="text/javascript">
            
            var i = 0;
            var flag = false;
            $(document).ready(function(){
                $('#show-more').click(function(){
                    
                    if(!flag){
                        flag = true;
                    $('#show-more').target
                    $.ajax({
                        type : 'post',
                        url : '<?php echo admin_url('admin-ajax.php'); ?>',
                        dataType : 'html',
                        data : {
                            action : 'showvideo',
                            url : '<?php bloginfo('template_url'); ?>',
                            dem : ++i,
                            id : <?php echo $post->ID; ?>,

                            
                        },
                        context : this,
                        beforeSend: function(){
                            $('#show-more').append(' ');
                           $('#show-more').append(loading);
                        },
                        success : function(reponse){
                            $('#list-video').append(reponse);
                            flag = false;
                            
                            if((i+1) == <?php echo count(get_field('add-video'), $post->ID); ?>){

                                $('#show-more').html('Less');
                            } 
                            else{
                                $('#show-more').html('Add More');
                            }
                            if(i >= <?php echo count(get_field('add-video'), $post->ID); ?>){

                                    $('#list-video').html(video1);
                                    i =0;
                            }
                           
                        },
                        error: function(jqXHR,textStatus,errorThrown){
                            
                            console.log('The following error occured: ' + textStatus, errorThrown);
                        }
                        
                    }) 
                    return false;
                    }
                });
            });
            
        </script>  -->


<script type="text/javascript">
    $(document).ready(function(){
        $('#list-video').on('click', '.video', function(){

            $('#list-video .playing').children('.video-thumbnail-placeholder').removeClass('d-none');
            $('#list-video .playing').children('.play-button').removeClass('d-none');
            $('#list-video .playing').children('.play-video').addClass('d-none');
            
            var t = "";
            t = t + $('#list-video .playing').children('.play-video').children('iframe').attr("src");
            
             t = t.replace("&autoplay=1","");
            
            $('#list-video .playing').children('.play-video').children('iframe').attr("src", t);

            $('#list-video .playing').removeClass('playing');
            

            $(this).addClass('playing');
            $(this).children('.video-thumbnail-placeholder').addClass('d-none');
            $(this).children('.play-button').addClass('d-none');
            $(this).children('.play-video').removeClass('d-none');

            $(this).children('.play-video').children('iframe')[0].src += "&autoplay=1";

            
        });


        
    });
    $('body').click(function(e){
            if(e.target.class === 'video'){
                $(this).addCLass('abd');
            }

        })
</script>
 <script type="text/javascript">
    $(document).ready(function(){
       $('#list-video > div').eq(0).removeClass('col-sm-4 d-none d-md-block');
       $('#list-video > div').eq(0).addClass('col-12 col-sm-8 col-md-4');

    });
</script>

<?php 
add_action( 'wp_ajax_showall', 'showall' );
add_action( 'wp_ajax_nopriv_showall', 'showall' );
function showall(){
    $id2 = $_POST['id'];
    $result2 = get_field('add-video',$id2);

    die (json_encode($result2));
}

add_action( 'wp_ajax_showvideo', 'showvideo' );
add_action( 'wp_ajax_nopriv_showvideo', 'showvideo' );

function showvideo() {
    
    
    
    $i = $_POST['dem'];
    $url = $_POST['url'];
    $id = $_POST['id'];
    $rows = get_field('add-video',$id);
    
    if($i < count($rows)){
        $html = '';
        $row = $rows[$i];
        $image = $row['video-image'];
        $title = $row['video-title'];
        $link = $row['url-video'];

            $html .=    '<div class="col-sm-4 d-none d-md-block">';
            $html .=        '<a class="card card-video d-flex align-items-center my-5">';
            $html .=            '<div class="video">';
            $html .=                '<img class="video-thumbnail-placeholder" src="'.$image.'" alt="Video">';
            $html .=                '<button class="play-button"><img src="'.$url.'/travel/assets/play-button.svg" alt="Play"></button>';
            $html .=                '<div  class="play-video d-none">';
            $html .=                   $link; 
            $html .=                 '</div>';
            $html .=            '</div>';
                       
            $html .=             '<div class="card-body">';
            $html .=                 '<h5 class="card-title text-center">'.$title.'</h5>';
            $html .=             '</div>';
            $html .=         '</a>';
            $html .=    '</div>';
        echo $html;  
    }

                                     
 
    die();//bắt buộc phải có khi kết thúc
}
?>
