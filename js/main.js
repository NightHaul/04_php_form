
  $(document).ready(function() {
    $('.sign_in').on('click', function() {
      $('.login_box').addClass('active');
    });
  });

  
  $(document).ready(function() {
    $('.sign_in').on('click', function() {
      $('.mask').addClass('modaru');
    });
  });

  
  $(document).ready(function() {
    $('.mask').on('click', function() {
      $('.login_box').removeClass('active');
      $('.mask').removeClass('modaru');
    });
    
  });

  



