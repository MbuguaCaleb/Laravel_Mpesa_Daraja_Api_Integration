<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <title>Laravel Mpesa Daraja Api</title>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Obtain Access Token</div>
                        <div class="card-body">
                            <h4 id="access-token"></h4>

                            <button id="getAccessToken" class="btn btn-primary">
                                Request Access Token
                            </button>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">Register Urls</div>
                        <div class="card-body">
                            <div id="response"></div>
                            <button class="btn btn-primary" id="registerURLS">
                                Register URLs
                            </button>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">Simulate Transaction</div>
                        <div class="card-body">
                            <form action="">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input
                                        type="number"
                                        name="amount"
                                        id="amount"
                                        class="form-control"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="amount">Account</label>
                                    <input
                                        type="text"
                                        name="account"
                                        id="account"
                                        class="form-control"
                                    />
                                </div>
                                <button id="simulate"class="btn btn-primary mt-3">
                                    Simulate Transaction
                                </button>
                            </form>
                        </div>
                      </div>
                </div>
             </div>
        </div>
        

        <script src="{{asset('js/app.js')}}"></script>
    
    </body>
</html>
