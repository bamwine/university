<div class="mail-body">

<div class="mail-header" style="padding-bottom: 27px ;">

<h3 class="mail-title">
Write New Message </h3>
</div>
<div class="mail-compose">
<form action="index.php?admin/message/send_new/" class="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="form-group">
<label for="subject">Recipient:</label>
<br><br>
<div class="select2-container form-control select2 visible" id="s2id_autogen1">
<a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   
<span class="select2-chosen">Select A User</span><abbr class="select2-search-choice-close"></abbr> 
  <span class="select2-arrow"><b></b></span></a>
  <input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results" tabindex="5000" style="overflow: hidden; outline: none;">   </ul><div id="ascrail2000" class="nicescroll-rails" style="padding-right: 3px; width: 10px; z-index: 9999; position: absolute; top: 0px; left: -10px; height: 0px; cursor: default; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; border: 1px solid rgb(204, 204, 204); border-radius: 5px; background-color: rgb(212, 212, 212); background-clip: padding-box;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails" style="height: 7px; z-index: 9999; top: -7px; left: 0px; position: absolute; cursor: default; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; border: 1px solid rgb(204, 204, 204); border-radius: 5px; background-color: rgb(212, 212, 212); background-clip: padding-box;">
  </div></div></div></div>
<select class="form-control select2 select2-offscreen visible" name="reciever" required="" tabindex="-1">
<option value="">Select A User</option>

<option value="admin-1">- Mr. Admin</option>


</select>
</div>
<div class="compose-message-editor">
<textarea row="2" class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css" name="message" placeholder="Write Your Message" id="sample_wysiwyg"></textarea>
</div>
<hr>
<button type="submit" class="btn btn-success btn-icon pull-right">
Send <i class="entypo-mail"></i>
</button>
</form>
</div> </div>