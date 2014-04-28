<span class='message' style='color:white;font-family:ShareTechmono;'>
&nbsp;_______________________________&nbsp;<br>
/&nbsp;You&nbsp;don't&nbsp;have&nbsp;the&nbsp;permission&nbsp;\<br>
|&nbsp;to&nbsp;access&nbsp;this&nbsp;page.&nbsp;Wait&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
|&nbsp;<span id='lasting_time'></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
\&nbsp;and&nbsp;try&nbsp;to&nbsp;reload.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<br>
&nbsp;-------------------------------&nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\&nbsp;&nbsp;&nbsp;^__^<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\&nbsp;&nbsp;(oo)\_______<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(__)\&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)\/\<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||----w&nbsp;|<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||<br>

<br><br><button type="button" id="reload">&#10227; RELOAD</button>

<script>
  $(function() {
    var lasting_minutes = 0;
    var lasting_seconds = 0;
    var lasting_time = <?php 
      $minInterval = 5 * 60; // 5 minutes
      $access = true;
      if (file_exists('visitor')) {
	$visitor = unserialize(file_get_contents('visitor'));
	$lasting_time = $visitor['time'] + $minInterval - time();
	echo $lasting_time;
      }
      else {
	echo 0;
      }
    ?>;

    function uncount() {
      if (lasting_time > 0) {
	lasting_minutes = (Math.floor(lasting_time/60) == 1 || Math.floor(lasting_time/60) == 0) ? Math.floor(lasting_time/60) + ' minute ' : Math.floor(lasting_time/60) + ' minutes';
	lasting_seconds = lasting_time % 60
	var str_lasting_seconds = (lasting_seconds < 10) ? '0' + lasting_seconds : lasting_seconds
	str_lasting_seconds = (lasting_seconds == 1 || lasting_seconds == 0) ? str_lasting_seconds + ' second ' : str_lasting_seconds + ' seconds';
	$('#lasting_time').text(lasting_minutes + ' and ' + str_lasting_seconds);
	lasting_time = lasting_time - 1;
      }
      else {
	$('#lasting_time').text('0 minute  and 00 second ');
      }
      setTimeout(uncount, 1000);
    };
    uncount();
  });
  
  $("#reload").click(function() {
    window.location.reload();
  });
</script>