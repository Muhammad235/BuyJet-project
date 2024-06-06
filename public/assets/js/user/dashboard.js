  // TOGGLE SIDEBAR
  
  $(document).ready(function() {

    buyCoin = $('.buyCoin');
    sellCoin = $('.sellCoin');
    giftCard = $('.giftCard');

    $('.buyCoinBtn').on('click', function(e){
        e.preventDefault();
        giftCard.addClass('d-none')
        sellCoin.addClass('d-none')
        buyCoin.removeClass('d-none')

        $('.buyCoinBtn').addClass('active')
        $('.sellCoinBtn').removeClass('active')
        $('.giftCardBtn').removeClass('active')
    });


    $('.sellCoinBtn').on('click', function(e){
        e.preventDefault();
        buyCoin.addClass('d-none')
        giftCard.addClass('d-none')
        sellCoin.removeClass('d-none')

        $('.buyCoinBtn').removeClass('active')
        $('.sellCoinBtn').addClass('active')
    });

    $('.giftCardBtn').on('click', function(e){
        e.preventDefault();
        buyCoin.addClass('d-none')
        sellCoin.addClass('d-none')
        giftCard.removeClass('d-none')

        $('.buyCoinBtn').removeClass('active')
        $('.sellCoinBtn').removeClass('active')
        $('.giftCardBtn').addClass('active')
    });
} );

  const menuBar = document.querySelector('.bx.bx-menu');
  const sidebar = document.getElementById('sidebar');
  
  menuBar.addEventListener('click', function () {
      sidebar.classList.toggle('show');
  })
  


  
  
  