<?php
session_start();

// Site information
$title = 'RoundTripper';
$page = 'Home';

// User inputs
@$homebase = $_POST["rt-homebase"];
@$via = $_POST["rt-via"];

 ?>
 <!DOCTYPE HTML>
 <html>
  <?php
    require 'components/head.php'
  ?>
  <body>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                <li><a href="#" class="text-white">Like on Facebook</a></li>
                <li><a href="#" class="text-white">Email me</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand">Album</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <?php
            require 'components/search.php';
           ?>
          <p>
            <a href="#" class="btn btn-primary">Main call to action</a>
            <a href="#" class="btn btn-secondary">Secondary action</a>
          </p>
        </div>
      </section>

      <div class="album text-muted">
        <div class="container">

          <div class="row">
            <!--<div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>

            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>

            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card">
              <img data-src="holder.js/100px280/thumb" alt="Card image cap">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>-->
            <?php
             require 'components/results.php';
             ?>
          </div>

        </div>
      </div>

      <footer class="text-muted">
        <div class="container">
          <p class="float-right">
            <a href="#">Back to top</a>
          </p>
          <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
      </footer>

  </body>
 </html>
