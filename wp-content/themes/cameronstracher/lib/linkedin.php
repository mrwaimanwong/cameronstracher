<?php

/** Add  */
// add_action( 'wp_footer', 'ww_add_linkedin' );

function ww_add_linkedin() {
  echo '<script type="text/javascript" src="http://platform.linkedin.com/in.js">
    api_key: b7jrve8f3zbw
    onLoad: onLinkedInLoad
    authorize: true
  </script>

  <script type="text/javascript">

    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {

        IN.Event.on(IN, "auth", getProfileData);
        console.log("onLinkedInLoad");
    }

    // Handle the successful return from the API call
    function onSuccess(data) {

      var id = data.id;
      var recommender = data.recommender;

      document.getElementById("title").innerHTML = recommender;

        console.log(data);
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }

    // Use the API call wrapper to request the members basic profile data
    function getProfileData() {
        IN.API.Raw("/people/~:(recommendations-received)").result(onSuccess).error(onError);
    }

</script>';

}
