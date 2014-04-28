<div id="title_ascii">
&nbsp;&nbsp;&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
&nbsp;_&nbsp;|&nbsp;|__&nbsp;_&nbsp;__|&nbsp;|__&nbsp;|&nbsp;&nbsp;&nbsp;\(_)____&nbsp;__&nbsp;&nbsp;___&nbsp;_&nbsp;_&nbsp;&nbsp;___&nbsp;___&nbsp;_&nbsp;_&nbsp;<br>
|&nbsp;||&nbsp;/&nbsp;_`&nbsp;/&nbsp;_|&nbsp;/&nbsp;/&nbsp;|&nbsp;|)&nbsp;|&nbsp;(_-&#60;&nbsp;'_&nbsp;\/&nbsp;-_)&nbsp;'&nbsp;\(_-&#60;/&nbsp;-_)&nbsp;'_|<br>
&nbsp;\__/\__,_\__|_\_\&nbsp;|___/|_/__/&nbsp;.__/\___|_||_/__/\___|_|&nbsp;&nbsp;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|_|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
</div><br>
<button type="button" id="disconnect">&#8623; DISCONNECT</button>
<script>
  $("#disconnect").click(function() {
    $.post("php/disconnect.php", function(data) {
      window.location.replace("index.php?disconnect=1");
    });
  });
</script>
