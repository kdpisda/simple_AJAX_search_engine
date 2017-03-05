<button type="button" class="mdl-button show-modal mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" id="view-source">Contact Me</button>    
<dialog class="mdl-dialog">
    <div class="mdl-dialog__content">
      <h5>Interested in this project</h5>
        <p>Fill the form we will contact you shortly</p>
    <div class="mdl-card__supporting-text">
    <form action="contact.php" method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="name" required name="name">
            <label class="mdl-textfield__label" for="name">Your Full Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="email" id="email" required name="email">
            <label class="mdl-textfield__label" for="email">Your valid email</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="phoneno" required name="contact_no">
            <label class="mdl-textfield__label" for="phoneno">Contact No.</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="reason" ></textarea>
            <label class="mdl-textfield__label" for="reason">Why you want to join</label>
        </div>
        <input id="demo-show-toast" class="mdl-button mdl-js-button mdl-button--raised" type="submit" value="Submit">
        <button type="button" class="mdl-button close">Cencel</button>
    </form>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
            <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>
    </div>
    </div>
  </dialog>
<script>
(function() {
  'use strict';
  var snackbarContainer = document.querySelector('#demo-toast-example');
  var showToastButton = document.querySelector('#demo-show-toast');
  showToastButton.addEventListener('click', function() {
    'use strict';
    var data = {message: 'First fill the details'};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });
}());
</script>
  <script>
    var dialog = document.querySelector('dialog');
    var showModalButton = document.querySelector('.show-modal');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showModalButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  </script>
  </body>
</html>