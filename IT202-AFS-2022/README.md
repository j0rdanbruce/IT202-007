# IT202 AFS Setup
- 9/2/2022 set up structures for using AFS public_html directly
- Profile is not used but is a placeholder for Heroku how to deploy
- partials will be templates/partial pages that will NOT be accessed directly (still can reference via code)
- lib will be custom functions/libraries/etc that will NOT be accessed directly (still can be referenced via code)
- All user facing work will be done in this top-level directory (index.php, test_dp.php), lib will contain reusable functionality, partials will contain reusable templates, nothing else should change.
## Put files here that you want to be publicly accessible via the url
These will follow the domain name after the initial "/"
