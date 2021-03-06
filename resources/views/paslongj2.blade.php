
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sentiment Analyst : Pasangan Calon Pemilu 2019</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>

  <body>

    

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Sentiment Analyst</h1>
      <p class="lead">Pasangan Calon Pemilihan Presiden 2019.</p>
    </div>

    <div class="container">
      <!--
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Free</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>10 users included</li>
              <li>2 GB of storage</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Pro</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 users included</li>
              <li>10 GB of storage</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Enterprise</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>30 users included</li>
              <li>15 GB of storage</li>
              <li>Phone and email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
          </div>
        </div>
      </div>
      -->

      <div class="row">
            <div class="col-md-12">
                <center>
                        <img class="rounded-circle" src="https://era-m.us/media/2018/08/prabowo-sandiaga.jpg" alt="Generic placeholder image" width="140" height="140">
                        <a style="color:black" href="{{url('/')}}"><h2>Prabowo - Sandiaga Uno</h2></a>
                </center>
            
                <br/>
            <br/>
            <br/>        
            </div>
            
            <div class="col-md-4 text-center">
                <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Sentiment</h5>
                    <div id="canvas-holder">
                        <canvas id="chart-area"></canvas>
                    </div>
                </div>
                </div>
                
                <!--
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                -->
            </div>
            <div class="col-md-4 text-center">
                <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Platform</h5>
                    <div id="canvas-holder">
                        <canvas id="chart-area1"></canvas>
                    </div>
                </div>
                </div>
                
                <!--
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                -->
            </div>
            <div class="col-md-4 text-center">
                <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Pengguna paling sering tweet</h5>
                    <div id="canvas-holder">
                        <canvas id="chart-area2"></canvas>
                    </div>
                </div>
                </div>
                
                <!--
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                -->
                <br/>
                <br/>
            </div>
            <div class="col-lg-12">
              <table class="table table-bordered" id="myTable">
              <thead>
                      <tr>
                          <th width="50px">No</th>
                          <th>Tweet</th>
                          <th>Username</th>
                          <th>Polarity</th>
                          <th>Platform</th>
                      </tr>
                  </thead>
                  <tbody>
                      @if(!empty($tweet))
                          @foreach($tweet as $key => $value)
                              <tr>
                                  <td>{{++$key}}</td>
                                  <td>{{ $value->tweet }}</td>
                                  <td>{{ $value->username }}</td>
                                  <td>-</td>
                                  <td>{{ strip_tags($value->platform) }}</td>
                              </tr>
                          @endforeach
                      @else
                          <tr>
                              <td colspan="6">There are no data.</td>
                          </tr>
                      @endif
                  </tbody>
              </table>
            </div>
            
        </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md ">
            
            <small class="d-block mb-3 text-muted">DirectoryX &copy; 2018</small>
          </div>
          
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" integrity="sha256-JG6hsuMjFnQ2spWq0UiaDRJBaarzhFbUxiUTxQDA9Lk=" crossorigin="anonymous"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						62,
						30,
						51,
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.green,
						window.chartColors.gray,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Negative',
					'Positive',
					'Netral',
				]
			},
			options: {
				responsive: true
			}
		};

        var config1 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						@foreach ($countplatpra as $count)
                        {{$count->count.","}}
                        @endforeach
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.green,
						window.chartColors.gray,
                        window.chartColors.yellow,
					],
					label: 'Dataset 1'
				}],
				labels: [
					@foreach ($countplatpra as $count)
                        '{{strip_tags($count->platform).""}}',
                    @endforeach
				]
			},
			options: {
				responsive: true
			}
		};

        var config2 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						@foreach ($countmostuserpra as $count)
                        {{$count->count.","}}
                        @endforeach
					],
					backgroundColor: [
						window.chartColors.blue,
						window.chartColors.yellow,
						window.chartColors.gray,
					],
					label: 'Dataset 1'
				}],
				labels: [
					@foreach ($countmostuserpra as $count)
                        '{{$count->username}}',
                    @endforeach
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
            var ctx = document.getElementById('chart-area1').getContext('2d');
			window.myPie = new Chart(ctx, config1);
            var ctx = document.getElementById('chart-area2').getContext('2d');
			window.myPie = new Chart(ctx, config2);
        };



		var colorNames = Object.keys(window.chartColors);
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
	</script>
  </body>
</html>
