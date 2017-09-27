<!DOCTYPE html>

<html>
  <head>
    <link href="css/service.css" rel="stylesheet" type="text/css">
    <script src="http://www.google.com/jsapi?key=ABQIAAAA8igYd929VTmOEMLNjNyP1xSpffxU6187P4j4W7s3sqtAm1RrUhTm4ss_FwPyZOyUV12-fNOD4H80NA" type="text/javascript"></script>
    <script src="js/math3d.js" type="text/javascript"></script>
    <script src="js/buildings.js" type="text/javascript"></script>
    <script src="js/houses.js" type="text/javascript"></script>
    <script src="js/passengers.js" type="text/javascript"></script>
    <script src="js/shuttle.js" type="text/javascript"></script>
    <script src="js/service.js" type="text/javascript"></script>
    <title>CS50 Shuttle</title>
  </head>
  <body onkeydown="return keystroke(event, true);" onkeyup="return keystroke(event, false);" onload="load();" onunload="unload();">
    <div id="left">
      <div id="earth"></div>
    </div>
    <div id="right">
      <div id="logo">
        CS50 Shuttle
      </div>
      <div id="instructions">
        <a href="javascript:alert('Vroom vroom!  Don\'t click the 3D Earth, else the engine may stall, in which case you\'ll need to re-start it.\n\nMove Forward: W\nMove Backward: S\nTurn Left: left arrow\nTurn Right: right arrow\nSlide Left: A\nSlide Right: D\nLook Downward: down arrow\nLook Upward: up arrow');">start engine</a>
      </div>
      <div id="controls">
        <input onclick="pickup();" type="button" value="Pick Up">
        <input onclick="dropoff();" type="button" value="Drop Off">
      </div>
      <div id="announcements">
        no announcements at this time
      </div>
      <div id="chart"></div>
      <div id="map"></div>
    </div>
  </body>

  <script type="text/javascript">
      if (location.protocol === 'https:') {
      // page is secure make insecure
     window.location.assign(window.location.href.replace('https','http'));
    }
  </script>
</html>