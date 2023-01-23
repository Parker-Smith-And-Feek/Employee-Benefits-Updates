  
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
  
    let today = new Date();
    let time = today.getTime();
    //add styles to selected option
    
  
    let upcomingWebinars = [];
    let pastWebinars = [];
  
    for (let x in benefitsWebinars){
      let dateString = benefitsWebinars[x].Date;
      let gmt = new Date(dateString);
  
      if(gmt.getTime() > time){
        upcomingWebinars.unshift(benefitsWebinars[x]);
      } else{
        pastWebinars.push(benefitsWebinars[x]);
      }
  
  
    }
  
    console.log("upcomingWebinars: ", upcomingWebinars);
    console.log("pastWebinars: ", pastWebinars);
    console.log("benefitArticles: ", benefitAlerts);
    console.log("employeeBenefits: ", employeeBenefits);
  
    // showData(benefitsWebinars);
    showUpcoming(upcomingWebinars);
    showPast(pastWebinars);
    showArticles(benefitAlerts, 'baArticles');
    showArticles(employeeBenefits, 'ebArticles');
  
    function showArticles(apidata, containerID){
      for (let webinar in apidata){
        //Convert webinar date to javascript date
        id = "webinar" + webinar;
        let dateString = apidata[webinar].date;
        let gmt = new Date(dateString);
  
        //Get fields that will populate the html divs.
        title = apidata[webinar].title;
        postDate = gmt.toLocaleDateString("en-US", {
          year:'numeric',
          month: 'long',
          day: '2-digit',
        });
        id = apidata[webinar].id;
        link = apidata[webinar].link;
        tags = apidata[webinar].tags;
        let content = apidata[webinar].content;
        let count = webinar;
  
        if (webinar < 4){
          console.log('webinar: ', webinar);
          if (webinar === '0'){
            $( `<div class = 'webinar post ${tags} index${webinar}' id = ${id}>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <a class = 'excerpt' href = ${link}>View Article</a>
            </div>` ).appendTo( "#" + containerID + " #mostRecent"  );
  
            $( `<div class = 'webinar post ${tags} index${webinar}' id = ${id}>
              <p class = 'postDate'>${postDate}</p>
              <h3 class = 'webinarTitle'>${title}</h3>
              <a class = 'excerpt' href = ${link}>View Article</a>
            </div>` ).appendTo( ".overviewArticles ." + containerID, );
          } else{
            $( `<div class = 'webinar post ${tags} index${webinar}' id = ${id}>
              <p class = 'postDate'>${postDate}</p>
              <h3 class = 'webinarTitle'>${title}</h3>
              <a class = 'excerpt' href = ${link}>View Article</a>
            </div>` ).appendTo( ".overviewArticles ." + containerID, );
          }
  
        } else{
          //Populate the html div with webinar info. Will stylize through css.
            $( `<div class = 'webinar post ${tags}' id = ${id}>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <a class = 'excerpt' href = ${link}>View Article</a>
            </div>` ).appendTo( "#" + containerID + " #remainder");
  
  
        }
  
  
      }
    }
  
    function showUpcoming(webinarArray){
      let webCount = 0;
      for (let webinar in webinarArray){
        console.log("webinar: ", webinar);
        let dateString = webinarArray[webinar].Date;
        let gmt = new Date(dateString);
        title = webinarArray[webinar].Title;
        postDate = gmt.toLocaleDateString("en-US", {
          year:'numeric',
          month: 'long',
          day: '2-digit',
        });
        handout = webinarArray[webinar].Handout;
        content = webinarArray[webinar].Content.replace('<p>','').replace('</p>', '');
        presentation = webinarArray[webinar].Presentation;
        recording = webinarArray[webinar].Recording;
        id = webinarArray[webinar].ID;
        let host = webinarArray[webinar].Host;
  
        if (webinarArray.length === 0){
          $(`<h3 class = 'webinarTitle'>There are currently no upcoming webinars scheduled. Check back for a list of Parker, Smith & Feek webinars.`).appendTo('#upcoming');
        }
  
        if (webinar == 0){
          if (host === "Benefit Comply"){
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <p class = 'presenter'><i>Presented by ${host}. All Benefit Comply, LLC employee benefit webinars are held at 3 p.m. Eastern, 2 p.m. Central, Noon Pacific, and are 60 minutes</i></p>
            </div>` ).appendTo( ".upcomingWebinars" );
          } else{
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <p class = 'presenter'><i>Presented by ${host}</i></p>
            </div>` ).appendTo( ".upcomingWebinars" );
          }
        } else if(webinar < 2){
          if (host === "Benefit Comply"){
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <p class = 'presenter'><i>Presented by ${host}. All Benefit Comply, LLC employee benefit webinars are held at 3 p.m. Eastern, 2 p.m. Central, Noon Pacific, and are 60 minutes</i></p>
            </div>` ).appendTo( ".webinarsContainer .upcomingWebinars" );
  
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
            </div>` ).appendTo( "#upcoming" );
  
  
          } else{
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <p class = 'presenter'><i>Presented by ${host}</i></p>
            </div>` ).appendTo( ".webinarsContainer .upcomingWebinars" );
  
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
            </div>` ).appendTo( "#upcoming" );
          }
        } else{
          if (host === "Benefit Comply"){
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <p class = 'presenter'><i>Presented by ${host}. All Benefit Comply, LLC employee benefit webinars are held at 3 p.m. Eastern, 2 p.m. Central, Noon Pacific, and are 60 minutes</i></p>
            </div>` ).appendTo( ".webinarsContainer .upcomingWebinars" );
  
  
          } else{
            $( `<div class = 'webinar post' id = '${id}'>
              <h3 class = 'webinarTitle'>${title}</h3>
              <p class = 'postDate'>${postDate}</p>
              <p class = 'content'>${content}</p>
              <p class = 'presenter'><i>Presented by ${host}</i></p>
            </div>` ).appendTo( ".webinarsContainer .upcomingWebinars" );
          }
        }//end if webinar === 0
      }//end for loop
      $(`<a id="visitWebinars" href = '/webinars'>Complete list of upcoming webinars</a>`).appendTo("#upcoming");
    }
  
    function showPast(webinarArray){
  
      for (let webinar in webinarArray){
        let dateString = webinarArray[webinar].Date;
        let gmt = new Date(dateString);
        title = webinarArray[webinar].Title;
        postDate = gmt.toLocaleDateString("en-US", {
          year:'numeric',
          month: 'long',
          day: '2-digit',
        });
        handout = webinarArray[webinar].Handout;
        content = webinarArray[webinar].Content;
        presentation = webinarArray[webinar].Presentation;
        recording = webinarArray[webinar].Recording;
        id = webinarArray[webinar].ID;
  
        if (webinar < 2){
          $( `<div class = 'webinar post' id = ${id}>
                <h3 class = 'webinarTitle'>${title}</h2>
                <p class = 'postDate'>${postDate}</p>
              </div>` ).appendTo( ".pastWebinars" );
  
              if (recording !== ''){
                $(`<a class = 'recording' href ='${recording}'>View Online</a>`).appendTo($(`#${id}`));
              }
              if (presentation !== ''){
                $(`<a class = 'presentation' href ='${presentation}'>Download Slides</a>`).appendTo($(`#${id}`));
              }
              if (handout !== ''){
                $(`<a class = 'handout' href ='${handout}'>Download Handout</a>`).appendTo($(`#${id}`));
              }
            } else{
              $( `<div class = 'webinar post' id = ${id}>
                <h3 class = 'webinarTitle'>${title}</h3>
                <p class = 'postDate'>${postDate}</p>
              </div>` ).appendTo( ".webinarsContainer .pastWebinars" );
  
              if (recording !== ''){
                $(`<a class = 'recording' href ='${recording}'>View Online</a>`).appendTo($(`#${id}`));
              }
              if (presentation !== ''){
                $(`<a class = 'presentation' href ='${presentation}'>Download Slides</a>`).appendTo($(`#${id}`));
              }
              if (handout !== ''){
                $(`<a class = 'handout' href ='${handout}'>Download Handout</a>`).appendTo($(`#${id}`));
              }
        }
      }
  
      $(`<p class = 'webinarContact'>If you have questions about our webinars, please email us at <a href="mailto:info@psfinc.com?subject=Webinar Questions" aria-label="If you have any questions about webinars, please email Parker, Smith and Feek">info@psfinc.com</a></p>`).appendTo('#past');
  
    }
  
  
  
    
  
  
    
  });//end jQuery
  
    
  