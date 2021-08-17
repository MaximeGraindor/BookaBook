// REQUIRES
require('./bootstrap');

// IMPORTS
import selectBox from './partials/selectBox'
import password from './partials/password'

selectBox.init()
password.init()


if (document.getElementById('cover')) {
    function readSingleFile(e) {
        var file = e.target.files[0];
        if (!file) {
          return;
        }
        var reader = new FileReader();
        reader.onload = function(e) {
          var contents = e.target.result;
          console.log(e.target.result);
          displayContents(contents);
        };
        reader.readAsDataURL(file);
      }

      function displayContents(contents) {
        var element = document.getElementById('coverPreview');
        element.src = contents;
        console.table(contents);
      }

      document.getElementById('cover')
        .addEventListener('change', readSingleFile, false);
}
