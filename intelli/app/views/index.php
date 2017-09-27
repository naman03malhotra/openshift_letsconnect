
<style type="text/css">



</style>

<div class="">
  <div class="container text-center">



    <div class="col-md-3">
      <h5>1. Select Format</h5>
      <div class="card card-content">
       <div class="form-group">


        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOnex">
                MySQL
              </a>
            </h4>
          </div>
          <div id="collapseOnex" class="panel-collapse collapse in">
            <div class="panel-body">


              <div class="input-group">

                <input type="text" class="form-control" id="username" placeholder="Username">
                <input type="password" class="form-control" id="password" placeholder="Password">
                <input type="text" class="form-control" id="portAndIp" placeholder="IP and Port">

              </div>
              <br>
              <div class="input-group-btn">
                <a class="btn btn-primary" id="goTrigger">SUBMIT</a>
              </div>

            </div>
          </div>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwox">
                CSV
              </a>
            </h4>
          </div>
          <div id="collapseTwox" class="panel-collapse collapse">
            <div class="panel-body">

                <div class="input-group-btn">
                  
                <span class="btn btn-primary" value="Upload File" id="upload-to-server2" onclick="uploadFile()"><span class="fa fa-upload"></span> Upload</span>
              </div>


            </div>
          </div>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThreex">
                Twitter
              </a>
            </h4>
          </div>
          <div id="collapseThreex" class="panel-collapse collapse">
            <div class="panel-body">

              <div class="input-group">
                <span class="input-group-addon">#</span>
                <input type="text" class="form-control" id="myhashtag" placeholder="hashtag" value="demonetization">
               

              </div>
              <br>
              <div class="input-group-btn">
                <a class="btn btn-primary" id="goTriggerTw">LOAD</a>
              </div>

            </div>
          </div>
        </div>  




      </div>
    </div>

  </div>






  <div class="col-md-4">
    <h5>2. Select Source</h5>

    <div class="card card-content">

      <ul class="nav nav-tabs">
        <li class="active"><a href="#mysql">MySQL</a></li>
        <li><a href="#csv">CSV</a></li>
        <li><a href="#twitter">Twitter</a></li>
      </ul>

      <div class="tab-content">
        <div id="mysql" class="tab-pane fade in active">


        <div id="">



          <div class="panel-group mysqlBind text-left" id="accordion">
            <div class="text-center">
              <h3>MySQL</h3>
              <p>Please enter your credentials in section 1, else hit submit to load default/ local Database.</p>
            </div>
          </div>


        </div>


      </div>


      <div id="csv" class="tab-pane fade">
        <h3>CSV</h3>
        <p>CSV data will be loaded here</p>
      </div>
      <div id="twitter" class="tab-pane fade">

        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  TweetId
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
              <div class="panel-body">
                Obj1
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  Tweets
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
              Obj2
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

</div>

<div class="col-md-5 col-lg-5 text-center">
  <h5>3. Visualizer</h5>
  <div class="card card-content">

    <div class="row">
      <div class="col-md-3">
          <div><button id="target1" ondrop="drop_handler(event,1);" ondragover="dragover_handler(event);" class="btn btn-default btn-block">D1</button></div>
          <br>
          <br>
          <div><button id="target2" ondrop="drop_handler(event,2);" ondragover="dragover_handler(event);" class="btn btn-default btn-block">D2</button></div>
      </div>
      <div class="col-md-6">
        <br>
        <br>
        <div><button class="btn btn-default btn-block"  id="join_hit">Join</button></div>
        <br>
        <br>

        <div class="row">

          <div class="col-md-12">
            <select  id="what_sort" class="form-control">
              <option value="" style="display:none">Select Transformation</option>
              <option value="asc">Sort Asc</option>
              <option value="desc">Sort Desc</option>
            </select>
          </div>
          <br>
          <br>
          <div class="col-md-12">
            <select  id="what_col" class="form-control" style="display: none;">
              <option value="" style="display:none">Select Coloumn</option>

            </select>
          </div>
          <br>

          <br>


        </div>          
        <br>

        <div><button class="btn btn-primary btn-block" id="mapping_hit">Run Mapping</button></div>
        
      </div>
      <div class="col-md-3">
        
         <select id="select_primary" class="form-control" style="display: none;">
                <option value="" style="display:none">Select Primary</option> 
                <option value="full">Full Join</option>               
         </select>


      </div>
      
    </div>

  </div>

</div>



</div>
</div>

<!-- Division where all tweets will be displayed -->
<div class="container" id="populate">


</div> <!-- /container -->  

<hr>
 <div id="myUpload" class="modal fade in">
        <div class="modal-dialog modal-md">
          <div class="modal-header">
            <a  data-dismiss="modal" class="close"  aria-label="Close"><p style="color:white !important;opacity:1;text-shadow:none;font-weight:normal">x</p></a>
            <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Upload CSV</h4>
          </div>
          <div class="modal-content text-center">
            <div class="modal-body">


              <center>
                <input  class="btn btn-primary" type="file" name="file1" id="file1"><br>
                <span class="btn btn-primary my-btn " value="Upload File" id="upload-to-server2" onclick="uploadFile()"><span class="fa fa-upload"></span> Upload</span>
                <hr>
                <button id="but" class="btn  btn-block btn-primary" style="text-align: center; display: none;" ></button>

              </center>

              <br>
              <div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped active" id="progress-div" role="progressbar"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" >

              </div>
            </div>
          </div>

          <div class="bg-primary text-center" id="result-yt2">

          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->


    <div id="myPlotData" class="modal fade in">
      <div class="modal-dialog modal-lg">
        <div class="modal-header">
          <a  href="" data-dismiss="modal" class="close"  aria-label="Close"><p style="color:white !important;opacity:1;text-shadow:none;font-weight:normal">x</p></a>
          <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Preview / Download</h4>
        </div>
        <div class="modal-content text-center">
          <div class="modal-body plot_data">
              <br>
              <div class="dwl-data text-center row">
              
                <div class="col-md-4">
                    <select id="file_export" class="form-control" required>
                                <option value="" style="display:none">Select Format To Download</option>
                                <option value="sql">SQL</option>
                                <option value="csv">CSV</option>
                    </select>
                </div>
                <div class="col-md-4">
                   <a class="btn btn-primary my-btn" value="Upload File" id="down_hit" style="display: none;" download><span class="fa fa-download"></span> Download</a>
                </div>
                <div class="col-md-4"><a href="" id="newMap_hit" class="btn btn-success" style="display: none;">New Map</a> </div>
                  
              </div>
              <br>
              <br>

          <div class="showData table-responsive text-left" id="showData"> Data will be displayed here </div>


            <br>

          </div>

          <div class="bg-primary text-center" id="result-prev">

          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
<script>

// Work in progress, upload file code
            var listOfFilesUploaded = [];

                         function _(el){
                           if (document.getElementById(el) != null) 
                           {
                            return document.getElementById(el);
                          }
                          else {
                            alert("I am null"+el);
                          }

                       // return document.getElementById(el);

                     }
                      function getExtension(filename) {
                            var parts = filename.split('.');
                            return parts[parts.length - 1];
                          }

                          function getFiletype(filename) {
                            var parts = filename.split('/');
                            return parts[0];
                          }

                     function isCSV(filename) {
                      var ext = getExtension(filename);
                      switch (ext.toLowerCase()) {
                        case 'csv':
                        


                        return true;
                      }
                      return false;
                    }

                    function uploadFile() 
                    {





                      $("#myUpload").modal("show");





                      this.disabled = true;

                      var button = _("but");

                      uploadToServer2(function(progress, fileURL)
                      {
                        if(progress === 'ended') 
                        {
                          button.disabled = false;
                          button.innerHTML = 'Click to download from server';

                          $('#but').hide();
                                     //$('#upload-to-yt2').show();
                                     $('#myUpload').modal("hide");

                                     
                                     button.onclick = function() 
                                     {
                                      window.open(fileURL);
                                    };
                                    return;
                                  }
                                  button.innerHTML = progress;
                                });       
                    }






                    function uploadToServer2(callback) {

                     var button = _("but");

                     var file = _("file1").files[0];
                     if(file==null)
                     {
                      $("#result-yt2").html("please select a CSV file");

                          return;
                          }
                          else
                          {

                          }


                          if(file.size>(211072000))
                          {
                            console.log(file.size);

                          //                  alert(".");
                          $("#result-yt2").html("file size is greater than 200MB. Please select a smaller file");

                          return;
                          }


                          var fileName = (Math.random() * 1000).toString().replace('.', '');

                          {
                            var fileType = getFiletype(file.type);
                            button.style.display = 'block';
                          }


                          if(isCSV(file.name))
                          {
                            fileName +='.';
                            fileName += getExtension(file.name);
                          }
                          else
                          {

                           $("#result-yt2").html("Please upload a CSV file");

                           return;
                          }



                // create FormData
                var formData = new FormData();
                formData.append(fileType + '-filename', fileName);
                formData.append(fileType + '-file', file);

                callback('Uploading ' + fileType + ' recording to server.');

                makeXMLHttpRequest('save2.php', formData, function(progress) {
                  if (progress !== 'upload-ended') {
                    callback(progress);

                    return;

                  }

                  var initialURL = location.href.replace(location.href.split('/').pop(), '') + 'uploads/';

                  callback('ended', initialURL + fileName);

                    // to make sure we can delete as soon as visitor leaves
                    listOfFilesUploaded.push(initialURL + fileName);
                  });
              }



              function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                  if (request.readyState == 4 && request.status == 200) {
                    callback('upload-ended');


                  }
                };

                request.upload.onloadstart = function() {
                  callback('Upload started...');
                };

                request.upload.onprogress = function(event) {
                  $("#progress-div").css("width",Math.round(event.loaded / event.total * 100) + "%");
                  $("#progress-div2").css("width",Math.round(event.loaded / event.total * 100) + "%");
                };

                request.upload.onload = function() {
                  callback('progress-about-to-end');
                };

                request.upload.onload = function() {
                  callback(' Please Wait....');

                };

                request.upload.onerror = function(error) {
                  callback('Failed to upload to server (Try Again)');
                  console.error('XMLHttpRequest failed', error);
                };

                request.upload.onabort = function(error) {
                  callback('Upload aborted.');
                  console.error('XMLHttpRequest aborted', error);
                };

                request.open('POST', url);
                request.send(data);
              }
</script>






