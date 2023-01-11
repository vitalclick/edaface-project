<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<script type="text/javascript">
  function toggleRatingView(course_id) {
    $('#course_info_view_'+course_id).toggle();
    $('#course_rating_view_'+course_id).toggle();
    $('#edit_rating_btn_'+course_id).toggle();
    $('#cancel_rating_btn_'+course_id).toggle();
  }

  function publishRating(course_id) {
      var review = $('#review_of_a_course_'+course_id).val();
      var starRating = 0;
      starRating = $('#star_rating_of_course_'+course_id).val();
      if (starRating > 0) {
          $.ajax({
              type : 'POST',
              url  : '<?php echo site_url('home/rate_course'); ?>',
              data : {course_id : course_id, review : review, starRating : starRating},
              success : function(response) {
                  location.reload();
              }
          });
      }else{

      }
  }
  
  function handleWishList(elem, id, from) {
    $.ajax({
        url: '<?php echo site_url('home/handleWishList');?>',
        type : 'POST',
        data : {course_id : id},
        success: function(response)
        {
          if("<?= $this->session->userdata('user_login');?>" == '1'){
            if(from == 'course_details'){
              if ($(elem).hasClass('active')) {
                $(elem).removeClass('active')
                $('#wishlist-item-number').html(Number($('#wishlist-item-number').text()) - 1);
                $(elem).html('<?= site_phrase('add_to_wishlist') ?>');
              }else{
                $(elem).addClass('active')
                $('#wishlist-item-number').html(Number($('#wishlist-item-number').text()) + 1);
                $(elem).html('<?= site_phrase('remove_from_wishlist') ?>');
              }
            }else if('<?= $page_name ?>' == 'my_wishlist'){
              $.ajax({
                url: '<?php echo site_url('home/reload_my_wishlists');?>',
                type : 'POST',
                success: function(response) {
                  $('#my_wishlists_area').html(response);
                  $('#wishlist-item-number').html(Number($('#wishlist-item-number').text()) - 1);
                }
              });
            }else{
              if ($(elem).hasClass('wishlist-heart-checked')) {
                $(elem).removeClass('wishlist-heart-checked');
                $('#wishlist-item-number').html(Number($('#wishlist-item-number').text()) - 1);
                $(elem).tooltip('hide').attr('data-original-title', "<?= site_phrase('add_to_wishlist') ?>").tooltip('show');
              }else {
                $(elem).addClass('wishlist-heart-checked');
                $('#wishlist-item-number').html(Number($('#wishlist-item-number').text()) + 1);
                $(elem).tooltip('hide').attr('data-original-title', "<?= site_phrase('remove_from_wishlist') ?>").tooltip('show');
              }
            }
            $('#wishlist_menue_items').html(response);

          }else if("<?= $this->session->userdata('admin_login');?>" == '1'){
            toastr.error('<?= site_phrase('please_sign_in_as_a_student_or_instructor'); ?>');
          }else{
            window.location.replace('<?php echo site_url('home/login'); ?>');
          }
        }
    });
  }

  function handleCartItems(elem, id, from) {
      url1 = '<?php echo site_url('home/handleCartItems');?>';
      url2 = '<?php echo site_url('home/refreshWishList');?>';
      if("<?= $this->session->userdata('user_login');?>" == '1'){
        $.ajax({
            url: url1,
            type : 'POST',
            data : {course_id : id},
            success: function(response)
            {
              $('#cart_menue_items').html(response);

              $.ajax({
                  url: url2,
                  type : 'POST',
                  success: function(response)
                  {
                      $('#wishlist_menue_items').html(response);
                  }
              });

              if(from == 'cart_icon'){
                //from homepage
                if($(elem).hasClass('cart-plus-checked')) {
                  $(elem).removeClass('cart-plus-checked');
                  $('#cart-item-number').html($('#cart-item-number').text()-1);
                  $(elem).tooltip('hide').attr('data-original-title', "<?= site_phrase('add_to_cart') ?>").tooltip('show');
                }else {
                  $(elem).addClass('cart-plus-checked');
                  $('#cart-item-number').html(Number($('#cart-item-number').text()) + 1);
                  $(elem).tooltip('hide').attr('data-original-title', "<?= site_phrase('remove_from_cart') ?>").tooltip('show');
                }
              }else if(from == 'course_details'){
                if($('#course_cart_item_'+id).hasClass('active')) {
                  $('#course_cart_item_'+id).removeClass('active');
                  $('#course_cart_item_'+id).html('<?= site_phrase('add_to_cart') ?>');
                  $('#cart-item-number').html($('#cart-item-number').text()-1);
                }else{
                  $('#course_cart_item_'+id).addClass('active');
                  $('#course_cart_item_'+id).html('<?= site_phrase('remove_from_cart') ?>');
                  $('#cart-item-number').html(Number($('#cart-item-number').text()) + 1);
                }
              }else{
                if($(elem).hasClass('active')) {
                  $(elem).removeClass('active');
                  $(elem).text("<?php echo site_phrase('add_to_cart'); ?>");
                  $('#cart-item-number').html($('#cart-item-number').text()-1);

                  if('<?= $page_name; ?>' == 'course_page'){
                    $('#course_cart_item_'+id).removeClass('active');
                    $('#course_cart_item_'+id).html('<?= site_phrase('add_to_cart') ?>');
                  }else if('<?= $page_name; ?>' == 'home'){
                    $('#cart-plus-'+id).removeClass('cart-plus-checked')
                    $('#cart-plus-'+id).tooltip('hide').attr('data-original-title', "<?= site_phrase('add_to_cart') ?>").tooltip('show');
                  }else if('<?= $page_name; ?>' == 'shopping_cart'){
                    $.ajax({
                      url: '<?php echo site_url('home/refreshShoppingCart');?>',
                      type : 'POST',
                      success: function(response) {
                          $('#shopping_cart_inner_view').html(response);
                      }
                    });
                  }
                }else {
                  $(elem).addClass('active');
                  $(elem).text("<?php echo site_phrase('remove_from_cart'); ?>");
                  $('#cart-item-number').html(Number($('#cart-item-number').text()) + 1);

                  if('<?= $page_name; ?>' == 'course_page'){
                    $('#course_cart_item_'+id).addClass('active');
                    $('#course_cart_item_'+id).html('<?= site_phrase('remove_from_cart') ?>');
                  }else if('<?= $page_name; ?>' == 'home'){
                    $('#cart-plus-'+id).addClass('cart-plus-checked');
                    $('#cart-plus-'+id).tooltip('hide').attr('data-original-title', "<?= site_phrase('remove_from_cart') ?>").tooltip('show');
                  }else if('<?= $page_name; ?>' == 'shopping_cart'){
                    $.ajax({
                      url: '<?php echo site_url('home/refreshShoppingCart');?>',
                      type : 'POST',
                      success: function(response) {
                          $('#shopping_cart_inner_view').html(response);
                      }
                    });
                  }
                }
              }
            }
        });
      }else if("<?= $this->session->userdata('admin_login');?>" == '1'){
        toastr.error('<?= site_phrase('please_sign_in_as_a_student_or_instructor'); ?>');
      }else{
        window.location.replace('<?php echo site_url('home/login'); ?>');
      }
  }

  function handleBuyNow(elem) {
    url1 = '<?php echo site_url('home/handleCartItemForBuyNowButton');?>';
    urlToRedirect = '<?php echo site_url('home/shopping_cart'); ?>';
    var explodedArray = elem.id.split("_");
    var course_id = explodedArray[1];

    if("<?= $this->session->userdata('user_login');?>" == '1'){
      $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : course_id},
        success: function(response)
        {
          setTimeout(function() {
            window.location.replace(urlToRedirect);
          }, 1000);
        }
      });
    }else if("<?= $this->session->userdata('admin_login');?>" == '1'){
      toastr.error('<?= site_phrase('please_sign_in_as_a_student_or_instructor'); ?>');
    }else{
      handleEnrolledButton();
    }
  }

  function handleEnrolledButton() {
    $.ajax({
        url: '<?php echo site_url('home/isLoggedIn?url_history='.base64_encode($actual_link)); ?>',
        success: function(response) {
            if (!response) {
                window.location.replace("<?php echo site_url('login'); ?>");
            }
        }
    });
  }


  function limitedDescription(action){
    if(action == 'read_more'){
      $('.limited-description').hide();
    }else{
      $('.limited-description').show();
    }
  }

  function removeFromCartList(elem, id) {
    url1 = '<?php echo site_url('home/handleCartItems');?>';
    url2 = '<?php echo site_url('home/refreshWishList');?>';
    url3 = '<?php echo site_url('home/refreshShoppingCart');?>';
    $.ajax({
        url: url1,
        type : 'POST',
        data : {course_id : id},
        success: function(response)
        {
          $('#cart-item-number').html($('#cart-item-number').text()-1);
          $('#cart_menue_items').html(response);
            $.ajax({
                url: url2,
                type : 'POST',
                success: function(response)
                {
                    $('#wishlist_menue_items').html(response);
                }
            });

            $.ajax({
                url: url3,
                type : 'POST',
                success: function(response)
                {
                    $('#shopping_cart_inner_view').html(response);
                }
            });
        }
    });
  }


  function getCoursesByCategoryId(category_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_category'); ?>',
        data : {category_id : category_id},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
  }

  function getCoursesBySearchString(search_string) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_search_string'); ?>',
        data : {search_string : search_string},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
  }

  function getMyWishListsBySearchString(search_string) {
    $.ajax({
      type : 'POST',
      url : '<?php echo site_url('home/get_my_wishlists_by_search_string'); ?>',
      data : {search_string : search_string},
      success : function (response) {
          $('#my_wishlists_area').html(response);
      }
    });
  }

  function NewMessage(e){
    e.preventDefault();
    $('#toggle-1').hide();
    $('#toggle-2').show();
    $('#NewMessage').removeAttr('onclick');
  }

  function CancelNewMessage(e){
    e.preventDefault();
    $('#toggle-2').hide();
    $('#toggle-1').show();

    $('#NewMessage').attr('onclick','NewMessage(event)');
  }
</script>
