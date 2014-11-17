# Instructions for crosstexas.com

-----------------------
## Editable CSS & JS Files
NOTE: To modify CSS and Javascript, use the files below. Trying to edit production.min.js or style.min.css will be a huge headache if not impossible. They're minified to keep page loading to a minimum.

### CSS
* custom-styles.css
Editing this file should override any other css. If something does not, simply add !important to the rule. Example: h1.logo { color: #000!important; }

### JS
* custom-js.js
You probaby won't need to mess with JS, but if you need to add a simple function you can do so in this file.