
/*
 Require Basic Modules
*/
$ = jQuery = require('jquery');




/*
Nprogress loading bar
*/
var NProgress = require('NProgress');

/*
NPM module to convert plain tweet text to HTML
*/
var htmlTweet = require('html-tweet')()

var bootstrap = require('bootstrap');


/*
Get API key from HPE havenOnDemand
*/
var apikey = '9f610d60-d4ca-4047-b3f4-1d9ef15d2993';

/*
 To count the number of rows
*/
var counter = 0;

/*
To store HTML form of tweet
*/
var html_Tweet;

/*
To store text for sentiment analysis
*/
var textForSentiment;


/*
Maximum Number of attempts if request fails or hashtag not found
*/

var maxNumberOfAttempts=2;

/*
 temp variable to store max attemps
*/

var maxAttempts = maxNumberOfAttempts;


/*
To store processed text for sentimental analysis.
*/
var sentiText;

/*
Card template that will be appended
*/
/*
var cardTemplate = '<div class="col-md-4">'+
                    '<div class="card text-center">'+
                      '<div class="card-content">'+
                          '<div class="card-image">'+
                                '<img class="img-circle user-img" src="" alt="Loading image...">'+
                                '<h5 class="card-image-headline">'+
                                '<span class="user-name"></span><br>'+
                                '<span class="badge"><span class="fa fa-retweet"></span>'+ 
                                '<span class="user-rt"></span></span> </h5>'+
                          '</div>'+
                          '<div class="card-body">'+                       
                          '</div>'+
                          '<footer class="card-footer">'+
                              '<a class="btn btn-block btn-primary card-footer-btn" role="button" onclick="">Analyze Sentiment</a>'+                        
                          '</footer>'+
                        '</div>'+
                    '</div>'+
                   '</div>';

*/

 var collapseTemplate = '<div class="panel panel-default">'+
                          '<div class="panel-heading">'+
                            '<h4 class="panel-title">'+
                              '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">'+                               
                              '</a>'+
                            '</h4>'+
                          '</div>'+
                          '<div id="collapseOne" class="panel-collapse collapse">'+
                            '<div class="panel-body">'+
                            '</div>'+
                        '</div>'+
                      '</div>';

  var collapseTemplate_drag = '<div class="panel panel-default">'+
                                '<div class="panel-heading">'+
                                  '<h4 class="panel-title">'+
                                    '<a class="accordion-toggle" draggable="true" id="dragx" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">'+                               
                                    '</a>'+
                                  '</h4>'+
                                '</div>'+
                                '<div id="collapseOne" class="panel-collapse collapse">'+
                                  '<div class="panel-body">'+
                                  '</div>'+
                              '</div>'+
                            '</div>';                     

 var radioTemplate = '<div class="funkyradio-default">'+
                          '<input type="radio" name="radio" id="radio1" />'+
                          '<label class="radLabel" for="radio1"></label>'+
                        '</div>';


 
 /**
  * @param string text; Contains plain tweet text
  */

var processTextForSentiment = function(text) 

{
    sentiText = text;
    // removing special characters
    sentiText = sentiText.replace(/[^\w\s]/gi, "");
    //Removing new line. Windows would be \r\n but Linux just uses \n and Apple uses \r.
    sentiText = sentiText.replace(/(\r\n|\n|\r)/gm,"");    
    return sentiText;
}


/*
 * @param
 * Score takes result from sentiment result and converts to percentage upto two decimal places  
 */
var formatScore = function(score)
{
  return (score).toFixed(2);
}

/*
 * @param
 * score - takes result from sentiment result and converts to percentage upto two decimal places.
 * element - points to the element from which it is called.  
 */

var analyze_sentiment = function(text) 
{

    
        
      // create FormData
      var formData = new FormData();
      formData.append('text',text);
      formData.append('apikey',apikey);

      if (window.XMLHttpRequest)
          {
            xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
          }
        else
          {          
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
          }
        xmlhttp.onreadystatechange = function()
          {
            if (xmlhttp.readyState == 1)
            {                
                         
            }
          else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {             
                var response = JSON.parse(xmlhttp.responseText);   // converting JSON response from api to json object           
                
                var sentimentScore = formatScore(response.sentiment_analysis[0].aggregate.score);
                console.log('Sentiment Score: ' + sentimentScore);

                return sentimentScore;
            }
          }
        // send request  
        xmlhttp.open("POST","https://api.havenondemand.com/1/api/sync/analyzesentiment/v2",true);
        xmlhttp.send(formData);
}



 /**
  * function for fetching tweets
  *
  * @callback - requests callback
  * @param int            
  * mode = 1; call made from input i.e new hashtag is searched; resetting maxNumberOfAttempts 
  * mode = 0; call made from scrolling, no need to reset, work on same hashtag.
  */
var fetchTweets = function(callback,mode) 

{  
       
        // Picks value from hashtag input    
        var hashtag = $('#myhashtag').val();         

        // create FormData
        var formData = new FormData();
        formData.append('hashtag',hashtag);

        // resetting maxAttempts for a new search and appending mode with form data to reset MaxID (see fetchTweets.php)
        if(mode == 1)
            {
              formData.append('mode','1');
              maxAttempts = maxNumberOfAttempts;
            }
         

        if (window.XMLHttpRequest)
            {
              xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
          else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }

        xmlhttp.onreadystatechange = function()
          {
                if (xmlhttp.readyState == 1)
                {                                    
                   NProgress.start();  // Initiate loadingBar
                   NProgress.set(0.6);                                   
                }
              else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {                                    
                    var response=JSON.parse(xmlhttp.responseText); // parsing JSON string obtained

                    if(response.query_status === false) //If request fails
                    {
                      alert('FATAL Error: '+response.error_msg); // alert msg
                      return;
                    }

                    if(response.mytweets.length == 0)  // Check if respose is empty
                    { 

                      // If Max attempts are exhausted and request is made for a new hashtag not by scroll.
                      if(maxAttempts-- <= 0 && mode != 0)    
                        {
                            // Display if no result is fetched for a tweet
                            $("#populate").html('<h1 class="text-center">No tweets found for this hashtag</h1>');                                   
                            NProgress.done();
                            return;
                        }
                      else  
                        fetchTweets(displayCardsTw); // Retry Until maxAttempts < 0 
                    }
                    else
                    {                                    
                        NProgress.set(0.8);
                        callback(response); // Fire Callback
                        NProgress.done();   // End Loading Bar
                    }   
                }
           }
        // Send Call only if Attempts are left.
        if(maxAttempts >= 0)  
          {
            xmlhttp.open("POST","fetch",true);
            xmlhttp.send(formData); // send hashtag and mode.
          }
          
  }


 /**
  * function for displaying tweets
  *
  * @param {json} tweets; contains tweets in json object           
  */
  

var displayCardsTw = function (tweets)

{  

    for(var i = 0;i < tweets.mytweets.length;i++) 
      {        
          
          var twitterId = tweets.mytweets[i].id;
          var tweetTxt = tweets.mytweets[i].text; //extracting tweet text
          var screenName = tweets.mytweets[i].screen_name; 
          textForSentiment = processTextForSentiment(tweetTxt);  // send tweet text to process for sentimental analysis

          var score = analyze_sentiment(textForSentiment);
          tweets.mytweets[i].sentimentScore = score;
      }
    console.log(tweets);
}
  


var fetchDb = function(callback,mode) 

{  
       
        // Picks value from inputs    
        var username = $('#username').val();      
        var password = $('#password').val(); 
        var portAndIp = $('#portAndIp').val();      

        // create FormData
        var formData = new FormData();
        formData.append('username',username);
        formData.append('password',password);
        formData.append('portAndIp',portAndIp);


       
         

        if (window.XMLHttpRequest)
            {
              xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
          else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }

        xmlhttp.onreadystatechange = function()
          {
                if (xmlhttp.readyState == 1)
                {                                    
                   NProgress.start();  // Initiate loadingBar
                   NProgress.set(0.6);                                   
                }
              else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {                                    
                    var response=JSON.parse(xmlhttp.responseText); // parsing JSON string obtained

                    {                                    
                        NProgress.set(0.8);
                        callback(response); // Fire Callback
                        NProgress.done();   // End Loading Bar
                    }   
                }
           }
        
          {
            xmlhttp.open("POST","sqlLogin",true);
            xmlhttp.send(formData); // send inputs and mode.
          }
          
  }


 /**
  * function for displaying tweets
  *
  * @param {json} tweets; contains tweets in json object           
  */
  

var displayCards = function (myData)

{  
    console.log(myData);
   for(var i = 0;i < myData.data.length;i++) 
      {        
          
          

          var colCard = $(collapseTemplate);
          var dbName = myData.data[i].Database; //extracting tweet text
         
          colCard.find('.accordion-toggle').attr("href","#dbLayer"+i);
          colCard.find('.accordion-toggle').html(' '+dbName);
          colCard.find('.panel-body').html('<div class="panel-group mysqlBind'+i+' text-left" id="accordion'+i+'"></div>');
          
          colCard.find('.panel-collapse').attr("id","dbLayer"+i);
                
          $(".mysqlBind").last().append(colCard);
          
          var count=0;
          while(myData.data[i][count]!=undefined)
          {
              var colCard2 = $(collapseTemplate_drag);
              var tableName = myData.data[i][count].table;
              colCard2.find('.accordion-toggle').attr("href","#tbLayer"+i+'-'+count);
              colCard2.find('.accordion-toggle').attr("id","tbLayerId"+i+'-'+count);
              colCard2.find('.accordion-toggle').attr("data-parent","#accordion"+i);
              colCard2.find('.accordion-toggle').html(' '+tableName);
              colCard2.find('.accordion-toggle').attr('ondragstart', 'dragstart_handler(\''+dbName+'\',\''+tableName+'\',event)');
              colCard2.find('.panel-body').html('<div class="funkyradio"></div>');
          
              colCard2.find('.panel-collapse').attr("id","tbLayer"+i+'-'+count);

              $(".mysqlBind"+i+"").last().append(colCard2);
              

              var count2=0;

                while(myData.data[i][count][count2]!=undefined)
                {
                    var radioCard = $(radioTemplate);
                    var fieldName = myData.data[i][count][count2];
                   

                    radioCard.find('#radio1').attr("id","fLayer"+i+'-'+count+'-'+count2);
                    radioCard.find('.radLabel').html(fieldName);                
                    radioCard.find('.radLabel').attr("for","fLayer"+i+'-'+count+'-'+count2);
                    radioCard.find('.radLabel').attr('onClick', 'set_primary_key(\''+fieldName+'\',\''+dbName+'\',\''+tableName+'\')');


                    $(".funkyradio").last().append(radioCard);
                    count2++;                    
                }
                count++;
          }
      }

}
var results_all = 'temp';

 $("#join_hit").click(function()
  {
   //alert('Im hit');
   //console.log(d1);
   var join_method = $('#select_primary').val();
   if(join_method == "")
   {
      alert('Please select a join method.');
      return;
   }

  
     d1x = d1.split(",");
     d2x = d2.split(",");
  


      // build query
      if(join_method != 'full')
          var query = 'create table '+d1x[0]+'.'+d1x[1]+d2x[1]+' (PRIMARY KEY('+join_method+')) as select * from '+d1x[0]+'.'+d1x[1]+' inner join '+d2x[0]+'.'+d2x[1]+' using('+join_method+')';
      else
          var query = 'create table '+d1x[0]+'.'+d1x[1]+d2x[1]+' as select * from '+d1x[0]+'.'+d1x[1]+' inner join '+d2x[0]+'.'+d2x[1];

         
      console.log(query);

        // create FormData
        var formData = new FormData();
        //formData.append('db',db);        
        formData.append('query',query);
        

        if (window.XMLHttpRequest)
            {
              xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
          else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }

        xmlhttp.onreadystatechange = function()
          {
                if (xmlhttp.readyState == 1)
                {                                    
                   NProgress.start();  // Initiate loadingBar
                   NProgress.set(0.6);                                   
                }
              else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {                                    
                    response=(xmlhttp.responseText); // parsing JSON string obtained
                    console.log(JSON.parse(response));
                    NProgress.done(); 



                   
                      query = 'SHOW COLUMNS from '+d1x[0]+'.'+d1x[1]+d2x[1];

                       
                      console.log(query);

                      // create FormData
                      var formData = new FormData();
                      //formData.append('db',db);        
                      formData.append('query',query);
                      

                      if (window.XMLHttpRequest)
                          {
                            xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
                          }
                        else
                          {
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
                          }

                      xmlhttp.onreadystatechange = function()
                        {
                              if (xmlhttp.readyState == 1)
                              {                                    
                                 //NProgress.start();  // Initiate loadingBar
                                 //NProgress.set(0.6);                                   
                              }
                            else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                              {                                    
                                  response=JSON.parse(xmlhttp.responseText); // parsing JSON string obtained
                                  console.log(response);
                                  plot_cols(response);
                                  //NProgress.done();                              
                              }
                         }
                      
                        {
                          xmlhttp.open("POST","sqlLogin",true);
                          xmlhttp.send(formData); // send inputs and mode.
                        }








                
                }
           }
        
          {
            xmlhttp.open("POST","sqlLogin",true);
            xmlhttp.send(formData); // send inputs and mode.
          }



  });



 var plot_cols = function(dataPlot) 
 {
    $('#what_col').show();
    dataPlot.data.forEach(function(dat){

       $('#what_col').append($('<option>').text(dat.Field).attr('value', dat.Field));

    });

 }



  $("#mapping_hit").click(function()
  {

    var what_sort = $('#what_sort').val();
    console.log(what_sort);
    if(what_sort == "")
    {
      alert('Please select a sorting method');
      return;
    }

    var what_col = $('#what_col').val();
    if(what_col == "")
    {
      alert('Please select column.');
      return;
    }
    console.log(what_col);



    // build query   
    var query = 'select * FROM '+d1x[0]+'.'+d1x[1]+d2x[1]+' ORDER BY '+what_col+' '+what_sort+' LIMIT 10';
    console.log(query);

        // create FormData
        var formData = new FormData();
        //formData.append('db',db);        
        formData.append('query',query);
        

        if (window.XMLHttpRequest)
            {
              xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
          else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }

        xmlhttp.onreadystatechange = function()
          {
                if (xmlhttp.readyState == 1)
                {                                    
                   NProgress.start();  // Initiate loadingBar
                   NProgress.set(0.6);                                   
                }
              else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {                                    
                    response = JSON.parse(xmlhttp.responseText); // parsing JSON string obtained
                    console.log(response);
                    plot(response);
                    //callback(ev,response);
                    //ev.dataTransfer.setData("text/plain", response);
                    //ev.dataTransfer.effectAllowed = "move";
                    
                    //ev.dropEffect = "move";
                    NProgress.done();
                }
           }
        
          {
            xmlhttp.open("POST","sqlLogin",true);
            xmlhttp.send(formData); // send inputs and mode.
          }



   //alert('Im hit');
   //console.log(d1);

   //var results_all = leftJoin(d1,d2,'id','id');
   //var sorted = results_all.sortOn("name");
   
   //var sorted = results_all.sort(keysrt('name'));
    //console.log(sorted);

  });



  var plot = function(dataPlot) 

  {
      // EXTRACT VALUE FOR HTML HEADER. 
      // ('Book ID', 'Book Name', 'Category' and 'Price')
      dataPlot = dataPlot.data;
      //console.log(dataPlot);
      $('#myPlotData').modal('show');

       var col = [];
        for (var i = 0; i < dataPlot.length; i++) {
            for (var key in dataPlot[i]) {
                if (col.indexOf(key) === -1) {
                    col.push(key);
                }
            }
        }

        // CREATE DYNAMIC TABLE.
        var table = document.createElement("table");
        $(table).addClass('table table-striped table-hover table-condensed');

        // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

        var tr = table.insertRow(-1);                   // TABLE ROW.

        for (var i = 0; i < col.length; i++) {
            var th = document.createElement("th");      // TABLE HEADER.
            th.innerHTML = col[i];
            tr.appendChild(th);
        }

        // ADD JSON DATA TO THE TABLE AS ROWS.
        for (var i = 0; i < dataPlot.length; i++) {

            tr = table.insertRow(-1);

            for (var j = 0; j < col.length; j++) {
                var tabCell = tr.insertCell(-1);
                tabCell.innerHTML = dataPlot[i][col[j]];
            }
        }

        // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
        console.log(table);
        var divContainer = document.getElementById("showData");
        divContainer.innerHTML = "";
        divContainer.appendChild(table);



  }


  $("#file_export").change(function()
  {
      
      var file_export = $('#file_export').val();
      console.log(file_export);


      var what_sort = $('#what_sort').val();
      var what_col = $('#what_col').val();
      


      var file_export_name = '/var/lib/openshift/54ad7a93fcf933b460000067/app-root/runtime/repo/intelli/export/'+d1x[0]+'-'+d1x[1]+d2x[1]+what_sort+what_col+'.'+file_export;
    // build query
    if(file_export=='sql')   
      var query = 'SELECT * INTO OUTFILE \''+file_export_name+'\' FROM '+d1x[0]+'.'+d1x[1]+d2x[1]+' ORDER BY '+what_col+' '+what_sort;
    else
      var query = 'SELECT * INTO OUTFILE \''+file_export_name+'\' FIELDS TERMINATED BY \',\' OPTIONALLY ENCLOSED BY \'"\' LINES TERMINATED BY \'\\r\\n\' FROM '+d1x[0]+'.'+d1x[1]+d2x[1]+' ORDER BY '+what_col+' '+what_sort;

      console.log(query);

        // create FormData
        var formData = new FormData();
        //formData.append('db',db);        
        formData.append('query',query);
        

        if (window.XMLHttpRequest)
            {
              xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
          else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }

        xmlhttp.onreadystatechange = function()
          {
                if (xmlhttp.readyState == 1)
                {                                    
                   //NProgress.start();  // Initiate loadingBar
                  // NProgress.set(0.6);                                   
                }
              else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                { 

                    $('#down_hit').show();
                    $('#newMap_hit').show();
                    $('#down_hit').attr('href','export/'+d1x[0]+'-'+d1x[1]+d2x[1]+what_sort+what_col+'.'+file_export);                                   
                    response = JSON.parse(xmlhttp.responseText); // parsing JSON string obtained
                    console.log(response);
                 
                }
           }
        
          {
            xmlhttp.open("POST","sqlLogin",true);
            xmlhttp.send(formData); // send inputs and mode.
          }



  });
/*
 function json2array(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}
*/

/*
function keysrt(key) {
  return function(a,b){
   if (a[key] > b[key]) return -1;
   if (a[key] < b[key]) return 1;
   return 0;
  }
}


 Array.prototype.sortOn = function(key){
    this.sort(function(a, b){
        if(a[key] < b[key]){
            return -1;
        }else if(a[key] > b[key]){
            return 1;
        }
        return 0;
    });
}


if (!Array.prototype.joinWith) {
    +function () {
        Array.prototype.joinWith = function(that, by, select, omit) {
            var together = [], length = 0;
            if (select) select.map(function(x){select[x] = 1;});
            function fields(it) {
                var f = {}, k;
                for (k in it) {
                    if (!select) { f[k] = 1; continue; }
                    if (omit ? !select[k] : select[k]) f[k] = 1;
                }
                return f;
            }
            function add(it) {
                var pkey = '.'+it[by], pobj = {};
                if (!together[pkey]) together[pkey] = pobj,
                    together[length++] = pobj;
                pobj = together[pkey];
                for (var k in fields(it))
                    pobj[k] = it[k];
            }
            this.map(add);
            that.map(add);
            return together;
        }
    }();
}

 function leftJoin(leftTable, rightTable, leftId, rightId) {
  var joinResults = [];

  _.forEach(leftTable, function(left) {
          var findBy = {};
      findBy[rightId] = left[leftId];

      var right = _.find(rightTable, findBy),
          result = _.merge(left, right);

      joinResults.push(result);
  })

  return joinResults;
}
*/


/*
function inner_join(a, b, keys, select) {
  output = [];
 
  second = [];
  while(row_b = b()) {
    second[second.length] = row_b;
  }
 
  var idx = 0;
  while(row_a = a()) {
    $.each(second, function(i, row_b) {
      if (row_a[keys[0]] === row_b[keys[1]]) {
        var new_row = {};
 
        $.each(select, function(k, col) {
          // cheat here for simplicity - should handle aliasing
          new_row[col] =
            (row_a[col] ? row_a[col] : row_b[col])
        })
 
        output[idx++] = new_row;
      }
    })
  }
 
  return s({from: output})
}
*/
  
/*
  Fetch DB as soon as page loads

*/

  $(document).ready(function() 
  { 
    $(".mysqlBind").html('');
    console.log('Local DB loaded');
    fetchDb(displayCards);
  });
/*
 Fetch DB when GO button is clicked
*/

  $("#goTrigger").click(function()
  {
    // When GO is clicked, i.e new hashtag is searched; empty #populate div  
    $(".mysqlBind").html('');
    fetchDb(displayCards,'1'); // send mode = 1, i.e New hashtag is searched.

  });

   
  $("#goTriggerTw").click(function()
  {
    // When GO is clicked, i.e new hashtag is searched; empty #populate div  
    $("#populate").html('');
    fetchTweets(displayCardsTw,'1'); // send mode = 1, i.e New hashtag is searched.

  });


/*
 Fetch Tweets if enter is pressed
*/

  $('#myhashtag').keydown(function(event)
  { 
        var keyCode = (event.keyCode ? event.keyCode : event.which);   
        if (keyCode == 13) 
        {
            $('#goTriggerTw').trigger('click');
        }
  });




$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});