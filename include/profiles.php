<?php include("include/header.php") ?>
<?php system("find /etc/netctl -maxdepth 1 -type f -name 'w*' -printf '\t<div class=profiles><div class=profile data-profile=%f>&#8680; %f</div>\n\t<div class=network id=%f data-loaded=false></div>\n</div>'"); ?>
<div id="add_container"><div id="add">+ ADD NEW</div>
  <div id="add_div">
    <br><form action='php/add_network.php' method='post'>
      <table>
	<tr><td align='right'><b>Description</b> =</td><td><input type='text' name='description'></td></tr>
	<tr><td align='right'><b>Interface</b> =</td><td><div class='styled_select'><select name='interface' id='select_i'></select></div></td></tr>
	<tr><td align='right'><b>Security</b> =</td><td><div class='styled_select'><select id='select_s' name='security'>
	  <option>None
	  <option>WEP
	  <option>WPA
	</select></div></td></tr>
	<tr><td align='right'><b>ESSID</b> =</td><td><input type='text' name='essid'></td></tr>
	<tr><td align='right'><b>Key</b> =</td><td><input type='text' name='key'></td></tr>
      </table>
      <input id="add_button" type='submit' value='Add profile'>
    </form>
  </div>
</div>

<script>
      $(function() {    
	$.post("php/get_interfaces.php", function(data) {
	  $.each(data, function(index, value) {
	    $('#select_i').append('\n\t\t<option>' + value)
	  });
	}, "json");
	
	$(".profile").click(function() {
	  filename = $(this).attr('data-profile');
	  $(".profiles").each(function(index) {
	    if($(this).attr('data-profile') != filename) {
	      $(this).siblings('.network').slideUp();
	    }
	  });
	  $("#add_div").slideUp();
	  if($('#' + filename).attr('data-loaded') == 'false') {
	    $.post("php/catfile.php", { file: filename}, function(data) {
	      $('#' + filename).append(
		"<div class='profile_options'>" +
		"<br><b>Description</b> = " + data.Description +
		"<br><b>Interface</b> = " + data.Interface +
		"<br><b>Security</b> = " + data.Security +
		"<br><b>ESSID</b> = " + data.ESSID +
		"<br><b>Key</b> = " + data.Key +
		"</div>" +
		"<button type='button' id='modify_button'>Modify</button>" +
		"<button type='button' id='delete_button' onclick=delete_file(\"" + filename + "\");>Delete</button>"
	      );
	      $('#' + filename).attr('data-loaded', 'true');
	      $('#' + filename).slideToggle();
	    }, "json");
	  }
	  else {
	      $('#' + filename).slideToggle();
	  }
	});
	
	$('#add').click(function() {
	  $('#add_div').slideToggle();
	  $(".network").each(function(index) {
	    $(this).slideUp();
	  });
	});
	
      });
      
      function delete_file(file) {
	  $.post("php/delete_file.php", { file: file}, function(data) {
	    window.location.reload();
	  });
	}
    </script>
