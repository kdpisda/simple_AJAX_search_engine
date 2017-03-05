<?php include '../template/header.php'; 
session_start();
?>
<!-- Uses a header that contracts as the page scrolls down. -->
<style>
.demo-list-three {
  width: 650px;
}
</style>
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--waterfall">
    <!-- Top row, always visible -->
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">_ Scholarship</span>
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="waterfall-exp" onkeyup="showResult(this.value)">
        </div>
      </div>
    </div>
    <!-- Bottom row, not visible on scroll -->
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="../index.php"><i class="material-icons">&#xE88A;</i> Home</a>
        <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE868;</i> Report</a>
        <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE887;</i> Help</a>
        <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE8AF;</i> FAQ</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Search Scholarship</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="../index.php"><i class="material-icons">&#xE88A;</i> Home</a>
        <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE868;</i> Report</a>
        <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE887;</i> Help</a>
        <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE8AF;</i> FAQ</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
      <div id="livesearch">
      </div>
  </main>
<footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Scholarships</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="#">Help</a></li>
      <li><a href="#">Privacy & Terms</a></li>
    </ul>
  </div>
</footer>
</div>
<?php include'../template/footer.php'; ?>