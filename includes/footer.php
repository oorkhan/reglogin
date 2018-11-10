<footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
<div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
      /* document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
      }); */


      $(document).ready(function(){
        $('.modal').modal();
      });

/* $(".delete_btn").on('click', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = link;
        }
      });
    }); */

      $(document).on('click', '.edit_data', function(){
           var id = $(this).attr("id");
           $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#title').val(data.title);
                     $('#body').val(data.body);
                     $('#id').val(data.id);
                }
           });
      });
      $('#update_form').on("submit", function(event){
           event.preventDefault();
           if($('#title').val() == "")
           {
                alert("Title is required");
           }
           else if($('#boty').val() == '')
           {
                alert("Text is required");
           }
           else
           {
                $.ajax({
                     url:"update.php",
                     method:"POST",
                     data:$('#update_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Updating");
                     },
                     success:function(data){
                          $('#update_form')[0].reset();
                          $('#modal1').modal('close');
                         // $('#post_table').html(data);
                         location.reload();
                     }
                });
           }
      });

      $('.dropdown-trigger').dropdown();

      $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
      });

      $(document).ready(function(){
        $(".delete_btn").click(function(){
          if (!confirm("Do you want to delete")){
            return false;
          }
        });
      });

      //add comment in post.php
      $(document).ready(function(){
 
      $('#comment_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
        url:"add_comment.php",
        method:"POST",
        data:form_data,
        dataType:"JSON",
        success:function(data)
        {
          if(data.error != '')
          {
          $('#comment_form')[0].reset();
          $('#comment_message').html(data.error);
          }
          load_comment();          
        }
        })
      });

      load_comment();

      //display comments post.php
      function load_comment(post_id)
      {
        var post_id = $('#post_id').val();
        $.ajax({
          url:"fetch_comments.php",
          data:{post_id : post_id},
          method:"POST",
          success:function(data)
          {
            $('#display_comment').html(data);
          }
        })
      }
      //comment reply fetch_comment.php
      $(document).on('click', '.reply',function(){
        var comment_id = $(this).attr("id"); // getting from button reply created by fetch
        $('#comment_id').val(comment_id); // asign it to hidden input in post.php
        $('#comment_name').focus();
      });

      // like button post.php 
});

      function like(post_id){
        $.ajax({
          url : "likepost.php",
          method : "POST",
          data : {post_id : post_id},
          success : function(data){
            var btn = $('#like_btn');
            btn.attr("onclick" , `dislike(<?= $post_id ?>)`)
            btn.html('<i class="material-icons">thumb_down</i>');
            btn.removeClass("orange");
            btn.addClass("red")
            //window.location.reload(true);
            //location.reload(true);
           if(data!=='0'){
              $("#likes_of_"+post_id).html(data);
            }else {
              console.log(data);
            } 
          },
          error : function(e){
            console.log(e);
          }
        });
      } //end like()

      //start dislike()
       function dislike(post_id){
        $.ajax({
          url : "dislikepost.php",
          method : "POST",
          data : {post_id : post_id},
          success : function(data){
            var btn = $('#dislike_btn');
            btn.attr("onclick" , `like(<?= $post_id ?>)`)
            btn.html('<i class="material-icons">thumb_up</i>');
            btn.removeClass("red");
            btn.addClass("orange");

            //console.log(data);
             //window.location.reload(true);
            //location.reload(true);
             if(data!=='0'){
              $("#likes_of_"+post_id).html(data);
            }else {
              console.log(data);
            } 
          },
          error : function(e){
            console.log(e);
          }
        });
      }
    </script>

  </body>
</html>
