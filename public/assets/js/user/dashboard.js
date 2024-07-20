  // TOGGLE SIDEBAR
  
  $(document).ready(function() {

    buyCoin = $('.buyCoin');
    sellCoin = $('.sellCoin');

    $('.buyCoinBtn').on('click', function(e){
        e.preventDefault();
        sellCoin.addClass('d-none')
        buyCoin.removeClass('d-none')

        $('.buyCoinBtn').addClass('active-type')
        $('.sellCoinBtn').removeClass('active-type')
    });


    $('.sellCoinBtn').on('click', function(e){
        e.preventDefault();
        buyCoin.addClass('d-none')
        sellCoin.removeClass('d-none')

        $('.buyCoinBtn').removeClass('active-type')
        $('.sellCoinBtn').addClass('active-type')
    });
} );

//   const menuBar = document.querySelector('.bx.bx-menu');
//   const sidebar = document.getElementById('sidebar');
  
//   menuBar.addEventListener('click', function () {
//       sidebar.classList.toggle('show');
//   })
  


  
  
  