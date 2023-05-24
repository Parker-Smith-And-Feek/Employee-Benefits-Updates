  
  jQuery(document).ready(function($){

    //Menu functioning
    let closed = true;
    function toggleMenu(){
      let ham = document.getElementById('ham');
      console.log('this: ', this);
      ham.classList.toggle('fa-bars');
      ham.classList.toggle('fa-x');

      let selection = document.getElementById('selection');

      if (closed){
        selection.style.left = 0;
        closed = false;
        document.body.classList.add('stopScrolling');  
      } else{
        selection.style.left = '-100%';
        closed = true;
        document.body.classList.remove('stopScrolling');
      }
      
    }
    let menu = document.getElementById('ham');
    menu.addEventListener('click', toggleMenu);

    $(window).resize(function(){
      if ($(window).width() < 770){
        document.body.addEventListener('click', function(event){
          if (event.target.classList.contains('select')){
            toggleMenu();
          }
        })
      }
    })
    
  });//end jQuery
  
    
  