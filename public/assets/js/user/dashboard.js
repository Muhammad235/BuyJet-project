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


document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    // Toggle the dropdown menu when the button is clicked
    dropdownButton.addEventListener('click', function () {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', function (e) {
        if (!dropdownButton.contains(e.target)) {
        dropdownMenu.style.display = 'none';
        }
    });
    });

//   const menuBar = document.querySelector('.bx.bx-menu');
//   const sidebar = document.getElementById('sidebar');

//   menuBar.addEventListener('click', function () {
//       sidebar.classList.toggle('show');
//   })





