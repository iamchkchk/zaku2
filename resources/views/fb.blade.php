<!DOCTYPE html>
<html>
<head>
<title>Laravel</title>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Lato:100"
	rel="stylesheet" type="text/css">

<link
	href="{{ url('plugins/bootstrap-4.0.0-beta/dist/css/bootstrap.css') }}"
	rel="stylesheet" type="text/css">
<link
	href="{{ url('plugins/bootstrap-4.0.0-beta/dist/css/bootstrap.css.map') }}"
	rel="stylesheet" type="text/css">

<link
	href="{{ url('css/sticky-footer.css') }}"
	rel="stylesheet" type="text/css">

<?php if(0) { ?>
<style>
html, body {
	height: 100%;
}

body {
	margin: 0;
	padding: 0;
	width: 100%;
	display: table;
	font-weight: 100;
	/*font-family: 'Lato';*/
	background-color: lightgray;
}

.container {
	text-align: center;
	display: table-cell;
	vertical-align: middle;
}

.content {
	text-align: center;
	display: inline-block;
}

.title {
	font-size: 96px;
}
</style>
<?php } ?>
</head>
<body>

	<script>


    
	  // This is called with the results from from FB.getLoginStatus().
	  function statusChangeCallback(response) {
	    console.log('statusChangeCallback');
	    console.log(response);
	    // The response object is returned with a status field that lets the
	    // app know the current login status of the person.
	    // Full docs on the response object can be found in the documentation
	    // for FB.getLoginStatus().
	    if (response.status === 'connected') {
	      // Logged into your app and Facebook.
	      testAPI();

	      return false;
	
	      var user_id = response.authResponse.userID;
	
	      FB.api('/' + user_id, function(response) {
	          console.log(response);
	          
	      });
	
	      //scope : user_likes
	      FB.api('/' + user_id + '/likes', function(response) {
	    	  console.log('likes....');
	          console.log(response);
			/*
	          var app4 = new Vue({
	        	  el: '#fb-likes',
	        	  data: response
	        	})
	          */
	      });
	
	      
	      //scope : user_likes
	      FB.api('/' + user_id + '/comments', function(response) {
	    	  console.log('comments....');
	          console.log(response);
	          
	      });
	
	      //scope : user_posts
	      FB.api('/' + user_id + '/posts', function(response) {
	    	  console.log('posts....');
	          console.log(response);
	          
	      });
	
	      
	      
	    } else {
	      // The person is not logged into your app or we are unable to tell.
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into this app.';
	    }
	  }
	
	  
	  
	  // This function is called when someone finishes with the Login
	  // Button.  See the onlogin handler attached to it in the sample
	  // code below.
	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }
	
	  window.fbAsyncInit = function() {
	  FB.init({
	    appId      : '1677877535565200',
	    cookie     : true,  // enable cookies to allow the server to access 
	                        // the session
	    xfbml      : true,  // parse social plugins on this page
	    version    : 'v2.10' // use graph api version 2.8
	  });
	
	  // Now that we've initialized the JavaScript SDK, we call 
	  // FB.getLoginStatus().  This function gets the state of the
	  // person visiting this page and can return one of three states to
	  // the callback you provide.  They can be:
	  //
	  // 1. Logged into your app ('connected')
	  // 2. Logged into Facebook, but not your app ('not_authorized')
	  // 3. Not logged into Facebook and can't tell if they are logged into
	  //    your app or not.
	  //
	  // These three cases are handled in the callback function.
	
	  FB.getLoginStatus(function(response) {
	    statusChangeCallback(response);
	  });
	
	  };
	
	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_US/sdk.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	
	  
	  // Here we run a very simple test of the Graph API after login is
	  // successful.  See statusChangeCallback() for when this call is made.
	  function testAPI() {
	    console.log('Welcome!  Fetching your information.... ');
	
	    
	    FB.api('/me', function(response) {
	      console.log('Successful login for: ' + response.name);
	      document.getElementById('status').innerHTML =
	        'Thanks for logging in, ' + response.name + '!';      
	    });
	
	    
	  }
	</script>

	<!--
	  Below we include the Login Button social plugin. This button uses
	  the JavaScript SDK to present a graphical Login button that triggers
	  the FB.login() function when clicked.
	-->

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="#">Home <span
						class="sr-only">(current)</span></a></li>
				<li class="nav-item"><a class="nav-link" href="#">Link</a></li>
				<li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			<div class="form-inline my-2 my-lg-0" id="nav-search">
				<input 
					class="form-control mr-sm-2" 
					type="text" 
					placeholder="Search" 
					aria-label="Search" 
					id="search_text" 
					name="q"
					v-model="form.q">
				<button class="btn btn-outline-success my-2 my-sm-0" v-on:click="search">Search</button>
			</div>
			<span class="navbar-text" id="status"> </span>
		</div>
		
	</nav>


	<div class="container">

		<div class="row">
			<div class="col">

				<!-- 
				<div id="fb-likes">
					<ol class="list-group">
						<li v-for="row in data" class="list-group-item">@{{ row.name }} /
							@{{ row.id }}</li>
					</ol>
				</div>
				 -->
			</div>
		</div>
		
		<div class="row">
			<div class="col" id="search-result">
				<ul class="list-group">
					<fb-search-result-component v-for="item in result"
						v-bind:row="item" v-bind:key="item.id"> </fb-search-result-component>
					<!-- 
					<fb-search-result-component></fb-search-result-component>
					 -->
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-6" id="feed-list">
				<fb-feed-list-component v-bind:feed="result"> </fb-feed-list-component>
			</div>

			<div class="col-6" id="comment-list">
				<fb-comment-list-component v-bind:comment="result"> </fb-comment-list-component>
			</div>
		</div>
	</div>

	<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.
        <fb:login-button scope="public_profile,email,user_likes" onlogin="checkLoginState();">
  		</fb:login-button>
        </span>
      </div>
    </footer>
    
    
    
    <script type="text/x-template" id="nav-search-template">
		
	</script>

	<script type="text/x-template" id="fb-search-result-template">
		
			<li class="list-group-item"> 
				<a href="#" :data-object-id="row.id" v-on:click="listFeed">@{{ row.id }}</a> / @{{ row.name }} / @{{ row.privacy }}
			</li>
		
	</script>
	
	<script type="text/x-template" id="fb-feed-template">
		<div class="row">
			<div class="row">
				<div class="col">
							<div v-for="row in feed.data" class="card" style="width: 20rem;">
								<div class="card-body">
									<h4 class="card-title"></h4>
									<h6 class="card-subtitle mb-2 text-muted">@{{ row.updated_time }}</h6>
									<p class="card-text">@{{ row.message }}</p>
									<a href="#" class="card-link" :data-object-id="row.id" v-on:click="listComment">comments</a>
								</div>
							</div>

						
				</div>
			</div>

			<div class="row" v-if="feed.paging">
				<div class="col-6">
					<a href="#" :data-url="feed.paging.previous" v-on:click="getFeedPage">previous</a>
				</div>
				<div class="col-6">
					<a href="#" :data-url="feed.paging.next" v-on:click="getFeedPage">next</a>
				</div>	
			</div>
		</div>
	</script>
	
	<script type="text/x-template" id="fb-comment-template">
		<div class="row">
			<div class="row">
				<div class="col">
					
							<div v-for="row in comment.data" class="card" style="width: 20rem;">
								<div class="card-body">
									<h4 class="card-title">@{{ row.from.name }}</h4>
									<h6 class="card-subtitle mb-2 text-muted">@{{ row.created_time }}</h6>
									<p class="card-text">@{{ row.message }}</p>
								</div>
							</div>						
					
				</div>
			</div>

			<div class="row" v-if="comment.paging">
				<div class="col-6">
					<a href="#" :data-url="comment.paging.previous" v-on:click="getCommentPage">previous</a>
				</div>
				<div class="col-6">
					<a href="#" :data-url="comment.paging.next" v-on:click="getCommentPage">next</a>
				</div>	
			</div>
		</div>

	</script>
	

	<script type="text/javascript" src="{{ url('plugins/vue-2.5.0/dist/vue.js') }}"></script>
	<script type="text/javascript" src="{{ url('plugins/vue-resource-1.3.4/dist/vue-resource.js') }}"></script>
	<script type="text/javascript" src="{{ url('plugins/jquery/jquery-3.2.1.js') }}"></script>
	<script type="text/javascript" src="{{ url('plugins/bootstrap-4.0.0-beta/assets/js/vendor/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('plugins/bootstrap-4.0.0-beta/dist/js/bootstrap.js') }}"></script>

	<script type="text/javascript">

		Vue.component('fb-search-result-component', {
			template: '#fb-search-result-template'
			, props: ['row']
			, methods: {
	      		  listFeed: function (event) {
	          		//event.target.dataset.objectId
	      			thisPage.listFeed(event.target.dataset.objectId);
	     		}
	      	}
		});
		
		Vue.component('fb-feed-list-component', {
			template: '#fb-feed-template'
			, props: ['feed']
			, methods: {
				  getFeedPage: function (event) {
				      	this.$http.get(event.target.dataset.url).then(function(response) {
				      		thisPage.feedList.result = response.data;
				      	}, function(response){
				      		console.log(response);
				      	});
			      }
                  , listComment: function (event) {
                    //event.target.dataset.objectId
                    thisPage.listComment(event.target.dataset.objectId);
                  }
              }
		});

		Vue.component('fb-comment-list-component', {
			template: '#fb-comment-template'
			, props: ['comment']
			, methods: {
				  getCommentPage: function (event) {
				      	this.$http.get(event.target.dataset.url).then(function(response) {
				      		thisPage.commentList.result = response.data;
				      	}, function(response){
				      		console.log(response);
				      	});
			      }
              }
		});

		var thisPage = function() {
			var initialFormElements = function () {
		    }

			return {
				searchResult : null
				, feedList : null
				, commentList : null
				
				, initPage: function () {

					this.navSearch = new Vue({
						el: '#nav-search'
						, data: {
							form : {
								q : 'MilitaryModelingSRG'
							}
						}
						, methods: {
							search : function() {
								thisPage.search(this.form.q, 'group');
							}
						}
					});
					
					this.searchResult = new Vue({
			      	  el: '#search-result'
			      	  , data: {
				      	  result : []
				      }
					});

					this.feedList = new Vue({
				      	  el: '#feed-list'
				      	  , data: {
					      	  result : []
					      }
					});

					this.commentList = new Vue({
				      	  el: '#comment-list'
				      	  , data: {
					      	  result : []
					      }
					});
			      	
		        }
	        
	        	, initTable01 : function() {
	        		
	        	}

	        	/**/

	        	, search: function (q, type) {
	
					  q = $('#search_text').val(); //'MilitaryModelingSRG';
					  type = 'group';
					  
					  //search
				      FB.api('/search?q=' + q + '&type=' + type, function(response) {
				    	  console.log('search....');
				          console.log(response);
				          thisPage.searchResult.result = response.data;
			
					        	
				      });
				      
				  }
				
				  /**
				  */
				  , listFeed: function (objectId) {
					  FB.api('/' + objectId + '/feed', function(response) {
				    	  console.log('feed....');
				          console.log(response);
				
				          thisPage.feedList.result = response;
				        	
				      });
				  }
				
				  /**
				  */
				  , listComment: function (objectId) {
					  FB.api('/' + objectId + '/comments', function(response) {
				    	  console.log('comments....');
				          console.log(response);
				
				          thisPage.commentList.result = response;
				      });
				  }
	        	
	        	

	        	/**/
		    }
		}();

		thisPage.initPage();
		
	</script>

</body>
</html>
